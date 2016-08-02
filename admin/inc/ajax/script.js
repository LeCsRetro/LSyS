$(document).ready(function(){

	/* Cambiare l'effetto da utilizzare cubic */
	$.easing.def = "easeOutCubic";

	/* Associare una funzione all'evento click sul link */
	$('li.title a').click(function(e){
	
		/* Finding the drop down list that corresponds to the current section: */
		var subMenu = $(this).parent().next();
		
		/* Trovare il sotto menu che corrisponde alla voce cliccata */
		$('.sub-menu').not(subMenu).slideUp('slow');
		subMenu.stop(false,true).slideToggle('slow');
		
		/* Prevenire l'evento predefinito (che sarebbe di seguire il collegamento) */

	})
	
});