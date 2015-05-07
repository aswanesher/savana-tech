 

<?PHP
	require ('config/hotel.conn.php');
	
?>
<script>

  $(function() {
  $('#hidecarihotel').hide();
    $('#carihotel').click(function () {
    $('#hidecarihotel').slideToggle('1000');

    return false;
        });
		
	$('.tvCloseGreyIcon').click(function () {
    $('#hidecarihotel').hide('1000');

    return false;
        });
});

    $(function () {
	$('#hidepilihhotel').hide();
    $('#pilihhotel').click(function () {
    $('#hidepilihhotel').slideToggle('1000');

    return false;
        });
		
		$('.tvCloseGreyIcon').click(function () {
    $('#hidepilihhotel').hide('1000');

    return false;
        });
});

    $(function () {
	$('#hidetipe').hide();
    $('#tipe').click(function () {
    $('#hidetipe').slideToggle('1000');

    return false;
        });
		
		
		$('.tvCloseGreyIcon').click(function () {
    $('#hidetipe').hide('1000');

    return false;
        });
});

$(function () {
	$('#hidebooking').hide();
    $('#booking').click(function () {
    $('#hidebooking').slideToggle('1000');

    return false;
        });
		
		
		$('.tvCloseGreyIcon').click(function () {
    $('#hidebooking').hide('1000');

    return false;
        });
});

