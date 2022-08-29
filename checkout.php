<!-- ======================================== NAV BAR ============================ -->
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="checkout.css">
    <!-- FONT Awesome 5 FROM w3schools.com -->
    <title>Checkout</title>
    <script src="https://kit.fontawesome.com/bd1754f914.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg light">
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

   <div class="checkout-wrap">
    <ul class="checkout-bar">
      <li class="visited first">
        <a href="homepage.html">Login</a>
      </li>
      <li class="visited">Book A Slot</li>
      <li class="visited">Parking Details</li>
      <li class="active">Checkout</li>
      <li class="next">Complete</li>
    </ul>
  </div>
    <!--====================================== -->
    <!-- Billing Information -->
    <!--====================================== -->
    <div class="container">
      <form action="payment.php" method="post">
        <div class="row">
          <div class="col">
            <h4 class="title">User Details</h4>
            <!-- Name Input -->
            <div class="inputBox">
              <span>Full Name:</span>
              <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
            </div>
            <!-- Address Input -->
            <div class="inputBox">
             <span>Address:</span>
              <input type="text" id="address" name="address" required>
            </div>
            <div class="flex">
            <!-- unit Number -->
            <div class="inputBox">
              <span>Unit/Floor Number:</span>
              <input type="text" id="unitno" name="unitno" placeholder="#12-345">
            </div>
            <!-- Postal Code -->
            <div class="inputBox">
              <span>Zip Code:</span>
              <input type="number" id="zipcode" name="zipcode" placeholder="123 456">
            </div>
            </div>
          </div>
          <!--====================================== -->
            <!-- PAYMENT METHODS -->
          <!--====================================== -->

          <div class="col">
            <h4 class="title">Payment</h4>
             <!-- Payment Method -->
              <fieldset>
                <legend>Select a method of Payment:</legend>
                <div>
                  <input type="radio" name="payment" value="card" checked>
                  <label for="creditcard">Credit Card</label>
                </div>
                <div>
                  <input type="radio" name="payment" value="paypal">
                  <label for="paypal">Paypal</label>
                </div>
                <div>
                  <input type="radio" name="payment" value="paynow">
                  <label for="paynow">PayNow</label>
                </div>
                <div>
                  <input type="radio" name="payment" value="wechat">
                  <label for="wechat">Wechat</label>
                </div>
                <div>
                  <input type="radio" name="payment" value="bitcoin">
                  <label for="bitcoin">BitCoin</label>
                </div>
              </fieldset>
            <!-- Card Input -->
            <div class="inputBox">
             <span>Card Number:</span>
              <input type="text" id="cardno" name="cardno" placeholder="1111-2222-3333-4444">
            </div>
            <div class="flex">
            <!-- Expiry Date -->
            <div class="inputBox">
              <label for="ExpiryDate">Expiry Date: </label>
              <input type="date" id="expirydate" name="expirydate">
            </div>
            <!-- Security Code-->
            <div class="inputBox">
              <label for="CSV">CSV: </label>
              <input type="number" id="csv" name="csv" placeholder="123" min="1" max="999">
            </div>
            </div>
          </div>
        </div>
        <input type="submit" value="Place Order" class="Submit">
        <input type="reset" value="Cancel Order" class="Reset">
      </form>
      <!-- /////////////////////////CART SUMMARY HERE ////////////////////////////////////// -->

      <form action ="checkout.php" class ="form2" method="get">
        <div class="row2">
          <div class="col2">
            <div class="Header">
              <h3 class="Heading">Cart Summary</h3>
            </div>
            <div class="cart-contents">
              <ul>
                <li class="row list-inline columnCaptions">
                  <span>Hours</span>
                  <span>Vehicle No.</span>
                  <span>Price($)</span>
                </li>
                <li class="row">
				<?php	
				// Database connection
					$conn = new mysqli('localhost','root','','parkingdb');

					if($conn->connect_error){
						echo "$conn->connect_error";
						die("Connection Failed : ". $conn->connect_error);
					} else {
            // Get Info From Database
						$select = "SELECT duration,vehicle FROM booking";
						$selectdata = $conn->query($select);
					}
					if ($selectdata->num_rows > 0){
						while($row =  mysqli_fetch_array($selectdata)) {
				
						$duration = $row['duration'];
						$vehicle = $row['vehicle']; 
						}
					}
				?>
                <input type="number" id="hours" name="hours" class="hours" value = <?php echo $duration/3600; ?> readonly>
                <input type="text" id="vehicle" name="vehicle" class="itemName" value=<?php echo $vehicle; ?> readonly>
                <input type="number" id="price" name="price" class="price" step='0.01' value="1.20" readonly>
               </li>
               <li class="row totals">
                <span class="itemName">Total Price:</span>
                <input type="text" id="totalprice" name="totalprice" class="totalprice" step='0.01' placeholder="$0.00" readonly >		
                </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </form>
      <script lang="javascript">
        function Calculate(){
        var hours = document.getElementsByName('hours');
        var price = document.getElementsByName('price');        
        var total=0;
        for(var i=0;i<hours.length;i++){
          if(parseInt(hours[i].value))
          total += parseInt(hours[i].value)*parseFloat(price[i].value);
        }
        document.getElementById('totalprice').value = "$"+ parseFloat(total).toFixed(2);
      }
      window.onload = Calculate;
    </script>
    </div>
  </body>
</html>