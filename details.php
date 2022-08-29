<!DOCTYPE HTML>
<html lang="en">
  <head>
    <title>Smove Parking Application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="details.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <script src="https://kit.fontawesome.com/bd1754f914.js" crossorigin="anonymous"></script>
    <script src="timer.js"></script>
  </head>
  <header>
    <!-- Required Navigation Bar -->
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
      <i class="fa-solid fa-bars"></i>
      </label>
      <!--  LOGO  SHOWN HERE -->
      <img src="assets/logo.png" alt="Project Logo" href="homepage.html"> 
      <ul>
        <li><a class="active" href="homepage.html">Home</a></li>
        <li><a href="booking.html">Selection</a></li>
        <li><a href="details.php">Details</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <!-- ======================================== NAV BAR ============================ -->
  <body>
    <div class="checkout-wrap">
      <ul class="checkout-bar">
        <li class="visited first">
          <a href="homepage.html">Login</a>
        </li>
        <li class="visited">Book A Slot</li>
        <li class="active">Parking Details</li>
        <li class="next">
          <a href="checkout.php">Checkout</a>
        </li>
        <li class="">Complete</li>
      </ul>
    </div>
    <!-- // Database connection -->
    <?php	
					$conn = new mysqli('localhost','root','','parkingdb');

					if($conn->connect_error){
						echo "$conn->connect_error";
						die("Connection Failed : ". $conn->connect_error);
					} else {
            // Get Info From Database
						$select = "SELECT vehicle,vehType,duration FROM booking";
						$selectdata = $conn->query($select);
					}
					if ($selectdata->num_rows > 0){
						while($row =  mysqli_fetch_array($selectdata)) {
				
						$vehType = $row['vehType'];
						$vehicle = $row['vehicle']; 
						$duration = $row['duration']; 
						}
					}
		?>

    <?php

    // Get Info From Database
    $select = "SELECT username FROM user_form";
    $selectdata = $conn->query($select);

    if ($selectdata->num_rows > 0){
      while($row =  mysqli_fetch_array($selectdata)) {
  
      $username = $row['username'];

      }
    }

    ?>

    <div class="table">
    <form action ="connect.php" method="get">
      <table class="styled-table">
        <thead>
          <!-- TABLE HEADER -->
            <tr>
                <th>username</th>
                <th>Vehicle Type</th>
                <th>Vehicle No.</th>
                <th>Timer</th>
                <th>Parking Lot</th>
            </tr>
        </thead>
        <!-- TABLE CONTENTS -- Fetch from Database -->
        <tbody>
            <tr>
                <td><?php echo $username; ?></td>
                <!-- VEHICLE TYPE here -->
                <td><?php echo $vehType; ?></td>
                <td><?php echo $vehicle; ?></td>
                <td>
                  <div class="timer">
                    <div id="timer-1"></div>
                </div>
                </td>
                <td><?php echo(rand(1,40)); ?></td>
          </tbody>
     </table>
    </form>
    </div>
  
  <!-- UPDATE FORM -->
  <div id="Update">
    <h2><strong>Update Details</strong></h2>
    <div class="container">
      <form action="update.php" method="post">
        <div class="inputBox">
          <label for="vehicle">Vehicle Plate No:</label>
          <input type="text" id="vehicle" name="vehicle" placeholder="Vehicle No" required>
        </div>
        <div class="inputBox">
          <label for="vehType">Vehicle Type :</label>
          <select id="vehType" name="vehType" placeholder="Vehicle Type">
            <option value="car">Car</option>
            <option value="motorbike">Motorbike</option>
            <option value="van">Van</option>
          </select>
        </div>
        <div class="inputBox">
          <label for="duration">Duration :</label>
          <select id="duration" name="duration" placeholder="Hours">
            <option value="3600">1 Hr</option>
            <option value="7200">2 Hrs</option>
            <option value="10800">3 Hrs</option>
            <option value="14400">4 Hrs</option>
            <option value="18000">5 Hrs</option>
            <option value="21600">6 Hrs</option>
            <option value="25200">7 Hrs</option>
            <option value="28800">8 Hrs</option>
            <option value="32400">9 Hrs</option>
            <option value="36000">10 Hrs</option>
            <option value="39600">11 Hrs</option>
            <option value="43200">12 Hrs</option>
            <option value="46800">13 Hrs</option>
            <option value="50400">14 Hrs</option>
            <option value="54000">15 Hrs</option>
            <option value="57600">16 Hrs</option>
            <option value="61200">17 Hrs</option>
            <option value="64800">18 Hrs</option>
            <option value="68400">19 Hrs</option>
            <option value="72000">20 Hrs</option>
            <option value="75600">21 Hrs</option>
            <option value="79200">22 Hrs</option>
            <option value="82800">23 Hrs</option>
            <option value="86400">1 Day</option>
          </div>
        <br>
        <input class="submit-btn" name="submit" id="submit-btn" type="submit" value="Change Now">
        </a>
      </form>
    </div>
  <script>
      // callback function to handle some event after time ends or exceed time limit
      const callback = () => {
          console.log('callback function called!');
      }
      // create Timer instance
      const timer1 = new Timer();
      // 10800 seconds = 3 hours
      timer1.set(<?php echo $duration; ?>, 'timer-1', callback);
      //start the timer
      timer1.start('COUNT_DOWN');
  </script>
  </body>
  <footer>
    <div class="footer">
      <p>2022 &copy; SMOVE <span>|</span> Privacy Policy <span>|</span> Terms of Service</a></p>
    </div>
    </footer>
</html>