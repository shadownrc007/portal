<!-- calendar-modal.blade.php -->
<div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calendarModalLabel">Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Título</label>
          <input id="event-title" name="title" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha Inicio</label>
          <input id="event-start-date" name="start_date" type="datetime-local" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha Fin</label>
          <input id="event-end-date" name="end_date" type="datetime-local" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Nivel / Prioridad</label>
          <div class="d-flex">
            <div class="form-check form-check-primary form-check-inline me-3">
              <input class="form-check-input" type="radio" name="level" value="Work" id="rwork">
              <label class="form-check-label" for="rwork">Work</label>
            </div>
            <div class="form-check form-check-warning form-check-inline me-3">
              <input class="form-check-input" type="radio" name="level" value="Travel" id="rtravel">
              <label class="form-check-label" for="rtravel">Travel</label>
            </div>
            <div class="form-check form-check-success form-check-inline me-3">
              <input class="form-check-input" type="radio" name="level" value="Personal" id="rPersonal">
              <label class="form-check-label" for="rPersonal">Personal</label>
            </div>
            <div class="form-check form-check-danger form-check-inline">
              <input class="form-check-input" type="radio" name="level" value="Important" id="rImportant">
              <label class="form-check-label" for="rImportant">Important</label>
            </div>
          </div>
        </div>
        <input type="hidden" id="event-id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-delete-event" style="display:none">Eliminar</button>
        <button type="button" class="btn btn-primary btn-update-event" style="display:none">Actualizar</button>
        <button type="button" class="btn btn-success btn-add-event">Agregar</button>
      </div>
    </div>
  </div>
</div>
