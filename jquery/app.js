(function($){
	$('.addPanier').click(function(event){
		event.preventDefault();
		$.getJSON($(this).attr('href'),function(data){
			if (data.error) {
				alert(data.message);
			}else{
				if (confirm(data.message + ' Voulez vous consulter votre panier ?')) {
					location.href = "panier.php";
				}else{
					$('#taille').empty().append(data.taille);
				}
			}
		});
		return false;
	});
})(jQuery);