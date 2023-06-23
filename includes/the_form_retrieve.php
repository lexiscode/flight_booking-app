<fieldset>
    <legend><b>Location</b></legend>

    <label for="to">Destination:</label>
    <select name="to" id="to" required>
        <?php
        $destination = ["London Airport-Heathrow LHR", "International Airport of Los Angeles LAX", "International Airport of Dubai DXB", "Tokyo Airport Haneda HND"];

        foreach ($destination as $type) {
            $selected = ($type === $location_to) ? "selected" : "";
            echo "<option value='$type' $selected>$type</option>";
        }
        ?>
    </select>

    <br> <br>
    <label for="crew">Crew:</label>
    <select name="crew" id="crew" required>
    <?php
    $crewMembers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"];

    foreach ($crewMembers as $member) {
        $selected = ($member === $crew) ? "selected" : "";
        echo "<option value='$member' $selected>$member</option>";
    }
    ?>
    </select>

    
</fieldset>

<br>
<fieldset>
    <legend><b>Choose Preferences</b></legend>
    <label for="airline">Preferred Airline:</label>
    <select name="airline" id="airline" required>
        <?php
        $airlines = ["Delta Airlines", "Wiz Air", "Blue Air", "SkyWest Airlines"];

        foreach ($airlines as $type) {
            $selected = ($type === $airline) ? "selected" : "";
            echo "<option value='$type' $selected>$type</option>";
        }
        ?>
    </select>

    <label for="seat">Preferred Seating:</label>
    <select name="seat" id="seat" required>
        <?php
        $seats = ["1A", "2B", "3C", "4D", "1C"];

        foreach ($seats as $type) {
            $selected = ($type === $seat) ? "selected" : "";
            echo "<option value='$type' $selected>$type</option>";
        }
        ?>
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

<br> <br>

<fieldset>
    <legend><b>Please select your fare</b></legend>
    <input type="radio" id="oneWay" name="fare" value="oneWay" <?php echo ($fare === "oneWay") ? "checked" : ""; ?>>
    <label for="oneWay">One way</label>
    <input type="radio" id="roundTrip" name="fare" value="roundTrip" <?php echo ($fare === "roundTrip") ? "checked" : ""; ?>>
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