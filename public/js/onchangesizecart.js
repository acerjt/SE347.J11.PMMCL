$('document').ready(function() {
    $(".size-box").change(function() {
        var sizebox=$(this);
        var productid = $(this).val();
        var size = $(this).find("option:selected").text();
        console.log(size);
        $.ajax({
            url: 'pages/selectcolorfromsize.php',
            type: 'post',
            data: {
                productid: productid,
                selectcolor: 1,
                size : size
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                sizebox.closest('.detail-product').find(".color-box").empty();
                sizebox.closest('.detail-product').find(".color-box").append(" <option value=''></option>");
                for (var i = 0; i < len; i++) {
            
                    var color = response[i]['color'];
                    var id = response[i]['id'];
                    sizebox.closest('.detail-product').find(".color-box").append("<option value='" + id + "'>" + color + "</option>");

                }
            }
        });
    });
    // $(".color-box").change(function() {

    //     var id = $(this).val();
    //     $.ajax({
    //         url: 'pages/selectcolorfromsize.php',
    //         type: 'post',
    //         data: {
    //             id: id,
    //             getamount: 1,
    //         },
    //         dataType: 'json',
    //         success: function(response) {
    //             if(response) {
    //             var amount = response;
    //             $('.product-amount').text("In Stock " +amount + " Pairs");
    //             }
    //             else $('.product-amount').text("Out Stock");
    //         }
    //     });
    // });
});