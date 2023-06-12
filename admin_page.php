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
    <h1 id="h1" style="color: white;">Airline Booking Form</h1>
    <div id="list" class="header">
        <h2>Database (Booking List)</h2>
        <form action="" method="POST">
            <div class="container">

            <form action="" method="POST">
                    
                <button type="submit" id="remove" name="clearLists" style="margin-bottom:10px">Clear All</button>
            </form>
                
                <?php foreach ($todoList as $index => $airport) : ?>
                    <div class="booking-item">
                        
                        <span class="booking-info"><b>Name:</b> <?php echo $airport['name']; ?></span>
                        <span class="booking-info"><b>Email:</b> <?php echo $airport['email']; ?></span>
                        <span class="booking-info"><b>Phone Number:</b> <?php echo $airport['phoneNo']; ?></span><br>
                        <span class="booking-info"><b>Adult(s):</b> <?php echo $airport['adults']; ?></span>
                        <span class="booking-info"><b>Children:</b> <?php echo $airport['children']; ?></span>
                        <span class="booking-info"><b>Infants:</b> <?php echo $airport['infants']; ?></span><br>
                        <span class="booking-info"><b>From:</b> <?php echo $airport['from']; ?></span>
                        <span class="booking-info"><b>To:</b> <?php echo $airport['to']; ?></span>
                        <span class="booking-info"><b>Time:</b> <?php echo $airport['time']; ?></span><br>
                        <span class="booking-info"><b>Date:</b> <?php echo $airport['date']; ?></span>
                        <span class="booking-info"><b>Airline:</b> <?php echo $airport['airline']; ?></span>
                        <span class="booking-info"><b>Fare:</b> <?php echo $airport['fare']; ?></span><br>
                        <span class="booking-info"><b>Seat:</b> <?php echo $airport['seat']; ?></span>
                        <span class="booking-info"><b>Message:</b> <?php echo $airport['message']; ?></span><br>
                        
                        <form action="" method="POST">
                            <input type="hidden" name="remove" value="<?php echo $index; ?>">
                            <button type="submit" id="remove" name="removeTask">Remove</button>
                        </form>
                        

                        <!--   Bootstrap   -->
                        <form action="" method="POST">
                            <!-- Button trigger modal -->
                            <button type="button" id="reschedule" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $index; ?>">
                            Reschedule
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop<?php echo $index; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $index; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel<?php echo $index; ?>">Reschedule</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!--our form fields-->
                                    <?php require "modal_form.php" ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    <input type="hidden" name="edit_index" value="<?php echo $index; ?>">
                                </div>
                                </div>
                            </div>
                            </div>

                        </form>
                        


                    </div>
                <?php endforeach; ?><br>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</body>

</html>




