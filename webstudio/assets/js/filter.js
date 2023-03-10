jQuery(function ($) {
    document.getElementById("keyword").addEventListener("keyup", function () {

        jQuery.ajax({
            url: true_obj.ajaxurl,
            type: 'post',
            data: {
                action: 'data_fetch',
                keyword: jQuery('#keyword').val()
            },
            success: function (data) {
                jQuery('#datafetch').html(data);
            }
        });

    });
    $('#filter').on('change', function () {
        var filter = $(this);
        console.log(filter);
        $.ajax({
            url: true_obj.ajaxurl,
            data: filter.serialize(),
            type: 'POST',
            success: function (data) {
                filter.find('checked').addClass("select_active");
                // filter.addClass("select_active");
                $('#response').html(data);
            }
        });
        return false;
    });
});
