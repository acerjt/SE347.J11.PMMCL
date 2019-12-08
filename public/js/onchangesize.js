$('document').ready(function() {
    $(".size-box").change(function() {

        var productid = $(this).val();
        var size = $(".size-box option:selected").text();
        
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
                $(".color-box").empty();
                $(".product-amount").empty();
                $(".color-box").append(" <option value=''>-- Please Select --</option>");
                for (var i = 0; i < len; i++) {
            
                    var color = response[i]['color'];
                    var id = response[i]['id'];
                    $(".color-box").append("<option value='" + id + "'>" + color + "</option>");

                }
            }
        });
    });
    $(".color-box").change(function() {

        var id = $(this).val();
        $.ajax({
            url: 'pages/selectcolorfromsize.php',
            type: 'post',
            data: {
                id: id,
                getamount: 1,
            },
            dataType: 'json',
            success: function(response) {
                if(response) {
                var amount = response;
                $('.product-amount').text("In Stock " +amount + " Pairs");
                }
                else $('.product-amount').text("Out Stock");
            }
        });
    });
});