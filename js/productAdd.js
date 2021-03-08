$(document).ready(function () {
    $("#type").change(function () {
        const select = $('#type').val();
        select == 1 ? $("#cd").show() : $("#cd").hide();
        select == 2 ? $("#book").show() : $("#book").hide();
        select == 3 ? $("#furniture").show() : $("#furniture").hide();
    });
    
    $("#save").click(function () {
        const jsonObj = {};
        $.each($("#myForm").serializeArray(), function () {
            jsonObj[this.name] = this.value;
        });
        $.ajax({
            type: "POST",
            url: "addProductHandler.php",
            data: {"data": jsonObj},
        })
            .done(function (data) {
                let result = JSON.parse(data);
                if (!result.success) {
                    if (result.errors.missing) {
                        $('.form-control').addClass('is-invalid');
                        $('#type').addClass('is-invalid');
                        if ($('#hidden').children().length == 0) {
                            $('#hidden').append('<div class="help-block">' + result.errors.missing + '</div>');
                        }
                    }
                    if (result.errors.notUniqSKU) {
                        $("#sku").addClass('is-invalid');
                        $('#skuDiv').append('<div class="invalid-tooltip">' + result.errors.notUniqSKU + '</div>');

                    }
                } else {
                    window.location.replace('productList.php');
                }
            });
    });
});
