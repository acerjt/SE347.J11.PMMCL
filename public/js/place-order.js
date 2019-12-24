$('document').ready(function() {
    $('.place-order-btn').on('click', function() {
        $('.order-item').remove();
        $('.cart-item-row').each(function() {

            productquantity = $(this).find(".quantity-product").find('.item-quantity-value').text();

            productprice = $(this).find(".table-item-price").find('.cart-item-price').text();
            var patt = /\./g;
            productprice = productprice.replace(patt, "");
            patt = " VND";
            productprice = parseInt(productprice.replace(patt, ""));
            productid = $(this).find(".productid").text();
            productdetailid = $(this).find(".productdetailid").text();
            var obj = {
                id: productid,
                productdetailid:productdetailid,
                quantity: productquantity,
                price: productprice,
            };
            var input = $("<input />", {
                class: "order-item",
                name: "orderlist[]",
                value: JSON.stringify(obj),
                type: "hidden"
            });
            $('#place-order').append(input);
           
        });

        var input = $("<input />", {
            name: "placeorder",
            value: 1,
            type: "hidden"
        });
        $('#place-order').append(input);

        var total = $('.cart-total').text();
        var patt = /\./g;
        total = total.replace(patt, "");
        patt = " VND";
        total = parseInt(total.replace(patt, ""));
        var input = $("<input />", {
            name: "amount",
            value: total,
            type: "hidden"
        });
        $('#place-order').append(input);

        var shippingfee = $('.cart-shipping-fee').text();
        var patt = /\./g;
        shippingfee = shippingfee.replace(patt, "");
        patt = " VND";
        shippingfee = parseInt(shippingfee.replace(patt, ""));
        var input = $("<input />", {
            name: "shippingfee",
            value: shippingfee,
            type: "hidden"
        });
        $('#place-order').append(input);
    });
});