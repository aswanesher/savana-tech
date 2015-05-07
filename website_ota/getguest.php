<script type="text/javascript">
	$("#country_select").select2({
                placeholder: "Select your country"
            });
			
	$(document).ready(function(){
		$("#cekPassVal").keyup(function () {
					var passVal 	= $('input:password[name=password]').val();
					var passCekVal = $('input:password[name=passwordCek]').val();
					if(passVal != passCekVal){
						$('#yaVal').hide();
						$('#tidakVal').show();
					}else if(passVal == '' || passCekVal == ''){
						$('#yaVal').hide();
						$('#tidakVal').hide();
					}else{
						$('#tidakVal').hide();
						$('#yaVal').show();
					}
				});
	});
</script>
<?PHP
	require ('config/hotel.conn.php');
	$email 		= $_GET['emailcek'];
	$pass 		= $_GET['passwordcek'];
	$password 	= crypt(md5($pass), md5($pass));
	$qrycek 	= $conn->query("SELECT * FROM guest_book WHERE email = '".$email."' AND password_encrypt = '".$password."'");
	$dataguest	= $qrycek->fetch(PDO::FETCH_ASSOC);
	if ($dataguest['gender'] == "Laki-Laki"){
		$gender = "M";
	}else{
		$gender = "F";
	}
	if ($dataguest['book_id'] != ''){
		echo '
		
												<h4 class="block">Buat Akun</h4>
													<div class="form-group">
													   <label class="control-label col-md-3">Email<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="email" placeholder="Please provide email address" value="'.$dataguest['email'].'" readonly />
														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kata Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" class="form-control" name="password" placeholder="Please provide password" value="'.$dataguest['password'].'" readonly />
														 
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Ulangi Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" id="cekPassVal" value="'.$dataguest['password'].'" class="form-control" name="passwordCek" placeholder="repeat password" readonly />
														  <span class="error-span"></span>
														  <span id="tidakVal" style="color: red;display: none">Kata sandi tidak cocok!</span>
														  <span id="yaVal" style="color: green;display: none">Kata sandi cocok!</span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Nama<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="name" placeholder="Please provide your name" value="'.$dataguest['name'].'" readonly />
														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Jenis Kelamin<span class="required">*</span></label>
													   <div class="col-md-4">
													   ';
													   if ($gender == "M"){
															 echo '<label class="radio">
																<input type="radio" name="gender" value="'.$gender.'" data-title="Male" class="uniform" checked="checked" disabled />
															 Laki-Laki
															 </label>';
															 }else{
															 echo '<label class="radio">
																<input type="radio" name="gender" value="'.$gender.'" data-title="Male" class="uniform" disabled />
															 Laki-Laki
															 </label>';
															 }
														if ($gender == "F"){
															 echo '<label class="radio">
																<input type="radio" name="gender" value="'.$gender.'" data-title="Female" class="uniform" checked="checked" disabled />
															 Perempuan
															 </label>';
														}else{
															 echo '<label class="radio">
																<input type="radio" name="gender" value="'.$gender.'" data-title="Female" class="uniform" disabled />
															 Perempuan
															 </label>';
														}
														echo '
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Alamat<span class="required">*</span></label>
													   <div class="col-md-4">
														  <textarea type="text" class="form-control" name="location" placeholder="Please provide home address" >'.$dataguest['location'].'</textarea>
														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Negara</label>
													   <div class="col-md-4">
														  <select name="country" id="country_select" class="col-md-12 full-width-fix" >';
																echo '<option value="" >-- Pilih Negara --</option>';
																$qrycountry 	= "SELECT * FROM m_country";
																$stmtcountry 	= $conn->prepare( $qrycountry );
																$stmtcountry->execute();		 
																while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
																extract($rowcountry);
																	if($dataguest['country'] == $count_id){
																		echo '<option value="'.$count_id.'" selected>'.$count_name.'</option>';
																	}else{
																		
																		echo '<option value="'.$count_id.'" >'.$count_name.'</option>';
																	}
																}
														  echo '</select>
													   </div>													
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No. Telepon<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="phone" value="'.$dataguest['phone'].'" placeholder="Please provide phone number" />
														  
													   </div>
													</div>
		
		';
	}else{
	
		echo '
												<div class="row">
												<div class="col-md-6">
												<div id="warning" class="alert alert-block alert-warning fade in">Akun Belum Terdaftar !!!</div>
												</div>
												</div>
												<h4>Buat Akun</h4>
													<div class="form-group">
													   <label class="control-label col-md-3">Email<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="email" placeholder="Please provide email address"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Kata Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" class="form-control" name="password" placeholder="Please provide password"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Ulangi Sandi<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="password" id="cekPassVal" value="" class="form-control" name="passwordCek" placeholder="repeat password" />
														  <span class="error-span"></span>
														  <span id="tidakVal" style="color: red;display: none">Kata sandi tidak cocok!</span>
														  <span id="yaVal" style="color: green;display: none">Kata sandi cocok!</span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Nama<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="name" placeholder="Please provide your name"/>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Jenis Kelamin<span class="required">*</span></label>
													   <div class="col-md-4">
															 <label class="radio">
																<input type="radio" name="gender" value="M" data-title="Male" class="uniform" checked="checked" />
															 Laki-Laki
															 </label>
															 <label class="radio">
																<input type="radio" name="gender" value="F" data-title="Female" class="uniform"/>
															 Perempuan
															 </label>														  
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Alamat<span class="required">*</span></label>
													   <div class="col-md-4">
														  <textarea type="text" class="form-control" name="location" placeholder="Please provide home address" ></textarea>
														  <span class="error-span"></span>
													   </div>
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">Negara</label>
													   <div class="col-md-4">
														  <select name="country" id="country_select" class="col-md-12 full-width-fix">
															 <option value=""></option>';
															 
																$qrycountry 	= "SELECT * FROM m_country";
																$stmtcountry 	= $conn->prepare( $qrycountry );
																$stmtcountry->execute();		 
																while ($rowcountry = $stmtcountry->fetch(PDO::FETCH_ASSOC)){
																extract($rowcountry);
															echo ' 
															 <option value="'.$count_id.'">'.$count_name.'</option>
															 ';
															 
																}
															 echo'
														  </select>
													   </div>													
													</div>
													<div class="form-group">
													   <label class="control-label col-md-3">No. Telepon<span class="required">*</span></label>
													   <div class="col-md-4">
														  <input type="text" class="form-control" name="phone" placeholder="Please provide phone number"/>
														  <span class="error-span"></span>
													   </div><br><br><br>
													  
													</div>
		
		';
	
	
	}
?>