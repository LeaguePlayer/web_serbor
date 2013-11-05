$(document).ready(function() {
// begin Ready

	$("input[type=submit]").hide();
	$('.no_java_note').hide();
	$('.java_only').show();
		
	//...................................................
	// When the collection form changes
	$('#mapCollection').change(function() {
		$(this).closest('form').submit();
	});
	
	$('#mapForm').change(function() {
		var selectedStatus = $('#mapForm option:selected').val();
		if (selectedStatus == 'ALL'){
			$('a.dot').show();
		}else{
			$('a.dot[status = "'+selectedStatus+'"]').show();
			$('a.dot[status != "'+selectedStatus+'"]').hide();
		}
	});
	
	
	$('a.dot').qtip({
		content: {
			text: function(api) {
				var objectID = $(this).attr('id') + "info";
				return $('#' + objectID)
			}
		},
		show: {
			solo: true,
			event: 'click mouseenter'
		},
		hide: {
			event: 'click'
		},
		position: {
			my: 'bottom left',
			at: 'top right'
		},
		style: {
			classes: 'ui-tooltip-light ui-tooltip-shadow'			
		}
	});
	
	
	
	//...................................................
	// Optimize objects table layout for better viewing, using accordion sliders
	// $("#accordion").accordion(); // for full accordion feature (only 1 table section open at any time)
	$('#accordion .head').next().hide();
 	
	$('#accordion .head').click(function() {
  		$(this).next().toggle('slow', function() {
  		});
 	});
	

// end Ready
});