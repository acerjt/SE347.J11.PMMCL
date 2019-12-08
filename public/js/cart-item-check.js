$(function() {
    if (localStorage.input) {
        var checks = JSON.parse(localStorage.input);
        jQuery(':checkbox').prop('checked', function(i) {
            return checks[i];
        });
    }
});

$(':checkbox').on('change', function() {
    localStorage.input = JSON.stringify(jQuery(':checkbox').map(function() {
        return this.checked;
    }).get());
});

$('.cart-item-check-all').on('click', function() {
    if ($(this).is(":checked")) {
        $('.cart-item-check').prop('checked',true);
    }
    else  $('.cart-item-check').prop('checked',false);
    location.reload();
});

// $(function() {
//     var test = localStorage.input === 'true' ? true : false;
//     $('.cart-item-check').prop('checked', test || false);
// });

// $('.cart-item-check').on('change', function() {
//     localStorage.input = $(this).is(':checked');
//     console.log($(this).is(':checked'));
// });

// $('.cart-item-check').on('click', function(){

//     if(localStorage.getItem("checkedbox") == 'true') {
//       $(this).prop(checked, 'false');
//       localStorage.setItem("checkedbox", 'false');

//     }
//     else {
//       $(this).prop(checked, 'true');
//        localStorage.setItem("checkedbox", 'true');
//     }

//   });


function getNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

var productquantity;
var productprice;
$('document').ready(function() {
    $('.cart-item-check').each(function() {
        if ($(this).is(":checked")) {
            var total = $('.cart-total').text();
            var patt = /\./g;
            total = total.replace(patt, "");
            patt = " VND";
            total = parseInt(total.replace(patt, ""));

            productquantity = $(this).closest("tr").find(".quantity-product").find('.pquantity').val();

            productprice = $(this).closest("tr").find(".table-item-price").find('.cart-item-price').text();
            var patt = /\./g;
            productprice = productprice.replace(patt, "");
            patt = " VND";
            productprice = parseInt(productprice.replace(patt, ""));
            var subtotal = productprice * productquantity
            total += subtotal;
            var shippingfee = 0;
            if(total<575000 && total > 0)
                shippingfee = 11000;
                $('.cart-shipping-fee').html(getNumberWithCommas(shippingfee) + " VND");
            $('.cart-total').html(getNumberWithCommas(total) + " VND");
            var totalItem = parseInt($('.total-select-item').text()) + parseInt(productquantity);
            
            $('.total-select-item').html(totalItem);
            var odertotal = total+ shippingfee;
            $('.cart-order-total').html(getNumberWithCommas(odertotal)+ " VND" );
        }
    });
    $('.cart-item-check').click(function() {
        if ($(this).is(":checked")) {
            var total = $('.cart-total').text();
            var patt = /\./g;
            total = total.replace(patt, "");
            patt = " VND";
            total = parseInt(total.replace(patt, ""));

            productquantity = $(this).closest("tr").find(".quantity-product").find('.pquantity').val();

            productprice = $(this).closest("tr").find(".table-item-price").find('.cart-item-price').text();
            var patt = /\./g;
            productprice = productprice.replace(patt, "");
            patt = " VND";
            productprice = parseInt(productprice.replace(patt, ""));
            var subtotal = productprice * productquantity
            total += subtotal;
            var shippingfee = 0;
            if(total<575000 && total > 0)
                shippingfee = 11000;
                $('.cart-shipping-fee').html(getNumberWithCommas(shippingfee) + " VND");
    
            $('.cart-total').html(getNumberWithCommas(total) + " VND");
         

            var totalItem = parseInt($('.total-select-item').text()) + parseInt(productquantity);
            
            $('.total-select-item').html(totalItem);
            var odertotal = total+ shippingfee;
            $('.cart-order-total').html(getNumberWithCommas(odertotal)+ " VND" );
        } else {
            var total = $('.cart-total').text();
            var patt = /\./g;
            total = total.replace(patt, "");
            patt = " VND";
            total = parseInt(total.replace(patt, ""));

            productquantity = $(this).closest("tr").find(".quantity-product").find('.pquantity').val();

            productprice = $(this).closest("tr").find(".table-item-price").find('.cart-item-price').text();
            var patt = /\./g;
            productprice = productprice.replace(patt, "");
            patt = " VND";
            productprice = parseInt(productprice.replace(patt, ""));
            var subtotal = productprice * productquantity
            total -= subtotal;
            var shippingfee = 0;
            if(total<575000 && total > 0)
                shippingfee = 11000;
                $('.cart-shipping-fee').html(getNumberWithCommas(shippingfee) + " VND");
            $('.cart-total').html(getNumberWithCommas(total) + " VND");
            $('.cart-item-check-all').prop("checked",false);
            var totalItem = parseInt($('.total-select-item').text()) - parseInt(productquantity);
            
            $('.total-select-item').html(totalItem);
            var odertotal = total+ shippingfee;
            $('.cart-order-total').html(getNumberWithCommas(odertotal)+ " VND" );
        }
    });
});