$(function () {
	$('#hidefinal').hide();
    $('#final').click(function () {
    $('#hidefinal').slideToggle('1000');

    return false;
        });
		
		
		$('.tvCloseGreyIcon').click(function () {
    $('#hidefinal').hide('1000');

    return false;
        });
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
  <h2>Cara Pesan hotel di walanja.co.id</h2>
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

 <div id="hidecarihotel"><div class="featureContentHolder howToInfo">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Tentukan kemana akan pergi</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/substep1.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Buka <strong>www.walanja.co.id</strong></span></li>
          <li><span>Masukkan data yang diperlukan:</span>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Kemana Anda akan pergi</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Tanggal check in</div>
              </li>
            </ul>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Tanggal check out</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Jumlah penghuni kamar</div>
              </li>
            </ul>
          </li>
          <li><span>Klik tombol "Cari" untuk memulai pencarian</span></li>
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
        <h3 class="title">Pilih hotel yang Anda kehendaki</h3>
        <span class="content">Di halaman hasil pencarian, Anda bisa langsung memilih hotel sesuai tujuan keberangkatan Anda. Tekan tombol selengkapnya untuk memilih hotel tersebut</span>
        <a href="javascript: void(0)" class="moreInfo" id="pilihhotel" open-content="stepTwoContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step2.png">
      </div>
      
    </div>
  </div>
</div>

 <div id="hidepilihhotel"><div class="featureContentHolder howToInfo" id="stepOneContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Tentukan dihotel mana Anda akan ingin menginap</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/substep2.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <h4>&nbsp; Sorting hotel berdasarkan peringkatnya</h4>
          <li><span>ada 5 jenis peringkat yaitu :</span>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Hotel bintang 1</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Hotel bintang 2</div>
              </li>
            </ul>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Hotel bintang 3</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Hotel bintang 4</div>
              </li>
			  <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Hotel bintang 5</div>
              </li>
            </ul>
          </li>
          <li><span>Klik selengkapnya untuk memilih hotel yang Anda kehendaki</span>
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
        <a href="javascript: void(0)" class="moreInfo" id="tipe" open-content="stepOneContentWrapper">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step3.png">
      </div>
      
    </div>
  </div>
</div>

<div id="hidetipe"><div class="featureContentHolder howToInfo" id="stepOneContent">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>&nbsp; Pilih tipe kamar yang Anda akan pesan</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/substep3.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <h4>&nbsp; Check kembali infrormasi pemesanan Anda</h4>
          <li><span>ada 5 jenis peringkat yaitu :</span>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Pastikan kembali tanggal check in dan check out</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Pastikan jumlah penghuni kamar</div>
              </li>
            </ul>
            <ul class="floatListCntr">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">Klik Perbaharui untuk memperbaharui informasi</div>
              </li>
            </ul>
          </li>
          <li><span>Tentukan jumlah kamar yang akan Anda pesan</span>
		  <li><span>Klik booking untuk memulai proses pemesanan kamar tersebut</span>
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
        <a href="javascript: void(0)" class="moreInfo" open-content="stepFourContentWrapper" id="booking">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step4.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="hidebooking"><div class="featureContentHolder howToInfo">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4> Isi data pemesan</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/substep4.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
          <li><span>Anda akan diminta untuk mengisi :</span>
            <ul class="floatListCntr paymentList">
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">alamat email</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">kata sandi</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel"><strong>nama pemesan</strong></div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">jenis kelamin</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">lokasi</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">negara</div>
              </li>
              <li>
                <div class="floatListIcon chckIcon"></div>
                <div class="floatListLabel">nomor telepon</div>
              </li>
            </ul>
          </li>
          <li><span>Jika Anda ingin menggunakan Voucher walanja, masukan kode voucher, kemudian klik tombol "Gunakan Voucher".</span></li>
          <li><span>Klik Lanjutkan untuk tahap selanjutnya.</span></li>
		  <li><span>Lakukan pembayaran dan ikuti instruksi-instruksi selanjutnya</span></li>
          
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
        <a href="javascript: void(0)" class="moreInfo" open-content="stepFiveContentWrapper" id="final">Info lengkapnya</a>
      </div>
      <div class="rightHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/step5.png">
      </div>
      
    </div>
  </div>
</div>

          <div id="hidefinal"><div class="featureContentHolder howToInfo">
  <div class="featureContentFrame">
    <div class="featureContentContainer">
            <div class="infoArrowCntr"><div class="infoArrowIcon"></div></div>
      <h4>Download bukti pembayaran</h4>
      <div class="tvCloseGreyIcon"></div>
      <div class="leftHalfFeatureContainer">
        <img src="http://walanja.co.id/assets/css/substep5.jpg">
      </div>
      <div class="rightHalfFeatureContainer">
        <ul>
         <h4>Setelah melakukan pembayaran Anda akan mendapat email konfirmasi dan file bukti pembayaran Anda yang berupa
             voucher booking hotel, selain melalui email Anda dapat juga mengunduh file tersebut menalui halaman akun walanja Anda </h4>
          <li><span>Anda akan mendapatkan konfirmasi pembayaran via Email.</span></li>
          <li><span>File bukti bukti pembayaran yang berupa voucher booking hotel dapat Anda untuk melalui Link di email ataupun pada halaman akun Anda.</span></li>
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
<div class="cpp2">
	<div class="footerbg lcfix">			
					
					<div class="col-md-3">
						<span class="ftitle2">Find Us</span></br>
						<div class="scont3">
							<a href="http://facebook.com/walanjacoid" class="social1b"><img src="images/icon-facebook.png" alt=""/></a>
							<a href="https://twitter.com/walanjacoid" class="social2b"><img src="images/icon-twitter.png" alt=""/></a>
							<a href="#" class="social3b"><img src="images/icon-gplus.png" alt=""/></a>
							<a href="#" class="social4b"><img src="images/icon-youtube.png" alt=""/></a>
							<br/><br/>
							<!--<img src="images/logosmal.png" alt="" /><br/>-->
							&copy; 2015  |  <a href="//cmedia.co.id" target="_blank">CMedia Developers</a><br/>
							All Rights Reserved 
							<br/><br/>	
						</div>
					</div>
					<!-- End of column 1-->
					
					<div class="col-md-3">
						<span class="ftitle2">Pencarian Hotel</span>
						<br/><br/>
						<ul class="footerlist">
							<?PHP
								$qrybannroom	=	$conn->prepare("SELECT * FROM m_wilayah");
								$qrybannroom->execute();
								while ($dtbanneroom=$qrybannroom->fetchObject()){
							?>
							<li><a href="javascript:;" onclick="location.href='index.php?menu=home&wil=<?PHP echo $dtbanneroom->wil_nama?>'"><?PHP echo $dtbanneroom->wil_nama?></a></li>
							<?PHP
							}
							?>
						</ul><br>
					</div>
					<!-- End of column 2-->		
					
					<div class="col-md-3">
						<span class="ftitle2">Tentang Walanja</span>
						<br/><br/>
						<ul class="footerlist">
							<li><a href="javascript:;" onclick="location.href='index.php?menu=tutor'">Cara Pemesanan</a></li>
							<li><a href="javascript:;" onclick="location.href='index.php?menu=faq'">FAQ</a></li>
						</ul><br>			
					</div>
					<!-- End of column 3-->		
					
					<div class="col-md-3 grey">
						
						<span class="ftitle2">Customer support</span><br/><br/>
						<span class="pnr">022-9291-4001</span><br/>
						<span class="pnr2">sales@walanja.co.id</span>
					</div>			
					<!-- End of column 4-->			
		</div>
</div>