<?PHP
	$html = '<!DOCTYPE html>
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
		  padding: 12px;
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


		.ttd {
		width:150px;
		height:90px;
		position:left;
		margin-left:519px;
		margin-top:-100px;


		}



	
	</style>
  </head>
  <body>
    <header class="clearfix" style="padding: 10px 0;margin-bottom: 20px;border-bottom: 1px solid #AAAAAA;">
      <div id="logo" style="float: left;margin-top: 8px;">
        <img src="logo.png" style=" height: 40px;" />
        
      </div>
      <div id="company" style="float: right;text-align: right;">
        <h2 class="name">agent.walanja.co.id</h2>
        <div>Jl. Bagusrangin no. 8, Dipatiukur, Bandung</div>
        <div>(022) 929214001</div>
        <div><a href="http://agent.walanja.co.id">agent.walanja.co.id</a></div>
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
          <div class="date">Tanggal Pemesanan:&nbsp;&nbsp;<b>'.fullDateDay($qrycekguest['date_input']).'</b></div>
          <div class="date">Tanggal Penyerahan:&nbsp;&nbsp;<b>'.fullDateDay($qrycekguest['check_in']).'</b></div>
        </div>
      </div>
	  
	  <!--BARU-->
	  <table width="100%" style="background-color: white">
		 <tr>
				<td >Kode Pemesanan </td>
				<td >:</td>
				<td ><b>'.$qrycekguest['book_kode'].'</b></td>
				<td >Jumlah Ruangan</td>
				<td >:</td>
				<td ><b>'.$qrycekguest['noroom'].' Ruangan</b></td>
			</tr>
		  
			<tr>
				<td >Nama Tamu </td>
				<td >:</td>
				<td ><b>'.$qrycekguest['name'].'</b></td>
				<td >Jumlah Orang</td>
				<td >:</td>
				<td ><b>'.$qrycekguest['pax'].' Orang</b></td>
			</tr>
		  
		  <tr>
				<td >Nama Hotel </td>
				<td >:</td>
				<td ><b>'.$qrycekguest['hotel_nama'].'</b></td>
				<td >Breakfast</td>
				<td >:</td>
				<td ><b>Include</b></td>
			</tr>
		  
		   <tr>
				<td >Type Ruangan </td>
				<td >:</td>
				<td ><b>'.$dataRoom['room_type'].'</b></td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
				<td >&nbsp;</td>
			</tr>
		  
		  </table>	
		  
		   <div class="notice">Setiap pembatalan yang diterima dalam waktu 2 hari sebelum tanggal kedatangan akan dikenakan biaya. Kegagalan untuk tiba di restoran akan diperlakukan sebagai Tidak Hadir dan akan dikenakan biaya (kebijakan Restoran).
		</div><br>
		  
		 <h2 class="name">Telah Dibayar Melalui:</h2> 
	  
		  <table width="100%" style="background-color: #FF9600;color: white">
				<tr>
					<td >Bank Tujuan </td>
					<td >:</td>
					<td style="border-right: 1px solid white"><b>'.$namaBank.'</b></td>
					<td >Asal Bank</td>
					<td >:</td>
					<td style="border-right: 1px solid white"><b>'.$dataPembayaran['asal_bank'].'</b></td>
					<td >Tgl Transfer</td>
					<td >:</td>
					<td ><b>'.fullDateDay($dataPembayaran['tgl_transfer']).'</b></td>
				</tr>
			  
		  </table>	
	  
	  <table width="100%">
		<tr>
			<td width="50%"><div id="thanks">Terima Kasih!</div></td>
			<td width="50%" align="center"><img style="width: 155px;" src="ttd_dir.png" /></td>
		</tr>
	  </table>
	 
      <div id="notices">
        <div>Keterangan :</div>
        <div class="notice">Semua permintaan khusus diberikan pada saat kedatangan.
			</div>		
	  </div><br>
	  
	  <div id="notices">
		<div>Pemberitahuan :</div>
			<ul>
			<li>berikan bukti pemesanan ini ketika anda datang untuk reservasi.</li>
			<li>PENTING: Saat Kunjungan, Anda harus menunjukkan kartu kredit yang digunakan untuk dokumen pendukung pemesanan dan foto ID yang valid dengan nama yang sama. Kegagalan untuk melakukannya dapat mengakibatkan pihak yang dituju meminta pembayaran tambahan atau pemesanan Anda tidak dihormati. Jika Anda telah mengirimkan dokumen tambahan untuk pemesanan melalui pihak ketiga atau dibayar melalui metode pembayaran yang berbeda, abaikan catatan di atas.</li> 
			<li>Semua kamar dijamin pada hari kedatangan. Dalam kasus tidak muncul, ruang (s) akan dirilis dan Anda akan tunduk pada syarat dan ketentuan Pembatalan tersebut / Tidak Hadir Kebijakan yang ditetapkan pada saat Anda membuat pemesanan serta dicatat dalam Konfirmasi email.</li>
			<li>Harga total untuk pemesanan ini tidak termasuk mini-bar item, penggunaan telepon, layanan laundry, dll Hotel akan menagih Anda secara langsung.</li>
			<li>Dalam kasus di mana Sarapan disertakan dengan tarif kamar, harap dicatat bahwa hotel tertentu mungkin akan mengenakan biaya tambahan untuk anak-anak bepergian dengan orang tua mereka. Jika berlaku, hotel akan menagih Anda secara langsung. Setelah tiba, jika Anda memiliki pertanyaan, silakan verifikasi dengan hotel.</li>
			</ul>
      </div>
    </main>
    <footer style="color: #777777;width: 100%;height: 30px;position: relative;bottom: 0;border-top: 1px solid #AAAAAA;padding: 8px 0;">
      <div><p>Kartu ini merupakan media resmi <a href="http:www.cmedia.co.id"><i>Walanja.co.id</i><a></p></div>
	  <div style="margin-top: -49px;margin-left: 517px;"><img style="width: 246px;" src="logosupport.png"></div>
    </footer>
  </body>
</html>';
?>