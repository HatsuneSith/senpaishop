$("#banana-range").val(1);

$("#banana-range").on('input change', function() {	
	var bananas = $('#banana-range').val();		
	bananas = parseInt(bananas);

	for (i=1; i < bananas+1; i++) {
		$("#banana-" + i).removeClass('hidden');
	}	

	for (j=bananas+1; j < 6; j++) {
		$("#banana-" + j).addClass('hidden');
		console.log("Wat");
	}	
});