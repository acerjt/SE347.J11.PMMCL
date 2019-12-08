function getNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

$('document').ready(function() {
    $('.cart-item-row').each(function() {
        var total = $('.cart-total').text();
        var patt = /\./g;
        total = total.replace(patt, "");
        patt = " VND";
        total = parseInt(total.replace(patt, ""));
        productquantity = $(this).find(".quantity-product").find('.item-quantity-value').text();
       
        productprice = $(this).find(".table-item-price").find('.cart-item-price').text();
        var patt = /\./g;
        productprice = productprice.replace(patt, "");
        patt = " VND";
        productprice = parseInt(productprice.replace(patt, ""));
        
        var subtotal = productprice * productquantity;
        
        total += subtotal;
        var shippingfee = 0;
        if (total < 575000 && total > 0)
            shippingfee = 11000;
        $('.cart-shipping-fee').html(getNumberWithCommas(shippingfee) + " VND");
        $('.cart-total').html(getNumberWithCommas(total) + " VND");
        var totalItem = parseInt($('.total-select-item').text()) + parseInt(productquantity);

        $('.total-select-item').html(totalItem);
        var odertotal = total + shippingfee;
        $('.cart-order-total').html(getNumberWithCommas(odertotal) + " VND");
    });
});