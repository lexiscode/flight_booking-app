<?php require "json_db.php"; ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div id="list" class="header">
        <h2>Booking List</h2>
        <form action="" method="POST">
            <div class="container">
                <?php foreach ($airports as $index => $airport) : ?>
                    <div class="booking-item">
                        
                        <span class="booking-info"><b>Name:</b> <?php echo $airport['name']; ?></span>
                        <span class="booking-info"><b>Date:</b> <?php echo $airport['date']; ?></span>
                        <span class="booking-info"><b>From:</b> <?php echo $airport['from']; ?></span><br>
                        <span class="booking-info"><b>To:</b> <?php echo $airport['to']; ?></span>
                        <span class="booking-info"><b>Time:</b> <?php echo $airport['time']; ?></span>
                        <span class="booking-info"><b>Seat:</b> <?php echo $airport['seat']; ?></span><br>
                        <span class="booking-info"><b>Airline:</b> <?php echo $airport['airline']; ?></span>
                        <span class="booking-info"><b>Adults:</b> <?php echo $airport['adults']; ?></span>
                        <span class="booking-info"><b>Children:</b> <?php echo $airport['children']; ?></span><br>
                        <span class="booking-info"><b>Infants:</b> <?php echo $airport['infants']; ?></span>
                        <span class="booking-info"><b>Fare:</b> <?php echo $airport['fare']; ?></span>
                        <span class="booking-info"><b>E-mail:</b> <?php echo $airport['email']; ?></span><br>
                        <span class="booking-info"><b>Phone Number:</b> <?php echo $airport['phoneNo']; ?></span>
                        <span class="booking-info"><b>Message:</b> <?php echo $airport['message']; ?></span><br>
                        
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button type="submit" id="remove" name="removeTask">Remove</button>




                        <!--Bootstrap-->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $index; ?>">
                        Reschedule
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $index; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $index; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel<?php echo $index; ?>">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php require "the_form.php" ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Update</button>
                            </div>
                            </div>
                        </div>
                        </div>








                        
                        <!--<a href="reschedule.php" target="_blank" id="reschedule">Reschedule</a>-->

                    </div>
                <?php endforeach; ?><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
