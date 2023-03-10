jQuery(function ($) {
    $('.news_loadmore').click(function () {

        var button = $(this),
            data = {
                'action': 'loadmore',
                'query': news_loadmore_params.posts,
                'page': news_loadmore_params.current_page
            };

        $.ajax({
            url: news_loadmore_params.ajaxurl,
            data: data,
            type: 'POST',
            success: function (data) {
                if (data) {
                    button.text('Дивитися ще...').prev().after(data);
                    news_loadmore_params.current_page++;
                    if (news_loadmore_params.current_page == news_loadmore_params.max_page)
                        button.remove();
                } else {
                    button.remove();
                }
            }
        });
    });
});