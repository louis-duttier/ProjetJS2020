(() => {
    'use strict';
    $(() => {
        $('#showDCComics')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#DCComics').slideUp('linear');
                    $('#description-box-arrow').slideUp('linear');
                    $('#description-box-flash').slideUp('linear');
                } else {
                    $('#DCComics').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });

        $('#showNetflix')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#Netflix').slideUp('linear');
                } else {
                    $('#Netflix').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });
    });
})();