<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Modules\Core\Entities\AuditLog;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth::login', [
            'simplePage' => true,
            'title'      => 'Sign In',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
           
              $user = Auth::user();
            if ($user->status !== 'enabled') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Tu cuenta aún no está habilitada.',
                ]);
            }
            $request->session()->regenerate();

            // Auditoría: LOGIN
            AuditLog::create([
                'user_id'    => Auth::id(),
                'event'      => 'Login',
                'url'        => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('dashboard.index');
        }

        return back()
            ->withErrors(['email' => 'Las credenciales no coinciden.'])
            ->withInput($request->only('email'));
    }

    public function showRegistrationForm()
    {
        return view('auth::register', [
            'simplePage' => true,
            'title'      => 'Sign Up',
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:255'],
            'email'    => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8','confirmed'],
            'terms'    => ['accepted'],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'disabled', // 👈 status por defecto
        ]);

        // Auditoría: Registro
        AuditLog::create([
            'user_id'    => $user->id,
            'event'      => 'Register',
            'url'        => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return redirect()->route('auth.login')->with('success', 'Cuenta creada. Espera activación por un administrador.');
    }

public function logout(Request $request)
{
    // Auditoría: LOGOUT antes de cerrar sesión
    AuditLog::create([
        'user_id'    => Auth::id(),
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'event'      => 'logout', // <-- ¡ESTO ES LO QUE FALTABA!
        'created_at' => now()
    ]);

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.login');
}


    public function unlockForm()
    {
        return view('auth::unlock', [
            'simplePage' => true,
            'title'      => 'Lockscreen',
        ]);
    }

   public function unlock(Request $request)
{
    $request->validate([
        'password' => ['required', 'string'],
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

  if (Auth::check() && Hash::check($request->input('password'), Auth::user()->getAuthPassword())) {

        // Auditoría: desbloqueo
        AuditLog::create([
            'user_id'    => $user->id,
            'event'      => 'Unlock Screen',
            'url'        => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now()
        ]);

        return redirect()->intended(route('dashboard.index'));
    }

    return back()->withErrors(['password' => 'Contraseña incorrecta.']);
}


    public function showResetRequestForm()
    {
        return view('auth::reset', [
            'simplePage' => true,
            'title' => 'Password Reset',
        ]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth::reset-password', [
            'token' => $token,
            'email' => $request->email,
            'simplePage' => true,
            'title' => 'Reset Password',
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

                // Auditoría: reset de contraseña
                AuditLog::create([
                    'user_id'    => $user->id,
                    'event'      => 'Password Reset',
                    'url'        => $request->fullUrl(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('auth.login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
