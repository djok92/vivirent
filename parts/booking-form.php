<div class="booking-form">
    <form>
        <div class="booking-form__item">
            <label>Datum dolaska</label>
            <div class="datepicker-holder">
                <i class="fa fa-calendar-o"></i>
                <input id="datepicker" type="text" name="date_arival" class="datepicker date-icon form-control" />
            </div>
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label>Broj noci:</label>
            <select id="count_nights" type="text" name="count_nights" class="select2 night" >
                <option>1 noć</option>
                <option>2 noći</option>
                <option>3 noći</option>
                <option>4 noći</option>
                <option>5 noći</option>
                <option>6 noći</option>
                <option>7 noći</option>
            </select> 
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label>Broj osoba:</label>
            <select id="count_persons" type="text" name="count_persons" class="select2 person" >
                <option>1 osoba</option>
                <option>2 osobe</option>
                <option>3 osobe</option>
                <option>4 osobe</option>
                <option>5 osoba</option>
                <option>6 osoba</option>
                <option>7 osoba</option>
            </select> 
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <label>Posebni uslovi</label>
            <select id="special_requests" type="text" name="special_requests" class="select2 person" >
                <option>Sopstveni bazen</option>
                <option>Sopstveni ulaz</option>
                <option>Sopstveno kupatilo</option>
                <option>Sopstveni ulaz</option>
            </select> 
        </div> <!-- /.booking-form__item -->
        <div class="booking-form__item">
            <input type="submit" name="submit" value="pretraži"/>
        </div> <!-- /.booking-form__item -->
    </form>
</div> <!-- /.booking-form -->
