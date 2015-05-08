
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Booking Form ( Hotel, Flight, Car, Cruises)</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>
<p class="links"><a href="index.php">Main Form</a> | <a href="detail.php" class="selected">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php">Payment Form</a></p>
<div class="tabbed-area">
  <ul class="tabs group">
    <li><a href="#box-one">Your Detail</a></li>
  </ul>
  <div class="box-wrap">
    <div id="box-one">
      <p class="detail"></p>
      <form  method="post">
        <p class="pull-left">
          <label>First Name*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Sur Name*</label>
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
        <p class="pull-left">
          <label>Telephone</label>
          <input type="text" class="small1"/>
          <input type="text" class="small2"/>
        </p>
        <p class="pull-right">
          <label>Mobile</label>
          <input type="text" class="small1"/>
          <input type="text" class="small2"/>
        </p>
        <p>
          <label class="label">Bed</label>
          <select class="wd">
            <option></option>
            <option></option>
            <option></option>
            <option> </option>
          </select>
        </p>
        <input type="checkbox" name="smoking" value="Smoking"/>
        Smoking
        <input type="checkbox" name="smoking" value="No-Smoking"/>
        No-Smoking
        <p>
          <button type="submit" class="orange_btn">Continue </button>
        </p>
      </form>
    </div>
  </div>
</div>
</body>
</html>
