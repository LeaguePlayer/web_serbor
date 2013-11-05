/*-----------------------------------------------------------------------------------
/*
/* Custom JS
/*
-----------------------------------------------------------------------------------*/

/* Start Document */
jQuery(document).ready(function() {

/*----------------------------------------------------*/
/*	Responsive Menu
/*----------------------------------------------------*/

			// Create the dropdown bases
			$("<select />").appendTo("#navigation");
			
			// Create default option "Go to..."
			$("<option />", {
			   "selected": "selected",
			   "value"   : "",
			   "text"    : "Навигация по сайту"
			}).appendTo("#navigation select");
			
				
			// Populate dropdowns with the first menu items
			$("#navigation li a").each(function() {
			 	var el = $(this);
			 	$("<option />", {
			     	"value"   : el.attr("href"),
			    	"text"    : el.text()
			 	}).appendTo("#navigation select");
			});
			
				
			//make responsive dropdown menu actually work			
	     	$("#navigation select").change(function() {
		       	window.location = $(this).find("option:selected").val();
		   	});

/* End Document */
});


