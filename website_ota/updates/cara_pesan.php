 

<?PHP
	require ('config/hotel.conn.php');
	
?>
<script>
  $(function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = $( "#effectTypes" ).val();
 
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 100 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 280, height: 185 } };
      }
 
      // run the effect
      $( "#hidecarihotel" ).toggle( selectedEffect, options, 500, callback );
    };
 
    //callback function to bring a hidden box back
    function callback() {
      setTimeout(function() {
        $( "#hidecarihotel:visible" ).removeAttr( "style" ).fadein();
      }, 1000 );
    };
 
    // set effect from select menu value
    $( "#carihotel" ).click(function() {
      runEffect();
    });
 
    $( "#hidecarihotel" ).hide();
  });
  </script>
  <input type="hidden" name="effects" id="effectTypes" value="blind"/>
<div class="cpp">
<div id="container" class="clearfix">
      <div id="panoramicBoxHolder">
    <div id="panoramicBoxContainer">
      <div class="panoramicImg panoramic1"></div>
      <div id="panoramicBoxFrame">
        <div id="panoramicContentFrame">
          <div id="panoramicContent">
              <div id="howToIntroWidget">
  <h2>Cara Pesan hotle Pesawat di walanja.co.id</h2>
  <div id="howToIntroMsg">
    <div id="howToIntroMsgContent">Pesan hotel di walanja.co.id hanya dalam 5 langkah! <br>Scroll ke bawah untuk melihat langkah-langkahnya.</div>
  </div>
</div>
<div id="howToVideoCntr"><a href="javascript: void(0)" id="howToVideoLink"><div id="howToVideoIcon"></div><div id="howToVideoMsg">Tonton video tutorialnya</div></a></div>

          </div>
        </div>
      </div>
    </div>
  </div>
    <div id="howToCntr">
    <div id="howToContent">

 <div class="featureContentHolder howToMenu" id="stepOneMenu">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="leftHalfFeatureContainer">
        <h3 class="indexNumber">1. </h3>
        <h3 class="title">Cari Hotel</h3>
        <span class="content">Mulai pencarian Anda di halaman muka walanja.co.id dan masukkan data-data pemesan.</span>
        <a href="javascript: void(0)" class="moreInfo" id="carihotel" open-content="stepOneContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step1.png">
      </div>
      
    </div>
  </div>
</div>
<br>
<br>
<br>
 <div id="hidecarihotel"><div class="featureContentHolder howToInfo" id="stepOneContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Cari penerbangan</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step1-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Buka <strong>www.traveloka.com</strong></span></li>
          <li><span>Masukkan data yang diperlukan:</span>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Kota Asal</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Kota Tujuan</div>
              </li>
            </ul>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Tanggal Berangkat</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Tanggal Pulang (jika ada)</div>
              </li>
            </ul>
          </li>
          <li><span>Penumpang dapat dikategorikan sebagai:</span>
            <ul class="floatListCntr passengerList">
              <li>
                <div class="floatListIcon adult"></div>
                <div class="floatListLabel">Dewasa (&gt;12 tahun)</div>
              </li>
              <li>
                <div class="floatListIcon child"></div>
                <div class="floatListLabel">Anak (2-12 tahun)</div>
              </li>
            </ul>
            <ul class="floatListCntr passengerList">
              <li>
                <div class="floatListIcon infant"></div>
                <div class="floatListLabel">Bayi (0-2 tahun)</div>
              </li>
            </ul>
          </li>
          <li><span>Klik tombol "Cari Tiket" untuk memulai pencarian</span></li>
        </ul>
      </div>
      
    </div>
  </div>
</div>
</div>


            <div class="featureContentHolder howToMenu" id="stepTwoMenu">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="leftHalfFeatureContainer">
        <h3 class="indexNumber">2. </h3>
        <h3 class="title">Pilih hotel tujuan</h3>
        <span class="content">Di halaman hasil pencarian, Anda bisa langsung memilih hotel sesuai tujuan keberangkatan Anda. Tekan tombol selengkapnya untuk memilih hotel</span>
        <a href="javascript: void(0)" class="moreInfo" open-content="stepTwoContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step2.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="stepTwoContentWrapper" style="display:none"><div class="featureContentHolder howToInfo" id="stepTwoContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Pilih dan pesan penerbangan</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step2-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Anda akan dibawa ke halaman hasil pencarian penerbangan.</span></li>
          <li><span>Pilih penerbangan yang sesuai dengan Anda.</span></li>
          <li><span>Di kolom fasilitas, terdapat beberapa icon:</span>
            <ul class="floatListCntr facilityList">
              <li>
                <div class="floatListIcon baggage"></div>
                <div class="floatListLabel">Harga termasuk bagasi</div>
              </li>
              <li>
                <div class="floatListIcon meal"></div>
                <div class="floatListLabel">Harga termasuk makanan</div>
              </li>
            </ul>
          </li>
          <li><span class="orderNowText">Untuk melakukan pemesanan, tekan tombol</span><div class="orderNowIcon"></div></li>
          <li><span>Untuk melihat rincian penerbangan, klik di dalam area berwarna kuning.</span></li>
        </ul>

      </div>
      
    </div>
  </div>
