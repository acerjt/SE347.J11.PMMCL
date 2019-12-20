$('#cart-process-order').on('submit', function() {
    if (!$('.cart-item-check:checked').length) {
        alert('Vui lòng chọn sản phẩm');
        return false;
    } else {
        $('.cart-item-check').each(function() {
            if ($(this).is(":checked")) {
                var prodctid = $(this).closest("tr").find(".productid").text();
                var productdetailid = $(this).closest("tr").find(".productdetailid").text();
                var productname = $(this).closest("tr").find(".cart-item-img").find(".cart-name").text();
                var productimg = $(this).closest("tr").find(".cart-item-img").find('img').attr('src');
                var productquantity = $(this).closest("tr").find(".quantity-product").find('.pquantity').val();
                var productprice = $(this).closest("tr").find(".table-item-price").find('.cart-item-price').text();
                var patt = /\./g;
                productprice = productprice.replace(patt, "");
                patt = " VND";
                productprice = parseInt(productprice.replace(patt, ""));
                var obj = {
                    id: prodctid,
                    productdetailid: productdetailid,
                    name: productname,
                    image: productimg,
                    quantity: productquantity,
                    price: productprice,
                };
                var input = $("<input />", {
                    name: "cartlist[]",
                    value: JSON.stringify(obj),
                    type: "hidden"
                });
                $('#cart-process-order').append(input);
            }


        });
    }
});