function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }


$('document').ready(function() {
   
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
            inputDistrictFiled.placeholder = 'Select District';
            dropdownDistrict.classList.remove('open');
            for (var j = 0; j < valueDArray.length; j++) {
                if (inputDistrictFiled.value.toLowerCase() === valueDArray[j]['name'].toLowerCase()) {
                    outputDistrictFiled.value = valueDArray[j]['value'];
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