</div>
</div>


            <div class="featureContentHolder howToMenu" id="stepThreeMenu">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="leftHalfFeatureContainer">
        <h3 class="indexNumber">3. </h3>
        <h3 class="title">Pilih tipe ruangan sesuai yang Anda inginkan</h3>
        <span class="content">Setelah memilih Hotel, Anda bisa memilih tipe ruangan sesuai yang anda inginkan</span>
        <a href="javascript: void(0)" class="moreInfo" open-content="stepThreeContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step3.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="stepThreeContentWrapper" style="display:none"><div class="featureContentHolder howToInfo" id="stepThreeContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp;a. Isi Data Pemesan yang dapat dihubungi</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step3a-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Anda akan dibawa ke halaman pemesanan</span></li>
          <li><span>Pastikan penerbangan yang Anda pilih cocok dengan yang Anda pesan</span></li>
          <li><span>Isi <strong>Data Pemesan yang dapat dihubungi</strong>:</span>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Nama kontak</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">No. Telepon/HP</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Alamat Email</div>
              </li>
            </ul>
            <ul class="floatListCntr contactWarningList">
              <li>
                <div class="floatListIcon warning"></div>
                <div class="floatListLabel">E-tiket resmi Traveloka.com akan dikirimkan ke email ini. Mohon pastikan email yang Anda cantumkan benar dan dapat diakses.</div>
              </li>
            </ul>
          </li>
          <li><span>Setelah semua data telah terisi dengan benar, klik tombol "Lanjutkan"</span></li>
        </ul>
      </div>
      <h4>&nbsp;b. Isi Data Penumpang</h4>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step3b-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Persiapkan kartu identitas Anda.</span></li>
          <li><span>Isi Titel sesuai jenis kelamin Anda (Tuan, Nyonya, atau Nona)</span></li>
          <li><span>Isi <strong>Nama Penumpang Sesuai Identitas</strong> yang berlaku, tanpa gelar/titik/koma.</span></li>
          <li><span>Untuk maskapai yang memerlukan <strong>tanggal lahir</strong> dan <strong>kewarganegaraan</strong>, isilah sesuai dengan kartu identitas yang berlaku.</span></li>
          <li><span>Jika terdapat pilihan jumlah bagasi, Belilah sesuai dengan kebutuhan Anda. Harga <strong>Rp.0,00</strong> artinya bagasi sudah termasuk ke dalam harga tiket.<br>
            <strong>NB:</strong> Beberapa maskapai, seperti <strong>AirAsia</strong> dan <strong>Tiger/Mandala</strong>, memiliki jumlah bagasi minimum yang harus Anda beli.</span></li>
          <li><span>Untuk menambah jumlah penumpang yang berangkat, tekan tombol Ya di samping <strong>"Tambah Jumlah Penumpang?"</strong><br>
            <strong>NB:</strong> Penambahan penumpang dapat mengakibatkan kenaikan harga tiket per penumpang.</span></li>
          <li><span>Setelah semua data telah terisi dengan benar, klik tombol "Lanjut ke pemesanan" </span></li>
        </ul>
      </div>
      
    </div>
  </div>
</div>
</div>



            <div class="featureContentHolder howToMenu" id="stepFourMenu">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="leftHalfFeatureContainer">
        <h3 class="indexNumber">4. </h3>
        <h3 class="title">Isi data pemesan dan lakukan pembayaran</h3>
        <span class="content">Setelah memilih kamar anda akan diminta untuk mengisi data yang diperlukan untuk pemesanan kamar tersebut dan melakukan pembayaran.</span>
        <a href="javascript: void(0)" class="moreInfo" open-content="stepFourContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step4.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="stepFourContentWrapper" style="display:none"><div class="featureContentHolder howToInfo" id="stepFourContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Lakukan pembayaran</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step4-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Di halaman pembayaran, Anda akan memilih metode pembayaran yang sesuai dengan Anda.</span></li>
          <li><span>Traveloka.com menerima pembayaran melalui metode:</span>
            <ul class="floatListCntr paymentList">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>Bank Transfer</strong><br>(Mandiri, BCA, BNI)</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>Kartu Kredit</strong><br>(Visa, Mastercard)</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>Mandiri Clickpay</strong></div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>BCA Klikpay</strong></div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>ATM</strong><br>(Bersama, Prima, Alto)</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>CIMB Clicks</strong></div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>Mandiri eCash</strong></div>
              </li>
            </ul>
          </li>
          <li><span>Jika Anda ingin menggunakan Voucher walanja, klik tombol "Gunakan Voucher".</span></li>
          <li><span>Pembayaran dapat dilakukan dengan memilih tombol yang sesuai. Form pengisian akan otomatis keluar.</span></li>
          <li><span>Lakukan pembayaran sesuai instruksi yang terdapat di halaman pembayaran. Untuk transfer, perhatikan limit waktu yang diberikan. Pastikan Anda melakukan transfer dalam jangka waktu yang telah ditentukan.</span></li>
        </ul>
      </div>
      
    </div>
  </div>
