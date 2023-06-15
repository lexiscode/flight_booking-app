<form action="" method="POST">
    <fieldset>
        <legend><b>Location</b></legend>
        <label for="from">From:</label>
        <select name="from" id="from" required>
            <option selected>City or Airport</option>
            <option value="Heathrow LHR">London Airport-Heathrow LHR</option>
            <option value="Los Angeles LAX">International Airport of Los Angeles LAX</option>
            <option value="Dubai DXB">International Airport of Dubai DXB</option>
            <option value="Tokyo HND">Tokyo Airport Haneda HND</option>
        </select>

        <label for="to">To:</label>
        <select name="to" id="to" required>
            <option selected>City or Airport</option>
            <option value="Heathrow LHR">London Airport-Heathrow LHR</option>
            <option value="Los Angeles LAX">International Airport of Los Angeles LAX</option>
            <option value="Dubai DXB">International Airport of Dubai DXB</option>
            <option value="Tokyo HND">Tokyo Airport Haneda HND</option>
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
        <input type="date" name="date" value="<?= htmlspecialchars($booking_date); ?>" required>

        <label for="time">Departure Time:</label>
        <input type="time" name="time" value="<?= htmlspecialchars($booking_time); ?>" required>
    </fieldset>
    <br>

    <fieldset>
        <legend><b>Age Grade:</b></legend>
        <label for="adults">Adults (12+ Yrs)</label>
        <select name="adults" id="adults" required>
            <option value="">Please select the number of adults</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="children">Children (2-11 Yrs)</label>
        <select name="children" id="children" required>
            <option value="">Please select the number of children</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="infants">Infants (0-2 Yrs)</label>
        <select name="infants" id="infants" required>
            <option value="">Please select the number of infants</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </fieldset>
    <br> <br>

    <fieldset>
        <legend><b>Please select your fare</b></legend>
        <input type="radio" id="oneWay" name="fare" value="oneWay" checked>
        <label for="oneWay">One way</label>
        <input type="radio" id="roundTrip" name="fare" value="roundTrip">
        <label for="roundTrip">round-Trip</label>


        <br> <br>
        <textarea id="message" name='message' rows="5" cols="30"><?= htmlspecialchars($customer_message); ?></textarea>
    </fieldset>
    <br>

    <fieldset>
        <legend><b>Personal details</b></legend>
        <label for="name">Full name:</label>
        <input type="text" name="name" id="name" size="40" value="<?= htmlspecialchars($customer_name); ?>" required>
        <br>
        <label for="phoneNo">Phone number:</label>
        <input type="text" id="phoneNo" name="phone_no" size="40" max="15" value="<?= htmlspecialchars($phone_no); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" size="40" value="<?= htmlspecialchars($email); ?>" required>
    </fieldset>

    <button type="submit" name="save">UPDATE NOW!</button> <input type="reset" value="Reset">
</form>