function initJsUIComponents($parentEle){
    $parentEle = !$parentEle ? $('body') : $parentEle;

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    $parentEle.find(".submit_loading_btn, a.loading_link_btn").click(function () {
        $(this).button("loading");
    });

}

$(document).ready(function () {
    initJsUIComponents();
    if ($.validator) {
        $.validator.setDefaults({
            errorClass: "form-text form-error",
            errorElement: "span",
            errorPlacement: function (error, element) {
                if (element.hasClass("error-container")) {
                    $(element)
                        .closest(".input-container")
                        .find(".error-container")
                        .append(error);
                } else if (
                    element.hasClass("require-from-group") &&
                    (error.text() ==
                        this.settings.messages[element.attr("name")][
                            "require_from_group"
                        ] ||
                        error.text() ==
                            this.settings.messages[element.attr("name")]
                    )
                ) {
                    $($(element).attr("data-group-error-ele")).html(error);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }

    $.blockUI.defaults.message = '<div class="spinner-border blockUI-spinner text-my-primary m-5" role="status"></div>'; 

    $.validator.addMethod("checkYear", function(value, element) {
        var year = $(element).val();
        return this.optional(element) || (year > 1600 && year <= (new Date()).getFullYear());
    }, "Invalid year");

    //filesize in KB??
    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size/1024 <= param);
    }, 'File size exceeds maximum allowed limit.');

    $.validator.addMethod('generalPhone', function (value, element, param) {
        var numericP = value.replace(/\D/g, '');
        return this.optional(element) || isValidPhone(numericP);
    }, 'Invalid phone.');

    $.validator.addMethod('urlWoProtocol', function(value, element) {
        var url = $.validator.methods.url.bind(this);
        return this.optional(element) || (url(value, element) || url('http://' + value, element));
    }, 'Please enter a valid URL');


    (function ($) {
        $.fn.button = function (action) {
            if (action === "loading") {
                var loadingTxt = $(this).attr("data-loading-text");
                $(this)
                    .attr("data-original-text", $(this).html())
                    .html(
                        '<i class="spinner-border"></i> ' +
                            (loadingTxt ? loadingTxt : "")
                    )
                    .prop("disabled", true);
            }
            if (action === "reset") {
                var originalTxt = $(this).attr("data-original-text");
                $(this)
                    .html(originalTxt ? originalTxt : "")
                    .prop("disabled", false);
            }
        };
    })(jQuery);
    

    $(".toggle-pwd-visibility-btn").click(function () {
        var $visibleIcon = $(this).find(".visibility-icon");
        var show = $visibleIcon.hasClass("bi-eye");
        $(this)
            .closest(".pwd-container")
            .find(".pwd-field")
            .attr("type", show ? "text" : "password");
        $visibleIcon.toggleClass("bi-eye bi-eye-slash");
    });

    function generatePassword(length) {
        var length = !length ? 8 : length;
        var charset =
            "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var retVal = "";
        for (var i = 0, n = charset.length; i < length; ++i) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        return retVal;
    }

    $(".generate-random-pwd").click(function () {
        var $pwdEle = $(this)
            .closest(".input-container")
            .find($(this).attr("data-pwd-field"));
        $pwdEle.val(generatePassword());
        $pwdEle.hasClass("form-error") && $pwdEle.valid();
    });

    $(".copy-text-clipboard").click(function () {
        var $copySourceEle = $($(this).attr("data-copy-source"));
        if ($copySourceEle.val()) {
            $copySourceEle.select();
            $copySourceEle[0].setSelectionRange(0, 99999); // For mobile devices
            navigator.clipboard.writeText($copySourceEle.val().trim());
            $(this)
                .attr("title", "Copied!")
                .tooltip("_fixTitle")
                .tooltip("show")
                .attr("title", "Copy to clipboard")
                .tooltip("_fixTitle");
        }
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        error: function(error) {
            var msg = error && error.statusText ? error.statusText : 'Error!';
            toastr.error(msg);
        }
    });

    $('.check_all').click(function() {
        var $singleCheckEles = $('.'+$(this).attr('data-single_check_cls')+':visible');
        if ($singleCheckEles.length){
            if ($(this).is(':checked')) {
                $singleCheckEles.prop('checked', true);
            } else {
                $singleCheckEles.prop('checked', false);
            }
        }
    });
    $('.single_check').click(function() {
        var $checkAllEle = $('#'+$(this).attr('data-check_all_id'));

        if (!$(this).is(':checked')) {
            $checkAllEle.prop('checked', false);
        } else {
            var allChecked = true;
            $('.'+$checkAllEle.attr('data-single_check_cls')+':visible').each(function() {
                if (!$(this).is(':checked')) {
                    allChecked = false;
                }
            });
            if (allChecked) {
                $checkAllEle.prop('checked', true);
            }
        }

    });

    $('.show-hide-trigger').click(function(){
        $($(this).attr('data-hide-target')).hide();
        $($(this).attr('data-show-target')).show();
    })


});