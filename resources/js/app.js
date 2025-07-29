/*  resources/js/app.js  */
/* ----------------------------------------------------------
   Entrada principal de Vite. 
   Desde aquí “cuelgan” todos los scripts de la aplicación.
-----------------------------------------------------------*/

          // si usas Echo/Axios; si no, bórralo
import './laravel-app'              // tu entry original (si todavía lo necesitas)
import './apps/custom-fullcalendar' // nuestro calendario

/*  (Opcional) Exponer algo en window si lo necesitas
window.FullCalendar = ... */
