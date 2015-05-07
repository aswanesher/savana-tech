var FormWizard = function () {
    return {
        init: function () {
            if (!jQuery().bootstrapWizard) {
                return;
            }
			/*-----------------------------------------------------------------------------------*/
			/*	Show country list in Uniform style
			/*-----------------------------------------------------------------------------------*/
            $("#country_select").select2({
                placeholder: "Select your country"
            });
			$("#bank").select2({
                placeholder: "Select your bank"
            });

            var wizform = $('#wizForm');
			var alert_success = $('.alert-success', wizform);
            var alert_error = $('.alert-danger', wizform);
            
			/*-----------------------------------------------------------------------------------*/
			/*	Validate the form elements
			/*-----------------------------------------------------------------------------------*/
            wizform.validate({
                doNotHideMessage: true,
				errorClass: 'error-span',
                errorElement: 'span',
                rules: {
                    /* Create Account */
					email: {
                        required: true,
                        email: true
                    },
                    password: {
                        minlength: 3,
                        required: true
                    },
                    name: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    location: {
                        required: true
                    },
                    country: {
                        required: true
                    },
					phone: {
                        required: true
                    },
					bank: {
                        required: true
                    },
					/* image: {
                        required: true
                    },
					                 
                    account_number: {
						required: true,
                        minlength: 16,
                        maxlength: 16
                    }, */
                    card_cvc: {
						required: true,
                        digits: true,
                        minlength: 3,
                        maxlength: 3
                    },
                    card_expirydate: {
                        required: true
                    },
					 card_holder_name: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { 
                    alert_success.hide();
                    alert_error.show();
                },

                highlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); 
                },

                unhighlight: function (element) { 
                    $(element)
                        .closest('.form-group').removeClass('has-error'); 
                },

                success: function (label) {
                    if (label.attr("for") == "gender") { 
                        label.closest('.form-group').removeClass('has-error').addClass('has-success');
                        label.remove(); 
                    } else { 
                        label.addClass('valid') 
                        .closest('.form-group').removeClass('has-error').addClass('has-success'); 
                    }
                }
            });

            /*-----------------------------------------------------------------------------------*/
			/*	Initialize Bootstrap Wizard
			/*-----------------------------------------------------------------------------------*/
            $('#formWizard').bootstrapWizard({
                'nextSelector': '.nextBtn',
                'previousSelector': '.prevBtn',
                onNext: function (tab, navigation, index) {
                    alert_success.hide();
                    alert_error.hide();
                    if (wizform.valid() == false) {
                        return false;
                    }
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    $('.stepHeader', $('#formWizard')).text('Step ' + (index + 1) + ' of ' + total);
                    jQuery('li', $('#formWizard')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }
                    if (current == 1) {
                        $('#formWizard').find('.prevBtn').hide();
                    } else {
                        $('#formWizard').find('.prevBtn').show();
                    }
                    if (current >= total) {
                        $('#formWizard').find('.nextBtn').hide();
                        $('#formWizard').find('.submitBtn').show();
                    } else {
                        $('#formWizard').find('.nextBtn').show();
                        $('#formWizard').find('.submitBtn').hide();
                    }
                },
                onPrevious: function (tab, navigation, index) {
                    alert_success.hide();
                    alert_error.hide();
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    $('.stepHeader', $('#formWizard')).text('Step ' + (index + 1) + ' of ' + total);
                    jQuery('li', $('#formWizard')).removeClass("done");
                    var li_list = navigation.find('li');
                    for (var i = 0; i < index; i++) {
                        jQuery(li_list[i]).addClass("done");
                    }
                    if (current == 1) {
                        $('#formWizard').find('.prevBtn').hide();
                    } else {
                        $('#formWizard').find('.prevBtn').show();
                    }
                    if (current >= total) {
                        $('#formWizard').find('.nextBtn').hide();
                        $('#formWizard').find('.submitBtn').show();
                    } else {
                        $('#formWizard').find('.nextBtn').show();
                        $('#formWizard').find('.submitBtn').hide();
                    }
                },
				onTabClick: function (tab, navigation, index) {
                    bootbox.alert('please complete charging');
                    return false;
                },
                onTabShow: function (tab, navigation, index) {
                    var total = navigation.find('li').length;
                    var current = index + 1;
                    var $percent = (current / total) * 100;
                    $('#formWizard').find('.progress-bar').css({
                        width: $percent + '%'
                    });
                }
				
				
            });
			function confirm(){	
						var notif = 'Notification!';
						var pesan = 'Pemesanan Berhasil';
						$.gritter.add({
							title: notif,
							text: pesan
						});

						return false;
				}
			function clearInput(){
				$("#wizForm :input").each( function(){
				   $(this).val(''); 
				});
			}
			
			
			
            $('#formWizard').find('.prevBtn').hide();
            $('#formWizard .submitBtn').bind("click", function (event) {
				var url 		= "proses.php";
				var hotel_id 	= $('input:hidden[name=hotel_id]').val();
				var check_in 	= $('input:hidden[name=check_in]').val();
				var check_out 	= $('input:hidden[name=check_out]').val();
				var pax 		= $('input:hidden[name=pax]').val();
				var noroom 		= $('input:hidden[name=noroom]').val();
				var room_id 	= $('input:hidden[name=room_id]').val();
				var totprice 	= $('input:hidden[name=totprice]').val();
				var email 		= $('input:text[name=email]').val();
				var password 	= $('input:password[name=password]').val();
				var name 		= $('input:text[name=name]').val();
				var gender 		= $('input[type="radio"]:checked').val();
				var location 	= $('input:text[name=location]').val();
				var country 	= $('select[name=country]').val();
				var phone 		= $('input:text[name=phone]').val();
				var action 		= "book";
				$('#formWizard').find('.submitBtn').hide();
				//alert(gender);
				
				$.post(url, {
						hotel_id: hotel_id, 
						check_in: check_in, 
						check_out: check_out, 
						pax: pax, 
						noroom: noroom, 
						room_id: room_id,  
						email: email, 
						password: password, 
						name: name, 
						gender: gender, 
						location: location, 
						country: country, 
						phone: phone, 
						totprice: totprice,
						act: action
					} ,function() {
				
				alert_success.show();
				var myVar=setInterval(function(){closeform()},2000);
				function closeform() {
					window.close();
				}
				});
				
				
				
			}).hide();
        }
    };
}();