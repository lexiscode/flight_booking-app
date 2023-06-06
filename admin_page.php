<?php require "json_db.php"; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="list" class="header">
            <h2>Booking List</h2>
            <form action="booking.php" method="POST">
                <?php foreach ($airports as $index => $airport): ?>
                    <div class="booking-item">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <span class="booking-info"><b>Name:</b> <?php echo $airport['name']; ?></span>
                        <span class="booking-info"><b>Date:</b> <?php echo $airport['date']; ?></span>
                        <span class="booking-info"><b>From:</b> <?php echo $airport['from']; ?></span>
                        <span class="booking-info"><b>To:</b> <?php echo $airport['to']; ?></span>
                        <span class="booking-info"><b>Time:</b> <?php echo $airport['time']; ?></span>
                        <span class="booking-info"><b>Seat:</b> <?php echo $airport['seat']; ?></span>
                        <span class="booking-info"><b>Airline:</b> <?php echo $airport['airline']; ?></span>
                        <span class="booking-info"><b>Adults:</b> <?php echo $airport['adults']; ?></span>
                        <span class="booking-info"><b>Children:</b> <?php echo $airport['children']; ?></span>
                        <span class="booking-info"><b>Infants:</b> <?php echo $airport['infants']; ?></span>
                        <span class="booking-info"><b>Fare:</b> <?php echo $airport['fare']; ?></span>
                        <span class="booking-info"><b>E-mail:</b> <?php echo $airport['email']; ?></span>
                        <span class="booking-info"><b>Phone Number:</b> <?php echo $airport['phoneNo']; ?></span>
                        <span class="booking-info"><b>Message:</b> <?php echo $airport['message']; ?></span>
                        <button type="submit" name="removeTask">Remove</button>
                    </div>
                <?php endforeach; ?>
                <input type="submit" value="Clear All" name="clear">
            </form>
        </div>
</body>
</html>
