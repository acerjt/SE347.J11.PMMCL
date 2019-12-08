function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }





$('document').ready(function() {
    //province
    //#region 
    var inputProvinceField = document.querySelector('.province-group');
    var outputProvinceField = document.querySelector('.province-value');
    var dropdownProvince = document.querySelector('.province-ul');

    var dropdownProvinceArray = _toConsumableArray(document.querySelectorAll('.province-li'));
    console.log(_typeof(dropdownProvinceArray));
    //  dropdownProvince.classList.add('open');
    // inputProvinceField.focus(); // Demo purposes only

    var valuePArray = [];
    dropdownProvinceArray.forEach(function(item) {
        var iv = item.value;
        var it = item.textContent;
        var obj = {
            name: it,
            value: iv
        }
        valuePArray.push(obj);
    });

    var closePDropdown = function closePDropdown() {
        dropdownProvince.classList.remove('open');
    };

    inputProvinceField.addEventListener('input', function() {
        dropdownProvince.classList.add('open');
        var inputValue = inputProvinceField.value.toLowerCase();
        var valueSubstring;

        if (inputValue.length > 0) {
            for (var j = 0; j < valuePArray.length; j++) {
                if (!(inputValue.substring(0, inputValue.length) === valuePArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                    dropdownProvinceArray[j].classList.add('closed');
                } else {
                    dropdownProvinceArray[j].classList.remove('closed');
                }
            }
        } else {
            for (var i = 0; i < dropdownProvinceArray.length; i++) {
                dropdownProvinceArray[i].classList.remove('closed');
            }
        }
    });

    dropdownProvinceArray.forEach(function(item) {
        item.addEventListener('click', function(evt) {
            inputProvinceField.value = item.textContent;
            outputProvinceField.value = item.value;
            dropdownProvinceArray.forEach(function(dropdown) {
                dropdown.classList.add('closed');
            });
        });
    });
    inputProvinceField.addEventListener('focus', function() {
        inputProvinceField.placeholder = 'Type to filter';
        dropdownProvince.classList.add('open');
        dropdownProvinceArray.forEach(function(dropdown) {
            dropdown.classList.remove('closed');
        });
    });
    inputProvinceField.addEventListener('blur', function() {

        for (var j = 0; j < valuePArray.length; j++) {
            if (inputProvinceField.value.toLowerCase() === valuePArray[j]['name'].toLowerCase()) {
                outputProvinceField.value = valuePArray[j]['value'];
                break;
            }

        }
        inputProvinceField.placeholder = 'Select state';
        dropdownProvince.classList.remove('open');
    });
    document.addEventListener('click', function(evt) {
        var isDropdown = dropdownProvince.contains(evt.target);
        var isInput = inputProvinceField.contains(evt.target);

        if (!isDropdown && !isInput) {
            dropdownProvince.classList.remove('open');
        }
    });
    //#endregion
    $(".province-group").blur(function() {
        var provinceid = $(".province-value").val();
        if (provinceid) {

            $.ajax({
                url: 'pages/register_perform.php',
                type: 'post',
                data: {
                    provinceid: provinceid,
                    getdistrict: 1,
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    var len = response.length;
                    //  $(".ward-group").empty();

                    $(".district-ul").empty();
                    $(".district-group").val("");
                    $(".ward-group").val("");
                    $(".district-value").val("");
                    $(".ward-value").val("");
                    // $(".district-group").append(" <option value=''>- Select -</option>");
                    // $(".ward-group").append(" <option value=''>- Select -</option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $(".district-ul").append("<li class='district-li' value='" + id + "'>" + name + "</li>");
                        console.log(name);
                    }

                    var inputDistrictFiled = document.querySelector('.district-group');
                    var outputDistrictField = document.querySelector('.district-value');
                    var dropdownDistrict = document.querySelector('.district-ul');
                    var dropdownDistrictArray = _toConsumableArray(document.querySelectorAll('.district-li'));

                    console.log(_typeof(dropdownDistrictArray));
                    // dropdownDistrict.classList.add('open');
                    // inputDistrictFiled.focus(); // Demo purposes only

                    var valueDArray = [];
                    dropdownDistrictArray.forEach(function(item) {
                        var iv = item.value;
                        var it = item.textContent;
                        var obj = {
                            name: it,
                            value: iv
                        }
                        valueDArray.push(obj);
                    });

                    var closeDDropdown = function closeDDropdown() {
                        dropdownDistrict.classList.remove('open');
                    };

                    inputDistrictFiled.addEventListener('input', function() {
                        dropdownDistrict.classList.add('open');
                        var inputValue = inputDistrictFiled.value.toLowerCase();
                        var valueSubstring;

                        if (inputValue.length > 0) {
                            for (var j = 0; j < valueDArray.length; j++) {
                                if (!(inputValue.substring(0, inputValue.length) === valueDArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                                    dropdownDistrictArray[j].classList.add('closed');
                                } else {
                                    dropdownDistrictArray[j].classList.remove('closed');
                                }
                            }
                        } else {
                            for (var i = 0; i < dropdownDistrictArray.length; i++) {
                                dropdownDistrictArray[i].classList.remove('closed');
                            }
                        }
                    });
                    dropdownDistrictArray.forEach(function(item) {
                        item.addEventListener('click', function(evt) {
                            inputDistrictFiled.value = item.textContent;
                            outputDistrictField.value = item.value;
                            dropdownDistrictArray.forEach(function(dropdown) {
                                dropdown.classList.add('closed');
                            });
                        });
                    });
                    inputDistrictFiled.addEventListener('focus', function() {
                        inputDistrictFiled.placeholder = 'Type to filter';
                        dropdownDistrict.classList.add('open');
                        dropdownDistrictArray.forEach(function(dropdown) {
                            dropdown.classList.remove('closed');
                        });
                    });
                    inputDistrictFiled.addEventListener('blur', function() {
                        inputDistrictFiled.placeholder = 'Select state';
                        dropdownDistrict.classList.remove('open');
                        for (var j = 0; j < valueDArray.length; j++) {
                            if (inputDistrictFiled.value.toLowerCase() === valueDArray[j]['name'].toLowerCase()) {

                                outputDistrictField.value = valueDArray[j]['value'];
                                var districtid = outputDistrictField.value
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
                                        $(".ward-ul").empty();
                                        $(".ward-group").val("");
                                        // $(".ward-group").empty();
                                        // $(".ward-group").append(" <option value=''>- Select -</option>");
                                        for (var i = 0; i < len; i++) {
                                            var id = response[i]['id'];
                                            var name = response[i]['name'];
                                            $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
                                        }
                                        var inputWardFiled = document.querySelector('.ward-group');
                                        var outputWardField = document.querySelector('.ward-value');
                                        var dropdownWard = document.querySelector('.ward-ul');

                                        var dropdownWardArray = _toConsumableArray(document.querySelectorAll('.ward-li'));

                                        console.log(_typeof(dropdownWardArray));
                                        dropdownWard.classList.add('open');
                                        // inputWardFiled.focus(); // Demo purposes only

                                        var valueWArray = [];
                                        dropdownWardArray.forEach(function(item) {
                                            var iv = item.value;
                                            var it = item.textContent;
                                            var obj = {
                                                name: it,
                                                value: iv
                                            }
                                            valueWArray.push(obj);
                                        });

                                        var closeWDropdown = function closeWDropdown() {
                                            dropdownWard.classList.remove('open');
                                        };

                                        inputWardFiled.addEventListener('input', function() {
                                            dropdownWard.classList.add('open');
                                            var inputValue = inputWardFiled.value.toLowerCase();
                                            var valueSubstring;

                                            if (inputValue.length > 0) {
                                                for (var j = 0; j < valueWArray.length; j++) {
                                                    if (!(inputValue.substring(0, inputValue.length) === valueWArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                                                        dropdownWardArray[j].classList.add('closed');
                                                    } else {
                                                        dropdownWardArray[j].classList.remove('closed');
                                                    }
                                                }
                                            } else {
                                                for (var i = 0; i < dropdownWardArray.length; i++) {
                                                    dropdownWardArray[i].classList.remove('closed');
                                                }
                                            }
                                        });
                                        dropdownWardArray.forEach(function(item) {
                                            item.addEventListener('click', function(evt) {
                                                console.log(item.textContent);
                                                inputWardFiled.value = item.textContent;
                                                outputWardField.value = item.value;
                                                dropdownWardArray.forEach(function(dropdown) {
                                                    dropdown.classList.add('closed');
                                                });
                                            });
                                        });
                                        inputWardFiled.addEventListener('focus', function() {
                                            inputWardFiled.placeholder = 'Type to filter';
                                            dropdownWard.classList.add('open');
                                            dropdownWardArray.forEach(function(dropdown) {
                                                dropdown.classList.remove('closed');
                                            });
                                        });
                                        inputWardFiled.addEventListener('blur', function() {
                                            inputWardFiled.placeholder = 'Select state';
                                            dropdownWard.classList.remove('open');
                                            outputWardField.value = "";
                                            for (var j = 0; j < valueWArray.length; j++) {
                                                if (inputWardFiled.value.toLowerCase() === valueWArray[j]['name'].toLowerCase()) {
                                                    outputWardField.value = valueWArray[j]['value'];
                                                    break;
                                                }
                                            }
                                        });
                                        document.addEventListener('click', function(evt) {
                                            var isDropdown = dropdownWard.contains(evt.target);
                                            var isInput = inputWardFiled.contains(evt.target);

                                            if (!isDropdown && !isInput) {
                                                dropdownWard.classList.remove('open');
                                            }
                                        });


                                    }

                                });
                                break;
                            }

                        }
                    });
                    document.addEventListener('click', function(evt) {
                        var isDropdown = dropdownDistrict.contains(evt.target);
                        var isInput = inputDistrictFiled.contains(evt.target);

                        if (!isDropdown && !isInput) {
                            dropdownDistrict.classList.remove('open');
                        }
                    });



                }
            });

        }
    });
    $(".province-group").change(function() {
        $(".district-ul").empty();
        $(".ward-ul").empty();
        $(".district-group").val("");
        $(".ward-group").val("");
        $(".province-value").val("");
        $(".district-value").val("");
        $(".ward-value").val("");
    });
    $(".province-li").click(function() {

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
                console.log(response);
                var len = response.length;
                $(".district-ul").empty();
                $(".district-group").val("");
                $(".ward-group").val("");

                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];

                    $(".district-ul").append("<li class='district-li' value='" + id + "'>" + name + "</li>");

                }
                var inputDistrictFiled = document.querySelector('.district-group');
                    var outputDistrictField = document.querySelector('.district-value');
                    var dropdownDistrict = document.querySelector('.district-ul');
                    var dropdownDistrictArray = _toConsumableArray(document.querySelectorAll('.district-li'));

                    console.log(_typeof(dropdownDistrictArray));
                    // dropdownDistrict.classList.add('open');
                    // inputDistrictFiled.focus(); // Demo purposes only

                    var valueDArray = [];
                    dropdownDistrictArray.forEach(function(item) {
                        var iv = item.value;
                        var it = item.textContent;
                        var obj = {
                            name: it,
                            value: iv
                        }
                        valueDArray.push(obj);
                    });

                    var closeDDropdown = function closeDDropdown() {
                        dropdownDistrict.classList.remove('open');
                    };

                    inputDistrictFiled.addEventListener('input', function() {
                        dropdownDistrict.classList.add('open');
                        var inputValue = inputDistrictFiled.value.toLowerCase();
                        var valueSubstring;

                        if (inputValue.length > 0) {
                            for (var j = 0; j < valueDArray.length; j++) {
                                if (!(inputValue.substring(0, inputValue.length) === valueDArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                                    dropdownDistrictArray[j].classList.add('closed');
                                } else {
                                    dropdownDistrictArray[j].classList.remove('closed');
                                }
                            }
                        } else {
                            for (var i = 0; i < dropdownDistrictArray.length; i++) {
                                dropdownDistrictArray[i].classList.remove('closed');
                            }
                        }
                    });
                    dropdownDistrictArray.forEach(function(item) {
                        item.addEventListener('click', function(evt) {
                            inputDistrictFiled.value = item.textContent;
                            outputDistrictField.value = item.value;
                            dropdownDistrictArray.forEach(function(dropdown) {
                                dropdown.classList.add('closed');
                            });
                        });
                    });
                    inputDistrictFiled.addEventListener('focus', function() {
                        inputDistrictFiled.placeholder = 'Type to filter';
                        dropdownDistrict.classList.add('open');
                        dropdownDistrictArray.forEach(function(dropdown) {
                            dropdown.classList.remove('closed');
                        });
                    });
                    inputDistrictFiled.addEventListener('blur', function() {
                        inputDistrictFiled.placeholder = 'Select state';
                        dropdownDistrict.classList.remove('open');
                        for (var j = 0; j < valueDArray.length; j++) {
                            if (inputDistrictFiled.value.toLowerCase() === valueDArray[j]['name'].toLowerCase()) {

                                outputDistrictField.value = valueDArray[j]['value'];
                                var districtid = outputDistrictField.value
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
                                        $(".ward-ul").empty();
                                        $(".ward-group").val("");
                                        $(".ward-value").val("");
                                        // $(".ward-group").empty();
                                        // $(".ward-group").append(" <option value=''>- Select -</option>");
                                        for (var i = 0; i < len; i++) {
                                            var id = response[i]['id'];
                                            var name = response[i]['name'];
                                            $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
                                        }
                                        var inputWardFiled = document.querySelector('.ward-group');
                                        var outputWardField = document.querySelector('.ward-value');
                                        var dropdownWard = document.querySelector('.ward-ul');

                                        var dropdownWardArray = _toConsumableArray(document.querySelectorAll('.ward-li'));

                                        console.log(_typeof(dropdownWardArray));
                                        dropdownWard.classList.add('open');
                                        // inputWardFiled.focus(); // Demo purposes only

                                        var valueWArray = [];
                                        dropdownWardArray.forEach(function(item) {
                                            var iv = item.value;
                                            var it = item.textContent;
                                            var obj = {
                                                name: it,
                                                value: iv
                                            }
                                            valueWArray.push(obj);
                                        });

                                        var closeWDropdown = function closeWDropdown() {
                                            dropdownWard.classList.remove('open');
                                        };

                                        inputWardFiled.addEventListener('input', function() {
                                            dropdownWard.classList.add('open');
                                            var inputValue = inputWardFiled.value.toLowerCase();
                                            var valueSubstring;

                                            if (inputValue.length > 0) {
                                                for (var j = 0; j < valueWArray.length; j++) {
                                                    if (!(inputValue.substring(0, inputValue.length) === valueWArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                                                        dropdownWardArray[j].classList.add('closed');
                                                    } else {
                                                        dropdownWardArray[j].classList.remove('closed');
                                                    }
                                                }
                                            } else {
                                                for (var i = 0; i < dropdownWardArray.length; i++) {
                                                    dropdownWardArray[i].classList.remove('closed');
                                                }
                                            }
                                        });
                                        dropdownWardArray.forEach(function(item) {
                                            item.addEventListener('click', function(evt) {
                                                console.log(item.textContent);
                                                inputWardFiled.value = item.textContent;
                                                outputWardField.value = item.value;
                                                dropdownWardArray.forEach(function(dropdown) {
                                                    dropdown.classList.add('closed');
                                                });
                                            });
                                        });
                                        inputWardFiled.addEventListener('focus', function() {
                                            inputWardFiled.placeholder = 'Type to filter';
                                            dropdownWard.classList.add('open');
                                            dropdownWardArray.forEach(function(dropdown) {
                                                dropdown.classList.remove('closed');
                                            });
                                        });
                                        inputWardFiled.addEventListener('blur', function() {
                                            inputWardFiled.placeholder = 'Select state';
                                            dropdownWard.classList.remove('open');
                                            outputWardField.value = "";
                                            for (var j = 0; j < valueWArray.length; j++) {
                                                if (inputWardFiled.value.toLowerCase() === valueWArray[j]['name'].toLowerCase()) {
                                                    outputWardField.value = valueWArray[j]['value'];
                                                    break;
                                                }
                                            }
                                        });
                                        document.addEventListener('click', function(evt) {
                                            var isDropdown = dropdownWard.contains(evt.target);
                                            var isInput = inputWardFiled.contains(evt.target);

                                            if (!isDropdown && !isInput) {
                                                dropdownWard.classList.remove('open');
                                            }
                                        });


                                    }

                                });
                                break;
                            }

                        }
                    });
                    document.addEventListener('click', function(evt) {
                        var isDropdown = dropdownDistrict.contains(evt.target);
                        var isInput = inputDistrictFiled.contains(evt.target);

                        if (!isDropdown && !isInput) {
                            dropdownDistrict.classList.remove('open');
                        }
                    });
            }
        });
    });
    $(".district-group").change(function() {
        $(".ward-ul").empty();
        $(".ward-group").val("");
        $(".district-value").val("");
        $(".ward-value").val("");
    });
    // $(".district-li").click(function() {
    //     var districtid = $('.district-value').val();
    //     alert(districtid);
    //     if (districtid) {

    //         $.ajax({
    //             url: 'pages/register_perform.php',
    //             type: 'post',
    //             data: {
    //                 districtid: districtid,
    //                 getward: 1,
    //             },
    //             dataType: 'json',
    //             success: function(response) {
    //                 var len = response.length;
    //                 $(".ward-ul").empty();
    //                 $(".ward-group").val("");
    //                 // $(".ward-group").empty();
    //                 // $(".ward-group").append(" <option value=''>- Select -</option>");
    //                 for (var i = 0; i < len; i++) {
    //                     var id = response[i]['id'];
    //                     var name = response[i]['name'];
    //                     $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
    //                 }

    //             }
    //         });

    //     }
    // });
    // $(".district-group").click(function() {
    //     var districtid = $('.district-value').val();
    //     $.ajax({
    //         url: 'pages/register_perform.php',
    //         type: 'post',
    //         data: {
    //             districtid: districtid,
    //             getward: 1,
    //         },
    //         dataType: 'json',
    //         success: function(response) {
    //             var len = response.length;
    //             $(".ward-ul").empty();
    //             $(".ward-group").val("");
    //             // $(".ward-group").empty();
    //             // $(".ward-group").append(" <option value=''>- Select -</option>");
    //             for (var i = 0; i < len; i++) {
    //                 var id = response[i]['id'];
    //                 var name = response[i]['name'];
    //                 $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
    //             }
    //             var inputDistrictFiled = document.querySelector('.district-group');
    //             var outputDistrictField = document.querySelector('.district-value');
    //             var dropdownDistrict = document.querySelector('.district-ul');
    //             var dropdownDistrictArray = _toConsumableArray(document.querySelectorAll('.district-li'));

    //             console.log(_typeof(dropdownDistrictArray));
    //             // dropdownDistrict.classList.add('open');
    //             // inputDistrictFiled.focus(); // Demo purposes only

    //             var valueDArray = [];
    //             dropdownDistrictArray.forEach(function(item) {
    //                 var iv = item.value;
    //                 var it = item.textContent;
    //                 var obj = {
    //                     name: it,
    //                     value: iv
    //                 }
    //                 valueDArray.push(obj);
    //             });

    //             var closeDDropdown = function closeDDropdown() {
    //                 dropdownDistrict.classList.remove('open');
    //             };

    //             inputDistrictFiled.addEventListener('input', function() {
    //                 dropdownDistrict.classList.add('open');
    //                 var inputValue = inputDistrictFiled.value.toLowerCase();
    //                 var valueSubstring;

    //                 if (inputValue.length > 0) {
    //                     for (var j = 0; j < valueDArray.length; j++) {
    //                         if (!(inputValue.substring(0, inputValue.length) === valueDArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
    //                             dropdownDistrictArray[j].classList.add('closed');
    //                         } else {
    //                             dropdownDistrictArray[j].classList.remove('closed');
    //                         }
    //                     }
    //                 } else {
    //                     for (var i = 0; i < dropdownDistrictArray.length; i++) {
    //                         dropdownDistrictArray[i].classList.remove('closed');
    //                     }
    //                 }
    //             });
    //             dropdownDistrictArray.forEach(function(item) {
    //                 item.addEventListener('click', function(evt) {
    //                     inputDistrictFiled.value = item.textContent;
    //                     outputDistrictField.value = item.value;
    //                     dropdownDistrictArray.forEach(function(dropdown) {
    //                         dropdown.classList.add('closed');
    //                     });
    //                 });
    //             });
    //             inputDistrictFiled.addEventListener('focus', function() {
    //                 inputDistrictFiled.placeholder = 'Type to filter';
    //                 dropdownDistrict.classList.add('open');
    //                 dropdownDistrictArray.forEach(function(dropdown) {
    //                     dropdown.classList.remove('closed');
    //                 });
    //             });
    //             inputDistrictFiled.addEventListener('blur', function() {
    //                 inputDistrictFiled.placeholder = 'Select state';
    //                 dropdownDistrict.classList.remove('open');
    //                 for (var j = 0; j < valueDArray.length; j++) {
    //                     if (inputDistrictFiled.value.toLowerCase() === valueDArray[j]['name'].toLowerCase()) {

    //                         outputDistrictField.value = valueDArray[j]['value'];
    //                         var districtid = outputDistrictField.value
    //                         $.ajax({
    //                             url: 'pages/register_perform.php',
    //                             type: 'post',
    //                             data: {
    //                                 districtid: districtid,
    //                                 getward: 1,
    //                             },
    //                             dataType: 'json',
    //                             success: function(response) {

    //                                 var len = response.length;
    //                                 $(".ward-ul").empty();
    //                                 $(".ward-group").val("");
    //                                 // $(".ward-group").empty();
    //                                 // $(".ward-group").append(" <option value=''>- Select -</option>");
    //                                 for (var i = 0; i < len; i++) {
    //                                     var id = response[i]['id'];
    //                                     var name = response[i]['name'];
    //                                     $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
    //                                 }
    //                                 var inputWardFiled = document.querySelector('.ward-group');
    //                                 var outputWardField = document.querySelector('.ward-value');
    //                                 var dropdownWard = document.querySelector('.ward-ul');

    //                                 var dropdownWardArray = _toConsumableArray(document.querySelectorAll('.ward-li'));

    //                                 console.log(_typeof(dropdownWardArray));
    //                                 dropdownWard.classList.add('open');
    //                                 // inputWardFiled.focus(); // Demo purposes only

    //                                 var valueWArray = [];
    //                                 dropdownWardArray.forEach(function(item) {
    //                                     var iv = item.value;
    //                                     var it = item.textContent;
    //                                     var obj = {
    //                                         name: it,
    //                                         value: iv
    //                                     }
    //                                     valueWArray.push(obj);
    //                                 });

    //                                 var closeWDropdown = function closeWDropdown() {
    //                                     dropdownWard.classList.remove('open');
    //                                 };

    //                                 inputWardFiled.addEventListener('input', function() {
    //                                     dropdownWard.classList.add('open');
    //                                     var inputValue = inputWardFiled.value.toLowerCase();
    //                                     var valueSubstring;

    //                                     if (inputValue.length > 0) {
    //                                         for (var j = 0; j < valueWArray.length; j++) {
    //                                             if (!(inputValue.substring(0, inputValue.length) === valueWArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
    //                                                 dropdownWardArray[j].classList.add('closed');
    //                                             } else {
    //                                                 dropdownWardArray[j].classList.remove('closed');
    //                                             }
    //                                         }
    //                                     } else {
    //                                         for (var i = 0; i < dropdownWardArray.length; i++) {
    //                                             dropdownWardArray[i].classList.remove('closed');
    //                                         }
    //                                     }
    //                                 });
    //                                 dropdownWardArray.forEach(function(item) {
    //                                     item.addEventListener('click', function(evt) {
    //                                         console.log(item.textContent);
    //                                         inputWardFiled.value = item.textContent;
    //                                         outputWardField.value = item.value;
    //                                         dropdownWardArray.forEach(function(dropdown) {
    //                                             dropdown.classList.add('closed');
    //                                         });
    //                                     });
    //                                 });
    //                                 inputWardFiled.addEventListener('focus', function() {
    //                                     inputWardFiled.placeholder = 'Type to filter';
    //                                     dropdownWard.classList.add('open');
    //                                     dropdownWardArray.forEach(function(dropdown) {
    //                                         dropdown.classList.remove('closed');
    //                                     });
    //                                 });
    //                                 inputWardFiled.addEventListener('blur', function() {
    //                                     inputWardFiled.placeholder = 'Select state';
    //                                     dropdownWard.classList.remove('open');
    //                                     for (var j = 0; j < valueWArray.length; j++) {
    //                                         if (inputWardFiled.value.toLowerCase() === valueWArray[j]['name'].toLowerCase()) {
    //                                             outputWardField.value = valueWArray[j]['value'];
    //                                             break;
    //                                         }
    //                                     }
    //                                 });
    //                                 document.addEventListener('click', function(evt) {
    //                                     var isDropdown = dropdownWard.contains(evt.target);
    //                                     var isInput = inputWardFiled.contains(evt.target);

    //                                     if (!isDropdown && !isInput) {
    //                                         dropdownWard.classList.remove('open');
    //                                     }
    //                                 });


    //                             }

    //                         });
    //                         break;
    //                     }

    //                 }
    //             });
    //             document.addEventListener('click', function(evt) {
    //                 var isDropdown = dropdownDistrict.contains(evt.target);
    //                 var isInput = inputDistrictFiled.contains(evt.target);

    //                 if (!isDropdown && !isInput) {
    //                     dropdownDistrict.classList.remove('open');
    //                 }
    //             });
    //         }
    //     });
    // });
    $(".district-group").blur(function() {
        var inputDistrictFiled = document.querySelector('.district-group');
        var outputDistrictField = document.querySelector('.district-value');
        var dropdownDistrict = document.querySelector('.district-ul');
        var dropdownDistrictArray = _toConsumableArray(document.querySelectorAll('.district-li'));

        console.log(_typeof(dropdownDistrictArray));
        // dropdownDistrict.classList.add('open');
        // inputDistrictFiled.focus(); // Demo purposes only

        var valueDArray = [];
        dropdownDistrictArray.forEach(function(item) {
            var iv = item.value;
            var it = item.textContent;
            var obj = {
                name: it,
                value: iv
            }
            valueDArray.push(obj);
        });

        var closeDDropdown = function closeDDropdown() {
            dropdownDistrict.classList.remove('open');
        };

        inputDistrictFiled.addEventListener('input', function() {
            dropdownDistrict.classList.add('open');
            var inputValue = inputDistrictFiled.value.toLowerCase();
            var valueSubstring;

            if (inputValue.length > 0) {
                for (var j = 0; j < valueDArray.length; j++) {
                    if (!(inputValue.substring(0, inputValue.length) === valueDArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                        dropdownDistrictArray[j].classList.add('closed');
                    } else {
                        dropdownDistrictArray[j].classList.remove('closed');
                    }
                }
            } else {
                for (var i = 0; i < dropdownDistrictArray.length; i++) {
                    dropdownDistrictArray[i].classList.remove('closed');
                }
            }
        });
        dropdownDistrictArray.forEach(function(item) {
            item.addEventListener('click', function(evt) {
                inputDistrictFiled.value = item.textContent;
                outputDistrictField.value = item.value;
                dropdownDistrictArray.forEach(function(dropdown) {
                    dropdown.classList.add('closed');
                });
            });
        });
        inputDistrictFiled.addEventListener('focus', function() {
            inputDistrictFiled.placeholder = 'Type to filter';
            dropdownDistrict.classList.add('open');
            dropdownDistrictArray.forEach(function(dropdown) {
                dropdown.classList.remove('closed');
            });
        });
        inputDistrictFiled.addEventListener('blur', function() {
            inputDistrictFiled.placeholder = 'Select state';
            dropdownDistrict.classList.remove('open');
            for (var j = 0; j < valueDArray.length; j++) {
                if (inputDistrictFiled.value.toLowerCase() === valueDArray[j]['name'].toLowerCase()) {

                    outputDistrictField.value = valueDArray[j]['value'];
                    //var districtid = outputDistrictField.value
                    // $.ajax({
                    //     url: 'pages/register_perform.php',
                    //     type: 'post',
                    //     data: {
                    //         districtid: districtid,
                    //         getward: 1,
                    //     },
                    //     dataType: 'json',
                    //     success: function(response) {

                    //         var len = response.length;
                    //         $(".ward-ul").empty();
                    //         $(".ward-group").val("");
                    //         // $(".ward-group").empty();
                    //         // $(".ward-group").append(" <option value=''>- Select -</option>");
                    //         for (var i = 0; i < len; i++) {
                    //             var id = response[i]['id'];
                    //             var name = response[i]['name'];
                    //             $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
                    //         }
                            
                    //     }

                    // });
                    break;
                }

            }
        });
        document.addEventListener('click', function(evt) {
            var isDropdown = dropdownDistrict.contains(evt.target);
            var isInput = inputDistrictFiled.contains(evt.target);

            if (!isDropdown && !isInput) {
                dropdownDistrict.classList.remove('open');
            }
        });
    });
    $(".district-ul").click(function() {
        
        var districtid = $('.district-value').val();
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
                $(".ward-ul").empty();
                $(".ward-group").val("");
                // $(".ward-group").val("");
                // $(".ward-group").empty();
                // $(".ward-group").append(" <option value=''>- Select -</option>");
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    $(".ward-ul").append("<li class='ward-li' value='" + id + "'>" + name + "</li>");
                }
                var inputWardFiled = document.querySelector('.ward-group');
                            var outputWardField = document.querySelector('.ward-value');
                            var dropdownWard = document.querySelector('.ward-ul');

                            var dropdownWardArray = _toConsumableArray(document.querySelectorAll('.ward-li'));

                            console.log(_typeof(dropdownWardArray));
                            dropdownWard.classList.add('open');
                            // inputWardFiled.focus(); // Demo purposes only

                            var valueWArray = [];
                            dropdownWardArray.forEach(function(item) {
                                var iv = item.value;
                                var it = item.textContent;
                                var obj = {
                                    name: it,
                                    value: iv
                                }
                                valueWArray.push(obj);
                            });

                            var closeWDropdown = function closeWDropdown() {
                                dropdownWard.classList.remove('open');
                            };

                            inputWardFiled.addEventListener('input', function() {
                                dropdownWard.classList.add('open');
                                var inputValue = inputWardFiled.value.toLowerCase();
                                var valueSubstring;

                                if (inputValue.length > 0) {
                                    for (var j = 0; j < valueWArray.length; j++) {
                                        if (!(inputValue.substring(0, inputValue.length) === valueWArray[j]['name'].substring(0, inputValue.length).toLowerCase())) {
                                            dropdownWardArray[j].classList.add('closed');
                                        } else {
                                            dropdownWardArray[j].classList.remove('closed');
                                        }
                                    }
                                } else {
                                    for (var i = 0; i < dropdownWardArray.length; i++) {
                                        dropdownWardArray[i].classList.remove('closed');
                                    }
                                }
                            });
                            dropdownWardArray.forEach(function(item) {
                                item.addEventListener('click', function(evt) {
                                    console.log(item.textContent);
                                    inputWardFiled.value = item.textContent;
                                    outputWardField.value = item.value;
                                    dropdownWardArray.forEach(function(dropdown) {
                                        dropdown.classList.add('closed');
                                    });
                                });
                            });
                            inputWardFiled.addEventListener('focus', function() {
                                inputWardFiled.placeholder = 'Type to filter';
                                dropdownWard.classList.add('open');
                                dropdownWardArray.forEach(function(dropdown) {
                                    dropdown.classList.remove('closed');
                                });
                            });
                            inputWardFiled.addEventListener('blur', function() {
                                inputWardFiled.placeholder = 'Select state';
                                dropdownWard.classList.remove('open');
                                outputWardField.value = "";
                                for (var j = 0; j < valueWArray.length; j++) {
                                    if (inputWardFiled.value.toLowerCase() === valueWArray[j]['name'].toLowerCase()) {
                                        outputWardField.value = valueWArray[j]['value'];
                                        break;
                                    }
                                }
                            });
                            document.addEventListener('click', function(evt) {
                                var isDropdown = dropdownWard.contains(evt.target);
                                var isInput = inputWardFiled.contains(evt.target);

                                if (!isDropdown && !isInput) {
                                    dropdownWard.classList.remove('open');
                                }
                            });


                
            }
        });
    });
});