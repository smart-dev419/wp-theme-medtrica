jQuery(document).ready(function(){

	

	jQuery('#mob-menu').mmenu();
	
	jQuery("#es_txt_email").attr("placeholder", "Email Address *");

	if (jQuery(window).width() < 768) {

		jQuery('#mainfooter .topfooter .colum').first().find('h5').addClass('active');

		jQuery('#mainfooter .topfooter .colum').first().find('h5').next().slideDown();

			jQuery("#mainfooter .topfooter h5").on("click", function() {

			jQuery('#mainfooter .topfooter h5').next().slideUp();								

			if(jQuery(this).hasClass("active")){				

				jQuery(this).next().slideUp();

				jQuery(this).removeClass('active');				

			}

			else{

				jQuery('#mainfooter .topfooter .colum h5').removeClass('active');

				jQuery(this).next().slideDown();

				jQuery(this).addClass('active');

			}

		});			

	}

	jQuery('#tab-downloads a').attr('target', '_blank');

});