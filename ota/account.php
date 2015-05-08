
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Booking Form ( Hotel, Flight, Car, Cruises)</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>
<p class="links"><a href="index.php">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php" class="selected">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <ul class="tabs group">
    <li><a href="#box-one">Account</a></li>
  </ul>
  <div class="box-wrap">
    <div id="box-one">
      <p class="account"></p>
      <form  method="post">
        <h3>Your Detail</h3>
        <p>
          <label>Title</label>
          <select>
            <option>Mr</option>
            <option>Mrs</option>
          </select>
        </P>
        <p class="pull-left">
          <label>First Name*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Surname*</label>
          <input type="text" />
        </p>
        <label class="label">Date of Birth</label>
        <select>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option> 04</option>
        </select>
        <span>/</span>
        <select >
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option> 08</option>
        </select>
        <h3>Registration Detail</h3>
        <p class="pull-left">
          <label>User Name*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Password*</label>
          <input type="text" />
        </p>
        <p class="pull-left">
          <label>Email Address*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Confirm Email Address*</label>
          <input type="text" />
        </p>
        <h3>Contact Detail</h3>
        <p class="pull-left">
          <label>Country*</label>
          <select>
            <option>India</option>
            <option>America</option>
            <option>USA</option>
            <option>Aus</option>
          </select>
        </p>
        <p class="pull-right">
          <label>City*</label>
          <select>
            <option>Ahmedabad</option>
            <option>Vadodara</option>
            <option>Surat</option>
            <option>Gandhinagar</option>
          </select>
        </p>
        <p class="pull-left">
          <label>Address*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Zip/postcode*</label>
          <input type="text" />
        </p>
        <p class="pull-left">
          <label>Telephone</label>
          <input type="text" class="small1"/>
          <input type="text" class="small2 "/>
        </p>
        <p class="pull-right">
          <label>Mobile</label>
          <input type="text" class="small1"/>
          <input type="text" class="small2"/>
        </p>
        <p>
          <input type="checkbox" name="terms"/>
          I have read and agree the Terms & Conditions </p>
        <p>
          <button type="submit" class="orange_btn">Register</button>
        </p>
      </form>
    </div>
  </div>
</div>
</body>
</html>
