import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin    from '@fullcalendar/daygrid';
import timeGridPlugin   from '@fullcalendar/timegrid';
import listPlugin       from '@fullcalendar/list';
import esLocale         from '@fullcalendar/core/locales/es';

document.addEventListener('DOMContentLoaded', () => {
  // ──────────────────────────────────────────────
  // 1) Contenedor del calendario
  // ──────────────────────────────────────────────
  const calendarEl = document.querySelector('.calendar');
  if (!calendarEl) return;

  // ──────────────────────────────────────────────
  // 2) Elementos del modal (IDs y clases que usas)
  // ──────────────────────────────────────────────
  const modalEl    = document.getElementById('calendarModal');
  const bsModal    = bootstrap.Modal.getOrCreateInstance(modalEl);
  const eventIdEl  = document.getElementById('event-id');
  const titleEl    = document.getElementById('event-title');
  const startEl    = document.getElementById('event-start-date');
  const endEl      = document.getElementById('event-end-date');
  const addBtn     = document.querySelector('.btn-add-event');
  const updBtn     = document.querySelector('.btn-update-event');
  const delBtn     = document.querySelector('.btn-delete-event');
  const csrfToken  = document.querySelector('meta[name="csrf-token"]').content;

  // ──────────────────────────────────────────────
  // 3) Función para abrir modal (nuevo o editar)
  // ──────────────────────────────────────────────
  function openModal(data = {}) {
    // limpia o rellena
    eventIdEl.value = data.id || '';
    titleEl.value   = data.title || '';
    startEl.value   = data.start_date ? data.start_date.slice(0,16) : '';
    endEl.value     = data.end_date   ? data.end_date.slice(0,16)   : '';

    // nivel (radio)
    document.querySelectorAll('input[name="level"]').forEach(r => r.checked = false);
    if (data.level) {
      const r = document.querySelector(`input[name="level"][value="${data.level}"]`);
      if (r) r.checked = true;
    }

    // botones
    if (data.id) {
      addBtn.style.display = 'none';
      updBtn.style.display = delBtn.style.display = 'inline-block';
      document.getElementById('calendarModalLabel').textContent = 'Editar Evento';
    } else {
      addBtn.style.display = 'inline-block';
      updBtn.style.display = delBtn.style.display = 'none';
      document.getElementById('calendarModalLabel').textContent = 'Nuevo Evento';
    }

    bsModal.show();
  }

  // ──────────────────────────────────────────────
  // 4) Inicializa FullCalendar
  // ──────────────────────────────────────────────
  const calendar = new Calendar(calendarEl, {
    plugins:     [ interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin ],
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

    // al seleccionar rango → nuevo
    select(info) {
      openModal({
        start_date: info.startStr,
        end_date:   info.endStr
      });
    },

    // al hacer click sobre evento → editar
    eventClick(info) {
      fetch(`/apps/calendar/events/${info.event.id}`, {
        headers: { Accept: 'application/json' }
      })
        .then(r => r.ok ? r.json() : Promise.reject())
        .then(data => openModal(data))
        .catch(() => alert('No se pudo cargar el evento.'));
    }
  });

  calendar.render();

  // ──────────────────────────────────────────────
  // 5) Alta de evento
  // ──────────────────────────────────────────────
  addBtn.addEventListener('click', () => {
    const payload = {
      title:      titleEl.value,
      start_date: startEl.value,
      end_date:   endEl.value,
      level:      document.querySelector('input[name="level"]:checked')?.value
    };
    fetch('/apps/calendar/events', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      },
      body: JSON.stringify(payload)
    })
      .then(r => r.ok ? r.json() : Promise.reject())
      .then(() => { bsModal.hide(); calendar.refetchEvents(); })
      .catch(() => alert('Error al crear evento'));
  });

  // ──────────────────────────────────────────────
  // 6) Actualización de evento
  // ──────────────────────────────────────────────
  updBtn.addEventListener('click', () => {
    const id = eventIdEl.value;
    const payload = {
      title:      titleEl.value,
      start_date: startEl.value,
      end_date:   endEl.value,
      level:      document.querySelector('input[name="level"]:checked')?.value
    };
    fetch(`/apps/calendar/events/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      },
      body: JSON.stringify(payload)
    })
      .then(r => r.ok ? r.json() : Promise.reject())
      .then(() => { bsModal.hide(); calendar.refetchEvents(); })
      .catch(() => alert('Error al actualizar evento'));
  });

  // ──────────────────────────────────────────────
  // 7) Eliminación de evento
  // ──────────────────────────────────────────────
  delBtn.addEventListener('click', () => {
    const id = eventIdEl.value;
    if (!confirm('Eliminar evento?')) return;
    fetch(`/apps/calendar/events/${id}`, {
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Accept':       'application/json'
      }
    })
      .then(r => r.ok ? r : Promise.reject())
      .then(() => { bsModal.hide(); calendar.refetchEvents(); })
      .catch(() => alert('Error al eliminar evento'));
  });
});
