document.addEventListener('DOMContentLoaded', function () {
    // Elementos
    const calendarEl = document.querySelector('.calendar');
    const getModalTitleEl = document.querySelector('#event-title');
    const getModalStartDateEl = document.querySelector('#event-start-date');
    const getModalEndDateEl = document.querySelector('#event-end-date');
    const getModalAddBtnEl = document.querySelector('.btn-add-event');
    const getModalUpdateBtnEl = document.querySelector('.btn-update-event');
    const getModalDeleteBtnEl = document.querySelector('.btn-delete-event');

    const calendarsEvents = {
        Work: 'primary',
        Personal: 'success',
        Important: 'danger',
        Travel: 'warning',
    };

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const currentUserId = document.querySelector('meta[name="current-user-id"]').getAttribute('content');

    const myModal = new bootstrap.Modal(document.getElementById('exampleModal'));

    // Reiniciar campos del modal
    function resetModal() {
        getModalTitleEl.value = '';
        getModalStartDateEl.value = '';
        getModalEndDateEl.value = '';
        document.querySelectorAll('input[name="event-level"]').forEach(el => el.checked = false);
        getModalUpdateBtnEl.setAttribute('data-fc-event-public-id', '');
        getModalDeleteBtnEl.setAttribute('data-fc-event-id', '');
    }

    // Lógica del botón "Add Event"
    function calendarAddEvent() {
        resetModal();

        const currentDate = new Date();
        const yyyy = currentDate.getFullYear();
        const mm = String(currentDate.getMonth() + 1).padStart(2, '0');
        const dd = String(currentDate.getDate()).padStart(2, '0');
        const defaultDate = `${yyyy}-${mm}-${dd}`;

        getModalStartDateEl.value = defaultDate;
        getModalEndDateEl.value = defaultDate;

        getModalAddBtnEl.style.display = 'inline-block';
        getModalUpdateBtnEl.style.display = 'none';
        getModalDeleteBtnEl.style.display = 'none';

        myModal.show();
    }

    // Cargar el calendario
    const calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        height: window.innerWidth <= 1199 ? 900 : 1052,
        initialView: window.innerWidth <= 1199 ? 'listWeek' : 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next addEventButton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        locale: 'es',
        events: '/api/calendar/events',

        select: function (info) {
            resetModal();
            getModalStartDateEl.value = info.startStr;
            getModalEndDateEl.value = info.endStr;
            getModalAddBtnEl.style.display = 'inline-block';
            getModalUpdateBtnEl.style.display = 'none';
            getModalDeleteBtnEl.style.display = 'none';
            myModal.show();
        },

        customButtons: {
            addEventButton: {
                text: 'Agregar Evento',
                click: calendarAddEvent
            }
        },



        eventClick: function (info) {
            const event = info.event;
            const eventCreatorId = event.extendedProps.user_id;

            resetModal();
            getModalTitleEl.value = event.title;
            getModalStartDateEl.value = event.startStr;
            getModalEndDateEl.value = event.endStr;

            if (event.extendedProps.level) {
                const levelRadio = document.querySelector(`input[name="event-level"][value="${event.extendedProps.level}"]`);
                if (levelRadio) levelRadio.checked = true;
            }

            if (eventCreatorId == currentUserId) {
                getModalUpdateBtnEl.style.display = 'inline-block';
                getModalDeleteBtnEl.style.display = 'inline-block';
                getModalUpdateBtnEl.setAttribute('data-fc-event-public-id', event.id);
                getModalDeleteBtnEl.setAttribute('data-fc-event-id', event.id);
            } else {
                getModalUpdateBtnEl.style.display = 'none';
                getModalDeleteBtnEl.style.display = 'none';
            }

            getModalAddBtnEl.style.display = 'none';
            myModal.show();
        },

        eventClassNames: function ({ event }) {
            const color = calendarsEvents[event.extendedProps.level] || 'primary';
            return ['event-fc-color', 'fc-bg-' + color];
        }
    });

    calendar.render();

    // Crear evento
    getModalAddBtnEl.addEventListener('click', function () {
        const title = getModalTitleEl.value;
        const start = getModalStartDateEl.value;
        const end = getModalEndDateEl.value;
        const levelEl = document.querySelector('input[name="event-level"]:checked');
        const level = levelEl ? levelEl.value : null;

        fetch('/api/calendar/events', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ title, start, end, level })
        })
            .then(res => res.json())
            .then(data => {
                calendar.refetchEvents();
                myModal.hide();
            })
            .catch(err => {
                console.error(err);
                alert('Error al crear el evento');
            });
    });

    // Eliminar evento
    getModalDeleteBtnEl.addEventListener('click', function () {
        const eventId = this.getAttribute('data-fc-event-id');
        if (!eventId) return;

        if (!confirm('¿Deseas eliminar este evento?')) return;

        fetch(`/api/calendar/events/${eventId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            }
        })
            .then(res => res.json())
            .then(() => {
                calendar.refetchEvents();
                myModal.hide();
            })
            .catch(err => {
                console.error(err);
                alert('Error al eliminar el evento');
            });
    });
});
