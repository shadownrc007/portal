/**
 * resources/js/apps/custom-fullcalendar.js
 * ───────────────────────────────────────────
 *  Calendario “Apps / Calendar”               
 *  • FullCalendar 6                           
 *  • CRUD vía API Laravel (JSON)               
 *  • Modal Bootstrap para alta / edición      
 * ───────────────────────────────────────────
 *  Asegúrate de haber instalado:
 *     npm i @fullcalendar/core @fullcalendar/daygrid @fullcalendar/interaction
 *  y de tener el meta-tag CSRF en tu <head>.
 */
import { Calendar }            from '@fullcalendar/core';
import dayGridPlugin           from '@fullcalendar/daygrid';
import interactionPlugin       from '@fullcalendar/interaction';
import esLocale                from '@fullcalendar/core/locales/es';

document.addEventListener('DOMContentLoaded', () => {
    /* --------------------------------------------------
     *     1. Obtén el nodo donde se pintará el calendario
     * -------------------------------------------------- */
    const calendarEl = document.querySelector('.calendar');
    if (!calendarEl) return;               // Si no existe, salimos sin explotar

    /* --------------------------------------------------
     *     2. CSRF - token para peticiones mutables
     * -------------------------------------------------- */
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content ?? '';

    /* --------------------------------------------------
     *     3. Instancia FullCalendar
     * -------------------------------------------------- */
    const calendar = new Calendar(calendarEl, {
        locale      : esLocale,
        plugins     : [dayGridPlugin, interactionPlugin],
        selectable  : true,
        headerToolbar: {
            left  : 'prev,next addEventButton',
            center: 'title',
            right : 'dayGridMonth'          // mes únicamente (cambia lo que necesites)
        },

        /* --------- Carga inicial de eventos --------- */
        events: '/apps/calendar/events',  // GET → Array<Event>

        /* --------- Click vacío en un día ----------- */
        dateClick(info) {
            openModal({ start_date: info.dateStr });  // crea nuevo
        },

        /* --------- Click en un evento existente ---- */
        eventClick(info) {
            fetch(`/apps/calendar/events/${info.event.id}`, {
                headers: { Accept: 'application/json' }
            })
                .then(r => r.ok ? r.json() : Promise.reject())
                .then(data => openModal(data, true))
                .catch(() => alert('No se pudo cargar el evento.'));
        }
    });

    calendar.render();

    /* --------------------------------------------------
     *     4. Modal Bootstrap + Formulario
     * -------------------------------------------------- */
    const modalEl     = document.getElementById('calendarModal');
    const form        = document.getElementById('calendarForm');
    const deleteBtn   = document.getElementById('deleteEventBtn');
    const addBtn      = document.getElementById('addEventBtn');   // puede no existir

    const bsModal     = modalEl ? bootstrap.Modal.getOrCreateInstance(modalEl) : null;

    addBtn?.addEventListener('click', () => openModal());          // “Nuevo evento”

    /**
     * @param {Object} data       Datos del evento (vacío para nuevo)
     * @param {Boolean} editable  true = edición / false = alta nueva
     */
    function openModal(data = {}, editable = false) {
        if (!modalEl) return;

        form.reset();
        form.dataset.id   = data.id ?? '';
        deleteBtn.style.display = editable ? 'inline-block' : 'none';

        // rellena campos que existan en el form
        Object.entries(data).forEach(([k, v]) => {
            if (form.elements[k]) form.elements[k].value = v ?? '';
        });

        bsModal.show();
    }

    /* --------------------------------------------------
     *     5. Alta / Edición
     * -------------------------------------------------- */
    form?.addEventListener('submit', ev => {
        ev.preventDefault();

        const id      = form.dataset.id;
        const method  = id ? 'PUT' : 'POST';
        const url     = id ? `/apps/calendar/events/${id}` : '/apps/calendar/events';
        const bodyObj = Object.fromEntries(new FormData(form));

        fetch(url, {
            method,
            headers: {
                'Content-Type' : 'application/json',
                'X-CSRF-TOKEN' : csrf,
                'Accept'       : 'application/json',
            },
            body: JSON.stringify(bodyObj)
        })
            .then(r => r.ok ? r.json() : Promise.reject(r))
            .then(() => { bsModal.hide(); calendar.refetchEvents(); })
            .catch(async (r) => {
                const msg = (await r?.json()?.catch(() => null))?.message ?? 'No se pudo guardar el evento.';
                alert(msg);
            });
    });

    /* --------------------------------------------------
     *     6. Eliminación
     * -------------------------------------------------- */
    deleteBtn?.addEventListener('click', () => {
        const id = form.dataset.id;
        if (!id) return;

        if (!confirm('¿Eliminar este evento definitivamente?')) return;

        fetch(`/apps/calendar/events/${id}`, {
            method : 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrf }
        })
            .then(r => r.ok ? r : Promise.reject())
            .then(() => { bsModal.hide(); calendar.refetchEvents(); })
            .catch(() => alert('No se pudo eliminar el evento.'));
    });
});
