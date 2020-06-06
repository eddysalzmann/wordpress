/**
**  Disable second click on a swatch to prevent undefined variations
**/

$(document).on('click','.swatch',function(e){
	e.stopPropagation();
	$(this).closest('.tawcvs-swatches').find('.disabled').removeClass('disabled');
	if($(this).hasClass('selected')){
		$(this).addClass('disabled');
	}
});
