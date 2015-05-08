
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Travel Booking Form  Hotel, Flight, Car, Cruises"/>
<title>Travel Booking Form ( Hotel, Flight, Car, Cruises)</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>
<body>
<p class="links"><a href="index.php">Main Form</a> | <a href="detail.php">Detail Form</a> |<a href="account.php">Account Form</a> | <a href="payment.php" class="selected">Payment Form</a></p>
<div class="tabbed-area">
  <ul class="tabs group">
    <li><a href="#box-two">Payment Detail</a></li>
  </ul>
  <div class="box-wrap">
    <div id="box-one">
      <p class="payment"></p>
      <form  method="post">
        <h3>Cardholder Name</h3>
        <p>
          <label>Title</label>
          <select>
            <option>Mr</option>
            <option>Mrs</option>
          </select>
        </p>
        <p class="pull-left">
          <label>First Name*</label>
          <input type="text" />
        </p>
        <p class="pull-right">
          <label>Surname*</label>
          <input type="text" />
        </p>
        <h3>Billing Address</h3>
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
        <h3>Card Detail</h3>
        <p class="pull-left">
          <label>Card Type*</label>
          <select>
            <option>VISA</option>
            <option>MASTER</option>
            <option>MASTEREO</option>
            <option>VISA USA</option>
          </select>
        </p>
        <p class="pull-right">
          <label>Card Number*</label>
          <select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </p>
        <label class="label">Expiry Date</label>
        <select>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
        <span>/</span>
        <select>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
        <p>
          <label>CVC Code</label>
          <input type="text" class="small3"/>
        </p>
        <input type="checkbox" name="terms" />
        I have read and agree the Terms &amp; Conditions
        <p >
          <button type="submit" class="orange_btn">Confirm </button>
        </p>
      </form>
    </div>
    <form action="">
      <h3>Cardholder Name</h3>
      <p>
        <label>Tital</label>
        <select>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
        </select>
      </p>
      <p class="pull-left">
        <label>First Name*</label>
        <input type="text" />
      </p>
      <p class="pull-right">
        <label>Surname*</label>
        <input type="text" />
      </p>
      <h3>Billing Address</h3>
      <p class="pull-left">
        <label>Country*</label>
        <select>
          <option></option>
          <option></option>
          <option></option>
          <option></option>
        </select>
      </p>
      <p class="pull-right">
        <label>City*</label>
        <select>
          <option></option>
          <option></option>
          <option></option>
          <option></option>
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
      <h3>Card Detail</h3>
      <p class="pull-left">
        <label>Card Type*</label>
        <select>
          <option></option>
          <option></option>
          <option></option>
          <option></option>
        </select>
      </p>
      <p class="pull-right">
        <label>Card Number*</label>
        <select>
          <option></option>
          <option></option>
          <option></option>
          <option></option>
        </select>
      </p>
      <label class="label">Expiry Date</label>
      <select class="wd">
        <option></option>
        <option></option>
        <option></option>
        <option> </option>
      </select>
      <span>/</span>
      <select class="wd">
        <option></option>
        <option></option>
        <option></option>
        <option> </option>
      </select>
      <p>
        <label>CVC Code</label>
        <input type="text" class="small3" />
      </p>
      <input type="checkbox" name="terms"/>
      I have read and agree the Terms &amp; Conditions
      <p >
        <button type="submit" class="orange_btn">Confirm </button>
      </p>
    </form>
  </div>
</div>
</body>
</html>
