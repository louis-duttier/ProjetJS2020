class clickSeriesIndex extends Series {
    show (where) {
        'use strict';
        let self = this;
        $('<div id="showSeries">')
            .append(
                    $('<button class="ButtonsUser" type="button" id="showDCComics">')
                        .text("DC Comics")
                        .data('open', false)
                        .on('click', function () {
                            if ($(this).data('open')) {
                                $('#DCComics').slideUp('linear');
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
                                $('#DCComics').slideUp('linear');
                            } else {
                                $('#DCComics').slideDown('linear').css({
                                    display: 'flex'
                                });
                            }
                            $(this).data('open', !$(this).data('open'));
                        }),
            )
    }
}