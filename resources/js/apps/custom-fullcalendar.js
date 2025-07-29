// resources/js/apps/custom-fullcalendar.js
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import esLocale from '@fullcalendar/core/locales/es';

document.addEventListener('DOMContentLoaded', () => {
  // ─── 1) Nodos del DOM ─────────────────────────
  const calendarEl = document.querySelector('.calendar');
  if (!calendarEl) return;

  const modalEl   = document.getElementById('calendarModal');
  const bsModal   = bootstrap.Modal.getOrCreateInstance(modalEl);
  const idEl      = document.getElementById('event-id');
  const titleEl   = document.getElementById('event-title');
  const startEl   = document.getElementById('event-start-date');
  const endEl     = document.getElementById('event-end-date');
  const addBtn    = document.querySelector('.btn-add-event');
  const updateBtn = document.querySelector('.btn-update-event');
  const deleteBtn = document.querySelector('.btn-delete-event');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  // ─── 2) Modal ────────────────────────────────
  function resetModal() {
    idEl.value = '';
    titleEl.value = '';
    startEl.value = '';
    endEl.value = '';
    document.querySelectorAll('input[name="level"]').forEach(r => r.checked = false);
  }

  function openModal(data = {}) {
    resetModal();

    if (data.id) {
      idEl.value       = data.id;
      titleEl.value    = data.title || '';
      startEl.value    = (data.start_date  || '').slice(0,16);
      endEl.value      = (data.end_date    || '').slice(0,16);

      if (data.level) {
        const radio = document.querySelector(`input[name="level"][value="${data.level}"]`);
        if (radio) radio.checked = true;
      }

      addBtn.style.display    = 'none';
      updateBtn.style.display = deleteBtn.style.display = 'inline-block';
      document.getElementById('calendarModalLabel').textContent = 'Editar Evento';
    } else {
      addBtn.style.display    = 'inline-block';
      updateBtn.style.display = deleteBtn.style.display = 'none';
      document.getElementById('calendarModalLabel').textContent = 'Nuevo Evento';
    }

    bsModal.show();
  }

  // ─── 3) FullCalendar ─────────────────────────
  const calendar = new Calendar(calendarEl, {
    plugins:     [ dayGridPlugin, interactionPlugin ],
    locale:      esLocale,
    initialView: 'dayGridMonth',
    headerToolbar: {
  left:   'prev,next addEventButton',
  center: 'title',
  right:  'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
},
   customButtons: {
  addEventButton: {
    text:  'Agregar Evento',
    click: () => openModal()
  }
},

    events:     '/apps/calendar/events',
    selectable: true,
    editable:   true,

    select(info) {
      openModal({ start_date: info.startStr, end_date: info.endStr });
    },

    eventClick(info) {
      fetch(`/apps/calendar/events/${info.event.id}`, {
        headers: { Accept: 'application/json' }
      })
        .then(r => r.ok ? r.json() : Promise.reject())
        .then(data => openModal(data))
        .catch(() => alert('No se pudo cargar el evento.'));
    },

    eventDrop(info) {
      const ev = info.event;
      const payload = {
        title:      ev.title,
        start_date: ev.start.toISOString(),
        end_date:   ev.end ? ev.end.toISOString() : '',
        level:      document.querySelector('input[name="level"]:checked')?.value
      };
      fetch(`/apps/calendar/events/${ev.id}`, {
        method: 'PUT',
        credentials: 'same-origin',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(payload)
      })
      .catch(() => alert('No se pudo mover el evento.'));
    }
  });

  calendar.render();

  // ─── 4) Crear Evento ─────────────────────────
  addBtn.addEventListener('click', () => {
    const payload = {
      title:       titleEl.value,
      start_date:  startEl.value,
      end_date:    endEl.value,
      level:       document.querySelector('input[name="level"]:checked')?.value
    };
    fetch('/apps/calendar/events', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      },
      body: JSON.stringify(payload)
    })
      .then(r => r.ok ? r.json() : Promise.reject(r))
      .then(() => {
        bsModal.hide();
        calendar.refetchEvents();
      })
      .catch(async r => {
        const err = (await r.json().catch(() => {}))?.message || 'Error al crear evento';
        alert(err);
      });
  });

  // ─── 5) Actualizar Evento ────────────────────
  updateBtn.addEventListener('click', () => {
    const id = idEl.value;
    const payload = {
      title:       titleEl.value,
      start_date:  startEl.value,
      end_date:    endEl.value,
      level:       document.querySelector('input[name="level"]:checked')?.value
    };
    fetch(`/apps/calendar/events/${id}`, {
      method: 'PUT',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      },
      body: JSON.stringify(payload)
    })
      .then(r => r.ok ? r.json() : Promise.reject(r))
      .then(() => {
        bsModal.hide();
        calendar.refetchEvents();
      })
      .catch(async r => {
        const err = (await r.json().catch(() => {}))?.message || 'Error al actualizar evento';
        alert(err);
      });
  });

  // ─── 6) Eliminar Evento ──────────────────────
  deleteBtn.addEventListener('click', () => {
    const id = idEl.value;
    if (!confirm('¿Eliminar este evento?')) return;
    fetch(`/apps/calendar/events/${id}`, {
      method: 'DELETE',
      credentials: 'same-origin',
      headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      }
    })
      .then(r => r.ok ? r : Promise.reject(r))
      .then(() => {
        bsModal.hide();
        calendar.refetchEvents();
      })
      .catch(() => alert('Error al eliminar evento'));
  });
});
