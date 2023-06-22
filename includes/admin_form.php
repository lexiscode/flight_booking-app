<label for="name" style="color: white">Name:</label>
                                <input class="form-control" type="text" name="customer_name" id="name" placeholder="Enter Your Full Name">
                                <br>
                                <label for="name" style="color: white">Phone Number:</label>
                                <input class="form-control" type="text" name="customer_name" id="name">
                                <br>
                                <label for="name" style="color: white">Email Address:</label>
                                <input class="form-control" type="email" name="customer_name" id="name">
                                <br>

                                <label for="to" style="color: white">To:</label> <br>
                                <select name="to" id="to" class="form-control" required>
                                    <option selected>City or Airport</option>
                                    <option value="Heathrow LHR">London Airport-Heathrow LHR</option>
                                    <option value="Los Angeles LAX">International Airport of Los Angeles LAX</option>
                                    <option value="Dubai DXB">International Airport of Dubai DXB</option>
                                    <option value="Tokyo HND">Tokyo Airport Haneda HND</option>
                                </select>
                                <br> 
                                <label for="crew" style="color: white">Crew:</label> <br>
                                <select name="crew" id="crew" class="form-control" required>
                                    <option value="">Please select the number of adults</option>
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
                                <br>

                                <label for="airline" style="color: white">Preferred Airline:</label> <br>
                                <select class="form-control" name="airline" id="airline" required>
                                    <option selected>Please select your preferred airline</option>
                                    <option value="Delta Airlines">Delta Airlines</option>
                                    <option value="Wiz Air">Wiz Air</option>
                                    <option value="Blue Air">Blue Air</option>
                                    <option value="SkyWest Airlines">SkyWest Airlines</option>
                                </select>
                                <br>

                                <label for="seat" style="color: white">Preferred Seating:</label> <br>
                                <select class="form-control" name="seat" id="seat" required>
                                    <option selected>Please select your seat</option>
                                    <option value="1A">1 A</option>
                                    <option value="2B">2 B</option>
                                    <option value="3C">3 C</option>
                                    <option value="4D">4 D</option>
                                    <option value="1C">1 C</option>
                                </select>

                                <br> 
                                <label for="date" style="color: white">Departure Date:</label>
                                <input class="form-control" type="date" name="date" required>
                                <br>
                                <label for="time" style="color: white">Departure Time:</label>
                                <input class="form-control" type="time" name="time" required>
                                <br>


                                <b>Please select your fare</b> <br>
                                <input type="radio" id="oneWay" name="fare" value="oneWay" checked>
                                <label for="oneWay">One way</label>
                                <input type="radio" id="roundTrip" name="fare" value="roundTrip">
                                <label for="roundTrip">round-Trip</label>

                                <br> <br>
                                <textarea class="form-control" id="message" name='message' rows="5" cols="40">Any message...</textarea>