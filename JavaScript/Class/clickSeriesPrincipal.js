class clickSeriesPrincipal extends Series {
    show (where) {
        'use strict';
        let self = this;
        $(where)
            .append(
                $('<div id="showSeries">').append(
                    $('<button class="ButtonsUser" type="button" id="showDCComics">')
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
                        }),

                    $('<button class="ButtonsUser" type="button" id="showNetflix">')
                        .text("Netflix")
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
                        }),
                ),
            )
    }
}