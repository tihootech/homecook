
$(document).on('click', '.rating > i', function () {
	$(this).parents('.rating').siblings('textarea[name=body]').slideDown();
});

$(document).on('input', '#food-form', function () {
	var price = Number($(this).find('input[name=price]').val());
	var discount = Number($(this).find('input[name=discount]').val());
	var cookPercent = Number($(this).data('cook-percent'));

	var cost = price - Math.round(price * discount / 100);
	var cookShare = Math.round(cost * cookPercent / 100);

	$('#first-price').text(c(price));
	$('#price-with-discount').text(c(cost));
	$('#your-share').text(c(cookShare));
});


function c(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
