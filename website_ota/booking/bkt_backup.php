<?PHP
	include("../plugins/mpdf/mpdf.php");
	require ("../config/hotel.conn.php");
	
	//$code = $_POST['code'];
	$code = "20150128RWKCM0000";
	$qrycekguest 	= $conn->query("SELECT a.kategory_item,a.book_kode,a.`name`,a.location,a.email FROM guest_book a WHERE a.book_kode = '".$code."' AND a.flag_batal = 0");
	$qrycekguest	= $qrycekguest->fetch(PDO::FETCH_ASSOC);
	
	$check_in = date("M,d Y", strtotime($qrycekguest['check_in']));
	$check_out = date("M,d Y", strtotime($qrycekguest['check_out']));
	
	$newtext = wordwrap($qrycekguest['hotel_address'], 20, "<br />\n");
	$in			= date_create($qrycekguest['check_in']);
	$out		= date_create($qrycekguest['check_out']);
	$tot_day	= date_diff($in,$out);
	
		function acak($panjang)
		{
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$string = '';
			for ($i = 0; $i < $panjang; $i++) {
				$pos = rand(0, strlen($karakter)-1);
				$string .= $karakter{$pos};
			}
			return $string;
		}
		$autoname = acak(5);
	
	$html='
	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CMedia OTA | Invoice</title>
    <link rel="stylesheet" href="style.css" media="all" />
	<style>
		@font-face {
		  font-family: SourceSansPro;
		  src: url(SourceSansPro-Regular.ttf);
		}

		.clearfix:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		a {
		  color: #FF9600;
		  text-decoration: none;
		}

		body {
		  position: relative;
		  width: 21cm;  
		  height: 29.7cm; 
		  margin: 0 auto; 
		  color: #555555;
		  background: #FFFFFF; 
		  font-family: Arial, sans-serif; 
		  font-size: 14px; 
		  font-family: SourceSansPro;
		}

		header {
		  padding: 10px 0;
		  margin-bottom: 20px;
		  border-bottom: 1px solid #AAAAAA;
		}

		#logo {
		  float: left;
		  margin-top: 8px;
		}

		#logo img {
		  height: 70px;
		}

		#company {
		  float: right;
		  text-align: right;
		}


		#details {
		  margin-bottom: 50px;
		}

		#client {
		  padding-left: 6px;
		  border-left: 6px solid #FF9600;
		  float: left;
		}

		#client .to {
		  color: #777777;
		}

		h2.name {
		  font-size: 1.4em;
		  font-weight: normal;
		  margin: 0;
		}

		#invoice {
		  float: right;
		  text-align: right;
		}

		#invoice h1 {
		  font-size: 2.4em;
		  line-height: 1em;
		  font-weight: normal;
		  margin: 0  0 10px 0;
		  font-family: "Free 3 of 9";
		  align: center;
		}

		#invoice .date {
		  font-size: 1.1em;
		  color: #777777;
		}

		table {
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-bottom: 20px;
		}

		.table 2{
		  width: 100%;
		  border-collapse: collapse;
		  border-spacing: 0;
		  margin-bottom: 20px;
		}

		table th,
		table td {
		  padding: 20px;
		  background: #EEEEEE;
		  text-align: center;
		  border-bottom: 1px solid #FFFFFF;
		  border-right: 1px solid #FFFFFF;
		}

		.table2 th,
		.table2 td {
		  padding: 5px;
		  background: #FFFFFF;
		  text-align: Left;
		  border-bottom: 1px solid #FFFFFF;
		}

		table th {
		  white-space: nowrap;        
		  font-weight: normal;
		}

		.table2 th {
		  white-space: nowrap;        
		  font-weight: normal;
		}


		table td {
		  text-align: center;
		}

		.table2 td {
		  text-align: right;
		}

		table td h3{
		  color: #FF9600;
		  font-size: 1.2em;
		  font-weight: normal;
		  margin: 0 0 0.2em 0;
		}

		.table2 td h3{
		  color: #FF9600;
		  font-size: 1.2em;
		  font-weight: normal;
		  margin: 0 0 0.2em 0;
		}

		table .no {
		  color: #FFFFFF;
		  font-size: 1.2em;
		  background: #FF9600;
		}

		table .no {
		  color: #FFFFFF;
		  font-size: 1.2em;
		  background: FFFFFF;
		}

		.table2 .no2 {
		  color: #00000;
		  font-size: 1em;

		}

		table .desc {
		  text-align: center;
		}

		table .unit {
		  background: #DDDDDD;
		  min-width:100px;
		}

		.table .unit 2{
		  min-width:100px;
		  font-weight:bold;
		}

		table .qty {
		}

		table .total {
		  background: #FF9600;
		  color: #FFFFFF;
		}

		table td.unit,
		table td.qty,
		table td.total {
		  font-size: 1.2em;
		}

		table tbody tr:last-child td {
		  border: none;
		}

		table tfoot td {
		  padding: 10px 20px;
		  background: #FFFFFF;
		  border-bottom: none;
		  font-size: 1.2em;
		  white-space: nowrap; 
		  border-top: 1px solid #AAAAAA; 
		}

		table tfoot tr:first-child td {
		  border-top: none; 
		}

		table tfoot tr:last-child td {
		  color: #FF9600;
		  font-size: 1.4em;
		  border-top: 1px solid #FF9600; 

		}

		table tfoot tr td:first-child {
		  border: none;
		}

		#thanks{
		  font-size: 2em;
		}

		#notices{
		  padding-left: 6px;
		  border-left: 6px solid #FF9600;  
		}

		#notices .notice {
		  font-size: 1.2em;
		}

		footer {
		  color: #777777;
		  width: 100%;
		  height: 30px;
		  position: relative;
		  bottom: 0;
		  border-top: 1px solid #AAAAAA;
		  padding: 8px 0;
		  text-align: center;
		}

		.ttd {
		width:150px;
		height:90px;
		position:left;
		margin-left:634px;
		margin-top:-100px;


		}



	
	</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <div id="company">
        <h2 class="name">CMedia OTA</h2>
        <div>Jl. Bagusrangin no. 8, Dipatiukur, Bandung</div>
        <div>(022) 929214001</div>
        <div><a href="mailto:company@example.com">walanja.co.id</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Bukti Pemesanan:</div>
          <h2 class="name">'.$qrycekguest['name'].'</h2>
          <div class="address">'.$qrycekguest['location'].'</div>
          <div class="email"><a href="#">'.$qrycekguest['email'].'</a></div>
        </div>
        <div id="invoice">
          <h1>'.$qrycekguest['book_kode'].'</h1><div style="margin-top: -15px;margin-right: 35px;">| '.$qrycekguest['book_kode'].' |</div>
          <div class="date">Date of Reservation:&nbsp;&nbsp;'.$qrycekguest['tgl_pesan'].'</div>
          <div class="date">date to use:&nbsp;&nbsp;'.$qrycekguest['check_in'].'</div>
        </div>
      </div>
	  
	  <!--BARU-->
	  <table class="table2">
		 <tr>
            <th class="no2">Booking ID :</th>
			<th class="unit2"><b>'.$qrycekguest['book_kode'].'</b></th>
            <th class="unit2">Number of Rooms :</th>
            <th class="qty2"><b>'.$qrycekguest['noroom'].'</b></th>
          </tr>
		  
		  <tr>
            <th class="no2">Booking Reference No :</th>
			<th class="unit2"></th>
            <th class="unit2">PAX :</th>
            <th class="qty2"><b>'.$qrycekguest['pax'].'</th>
          </tr>
		  
		  <tr>
            <th class="no2">Guest Name :</th>
			<th class="unit2"><b>'.$qrycekguest['name'].'</b></th>
            <th class="unit2">Day Total :</th>
            <th class="qty2"><b>'.$tot_day->format("%a").'</b></th>
          </tr>
		  
		    <tr>
            <th class="no2">Country :</th>
			<th class="unit2"><b>'.$qrycekguest['negara'].'</b></th>
            <th class="unit2">Breakfast:</th>
            <th class="qty2"><b>Included</b></th>
          </tr>
		  
		    <tr>
            <th class="no2">Hotel :</th>
			<th class="unit2"><b>'.$qrycekguest['hotel_nama'].'</b></th>
            <th class="unit2">Room Type:</th>
            <th class="qty2"><b>'.$qrycekguest['room_type'].'</b></th>
          </tr>
		  
		  <tr>
            <th class="no2">Address :</th>
			<th class="unit2"><b>'.$newtext.'</b></th>
            <th class="unit2">Hotel Contact Number :</th>
            <th class="qty2"><b>022-3293332</b></th>
          </tr>
		  
		  </table>	
		  
		  <div class="notice">Any cancellation received within 2 days prior to arrival date will incur the first night charge. Failure to arrive at 	your hotel will be treated as a No-Show and
			will incur the first night charge (Hotel policy).
		</div><br>
		  
		  
	  
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
		<tr>
            <th class="no">#</th>
			<th class="no">Arrival</th>
            <th class="no">Departure</th>
            <th class="no">Payment Method</th>
          </tr>
          <tr>
            <th class="desc">1</th>
			<th class="desc">'.$check_in.'</th>
            <th class="desc">'.$check_out.'</th>
            <th class="desc">Bank Transfer</th>
          </tr>
        </thead>
        <tbody>  
        </thead>
        </tbody>
		
 
       <!-- <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="3">SUBTOTAL</td>
            <td>$5,200.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="3">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="3">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>-->
      </table>
	  
	  
		  
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>Remarks:</div>
        <div class="notice">All special Request are subject to avaibility upon arrival
			<div><img src="ttd.png" alt="ttd" class="ttd";></div>
			</div>		
	  </div><br>
	  
	  <div id="notices">
		<div>Notice:</div>
			<ul>
			<li>give this invoice when you come for the reservation</li>
			<li>IMPORTANT: At check-in, you must present the credit card used to make this booking and a valid photo ID with the same name. Failure to do so may result in the hotel requesting additional payment or your reservation not being honored. If you have submitted additional documentation for a third party booking or paid via a different payment method, please disregard the note above.</li> 
			<li>All rooms are guaranteed on the day of arrival. In the case of a no-show, your room(s) will be released and you will be subject to the terms and conditions of the Cancellation/No-Show Policy specified at the time you made the booking as well as noted in the Confirmation Email.</li>
			<li>The total price for this booking does not include mini-bar items, telephone usage, laundry service, etc. The hotel will bill you directly. </li>
			<li>In cases where Breakfast is included with the room rate, please note that certain hotels may charge extra for children travelling with their parents. If applicable, the hotel will bill you directly. Upon arrival, if you have any questions, please verify with the hotel. </li>
			</ul>
      </div>
    </main>
    <footer>
      This card is the official media of <a href="http:www.cmedia.co.id"><i>CMedia Ota</i><a>
    </footer>
  </body>
</html>
	
	';
	
	echo $html;
	
	/*
	$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->list_indent_first_level = 0; 
	//$stylesheet = file_get_contents('../plugins/mpdf/mpdf.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output('doc/Confirmation-ID-'.$code.'-'.$autoname.'.pdf');
	
	//UPDATE GUEST RESERVATION
	$qryupdate = "UPDATE guest_book set flag_confirm = '1', pdf_name = 'Confirmation-ID-".$code."-".$autoname.".pdf' where book_kode = :book_kode";
    $stmt_update = $conn->prepare($qryupdate);
    $stmt_update->bindParam(':book_kode', $code);
    $stmt_update->execute();
	
	//JIKA NAMA FILE NYA SAMA LANGSUNG OTOMATIS NGEDOWNLOAD
	/*
	$filename = "simpan/".$autoname.".pdf";
	if (file_exists($filename)) {
	   header('Content-type: application/force-download');
	   header('Content-Disposition: attachment; filename='.$filename);
	   readfile($filename);
	}*/
	
?>