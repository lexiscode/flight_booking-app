<fieldset>
    <legend><b>Location</b></legend>

    <label for="to">To:</label>
    <select name="to" id="to" required>
        <option selected>City or Airport</option>
        <option value="Heathrow LHR">London Airport-Heathrow LHR</option>
        <option value="Los Angeles LAX">International Airport of Los Angeles LAX</option>
        <option value="Dubai DXB">International Airport of Dubai DXB</option>
        <option value="Tokyo HND">Tokyo Airport Haneda HND</option>
    </select>

    <br> <br>
    <label for="crew">Crew:</label>
    <select name="crew" id="crew" required>
        <option value="">Please select the number of travellers</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
</fieldset>

<br>
<fieldset>
    <legend><b>Choose Preferences</b></legend>
    <label for="airline">Preferred Airline:</label>
    <select name="airline" id="airline" required>
        <option selected>Please select your preferred airline</option>
        <option value="Delta Airlines">Delta Airlines</option>
        <option value="Wiz Air">Wiz Air</option>
        <option value="Blue Air">Blue Air</option>
        <option value="SkyWest Airlines">SkyWest Airlines</option>
    </select>

    <label for="seat">Preferred Seating:</label>
    <select name="seat" id="seat" required>
        <option selected>Please select your seat</option>
        <option value="1A">1 A</option>
        <option value="2B">2 B</option>
        <option value="3C">3 C</option>
        <option value="4D">4 D</option>
        <option value="1C">1 C</option>
    </select>
</fieldset>
<br>

<fieldset>
    <legend><b>Set Date and Time</b></legend>
    <label for="date">Departure Date:</label>
    <input type="date" name="date" required>

    <label for="time">Departure Time:</label>
    <input type="time" name="time" required>
</fieldset>
<br>

<br> <br>

<fieldset>
    <legend><b>Please select your fare</b></legend>
    <input type="radio" id="oneWay" name="fare" value="oneWay" checked>
    <label for="oneWay">One way</label>
    <input type="radio" id="roundTrip" name="fare" value="roundTrip">
    <label for="roundTrip">round-Trip</label>


    <br> <br>
    <textarea id="message" name='message' rows="5" cols="30">Any message...</textarea>
</fieldset>
<br>

<fieldset>
    <legend><b>Personal details</b></legend>
    <label for="name">Full name:</label>
    <input type="text" name="name" id="name" size="40" required>
    <br>
    <label for="phoneNo">Phone number:</label>
    <input type="text" id="phoneNo" name="phone_no" size="40" max="15" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" size="40" required>
</fieldset>