</div>
</div>


            <div class="featureContentHolder howToMenu" id="stepFiveMenu">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="leftHalfFeatureContainer">
        <h3 class="indexNumber">5. </h3>
        <h3 class="title">Download bukti pemesan</h3>
        <span class="content">Setelah pembayaran dilakukan, Anda akan mendapatkan link download bukti pemesanan di halaman Account walanja.co.id Anda</span>
        <a href="javascript: void(0)" class="moreInfo" open-content="stepFiveContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step5.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="stepFiveContentWrapper" style="display:none"><div class="featureContentHolder howToInfo" id="stepFiveContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp;E-tiket dikirimkan</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://asset.traveloka.com/assets/images/how-to/how_to_content_step5-300000.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Transaksi telah selesai.</span></li>
          <li><span>Anda akan mendapatkan konfirmasi pembayaran via Email.</span></li>
          <li><span>Link bukti pemesanan resmi dari walanja.co.id muncul ketika Anda telah selesai Melakukan <strong>pembayaran </strong>.</span></li>
        </ul>
      </div>
      
    </div>
  </div>
</div>
</div>
    </div>
    </div>

    <div id="videoTutorialCntr" style="display: none">
      <div id="videoTutorialCloseIcon" class="tvCloseWhiteIcon"></div>
      <div id="videoTutorialFrame">
        <iframe id="videoTutorial" width="640" height="480" src="//www.youtube.com/embed/P_Ro-PBotLs?feature=player_embedded" frameborder="0" allowfullscreen=""></iframe>
        <!--<iframe width="640" height="480" src="//www.youtube.com/embed/P_Ro-PBotLs?rel=0" frameborder="0" allowfullscreen></iframe>-->
      </div>
    </div>
  </div>	

</div>

	<!-- FOOTER -->
	<div class="footerbgblack">
		<div class="container">		
				
				<div class="col-md-3">
					<span class="ftitle">Temukan Kami</span>
					<div class="scont">
						<a href="#" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
						<a href="#" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
						<a href="#" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
						<a href="#" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
						<br/><br/><br/>
						<img src="images/logosmal.png" alt="" /><br/>
						&copy; 2014  |  <a href="http:cmedia.co.id">CMedia Developers</a><br/>
						All Rights Reserved 
						<br/><br/>	
					</div>
				</div>
				<!-- End of column 1-->
				
				<div class="col-md-3">
					<span class="ftitle">Pencarian Hotel Populer di Bandung</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="#">Bandung Barat</a></li>
						<li><a href="#">Bandung Timur</a></li>
						<li><a href="#">Bandung Selatan</a></li>
						<li><a href="#">Bandung Utara</a></li>
						<li><a href="#">Pusat Kota</a></li>	
					</ul>
				</div>
				<!-- End of column 2-->		
				
				<div class="col-md-3">
					<span class="ftitle">Tentang Walanja</span>
					<br/><br/>
					<ul class="footerlist">
						<li><a href="index.php?menu=tutor">Cara Pemesanan</a></li>
						<li><a href="#">Hubungi Kami</a></li>
						<li><a href="index.php?menu=faq">FAQ</a></li>
						<li><a href="#">Karir</a></li>
					</ul>				
				</div>
				<!-- End of column 3-->		
				
				<div class="col-md-3 grey">
					<span class="ftitle">Newsletter</span>
					<div class="relative">
						<input type="email" class="form-control fccustom" id="exampleInputEmail1" placeholder="Enter email">
						<button type="submit" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/></button>
					</div>
					<br/><br/>
					<span class="ftitle">Layanan pelanggan</span><br/>
					<span class="pnr">022-9291-4001</span><br/>
					sales@walanja.co.id
				</div>			
				<!-- End of column 4-->			
			</div>	
		</div>
		
		<div class="footerbg2">
			<div class="container center grey"> 
			<a href="index.php">Home</a> | 
			<a href="index.php">Penawaran Spesial</a> | 
			<a href="index.php?menu=list">Pencarian Hotel</a> | 
			<a href="http://walanja.co.id/index.php?menu=login">Log In</a></br>
			<a href="#top" class="gotop scroll"><img src="images/spacer.png" alt=""/></a>
			</div>
		</div>
