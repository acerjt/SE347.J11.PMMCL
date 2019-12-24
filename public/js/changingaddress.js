$('document').ready(function() {
    $(".province-group").change(function() {

        var provinceid = $(this).val();

        $.ajax({
            url: 'pages/register_perform.php',
            type: 'post',
            data: {
                provinceid: provinceid,
                getdistrict: 1,
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                $(".ward-group").empty();
                $(".district-group").empty();
                $(".district-group").append(" <option value=''>- Select -</option>");
                $(".ward-group").append(" <option value=''>- Select -</option>");
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];

                    $(".district-group").append("<option value='" + id + "'>" + name + "</option>");

                }
            }
        });
    });
    $(".district-group").change(function() {
        var districtid = $(this).val();
        $.ajax({
            url: 'pages/register_perform.php',
            type: 'post',
            data: {
                districtid: districtid,
                getward: 1,
            },
            dataType: 'json',
            success: function(response) {
                var len = response.length;
                $(".ward-group").empty();
                $(".ward-group").append(" <option value=''>- Select -</option>");
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $(".ward-group").append("<option value='" + id + "'>" + name + "</option>");
                }
            }
        });
    });
});