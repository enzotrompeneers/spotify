<div class="row">
    <div class="large-12 columns">
        <h1>Wedstrijddatum Aanmaken</h1>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <form action="{{ route('datum.store') }}" method="POST">
        {{ csrf_field() }}
            <div class="row">
                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="startDate">Start Datum</label>
                        <input type="date" id="startDate" name="startDate" required pattern="date">
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="startHour">Start uur</label>
                        <input type="time" id="startHour" name="startHour" required pattern="time">
                        
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="endDate">Einde Datum</label>
                        <input type="date" id="endDate" name="endDate" required pattern="date">
                    </div>
                </div>

                <div class="large-3 columns">
                    <div class="form-group">
                        <label for="endHour">Einde uur</label>
                        <input type="time" id="endHour" name="endHour" required pattern="time">
                        
                    </div>
                </div>
                <div class="large-12 columns">
                    <button type="submit" class="btn_spotify ">
                        Aanmaken
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>