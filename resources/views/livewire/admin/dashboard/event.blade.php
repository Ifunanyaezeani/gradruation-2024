<div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
            });
            calendar.render();
        });
    </script>
    <div class="page-content-wrapper p-xxl-4 bg-transparent">

        <!-- Title -->
        <div class="row">
            <div class="col-12 mb-5">
                <div class="d-sm-flex justify-content-between align-items-center">
                    <h1 class="h3 mb-2 mb-sm-0">Events</h1>
                    <div class="d-grid"><button type="button" class="btn btn-primary-soft mb-0" data-toggle="modal"
                            data-target="#eventModal"><i class="bi bi-plus-lg fa-fw"></i> Add Event</button></div>
                </div>
            </div>
        </div>
        <div id="calendar" style="padding: 50px;"></div>



        {{-- <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" wire:submit.prevent='ajax' class="form-group">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label>Title</label>
                                <input class="form-control" wire:model="title" type="text" required>
                            </div>
                            <input type="hidden" wire:model="type" value="add">
                            <div class="form-group mb-2">
                                <label>Start</label>
                                <input class="form-control" wire:model="start" type="datetime-local" required>
                            </div>
                            <div class="form-group mb-2">
                                <label>End</label>
                                <input class="form-control" wire:model="end" type="datetime-local" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Event</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('admin.calenderAjax')}}" class="form-group">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group mb-2">
                    <label>Title</label>
                    <input class="form-control" name="title" type="text" required>
                </div>
                <input type="hidden" name="type" value="add">
                <div class="form-group mb-2">
                    <label>Start</label>
                    <input class="form-control" name="start" type="datetime-local" required>
                </div>
                <div class="form-group mb-2">
                    <label>End</label>
                    <input class="form-control" name="end" type="datetime-local" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Event</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
