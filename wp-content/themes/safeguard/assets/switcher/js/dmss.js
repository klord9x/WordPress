

  jQuery(document).ready(function($) {
	  
	  
		  
	jQuery('.demo_changer .demo-icon').click(function(){

		if(jQuery('.demo_changer').hasClass("active")){
			jQuery('.demo_changer').animate({"left":"-165px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});						
		}else{
			jQuery('.demo_changer').animate({"left":"0px"},function(){
				jQuery('.demo_changer').toggleClass("active");
			});			
		} 
	});




	


});



