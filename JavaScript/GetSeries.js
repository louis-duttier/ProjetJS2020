let GetSeries = function () {
    'use strict';
    $.ajax({
        url : '../PHP/JSON/GetSeries.php',
        method : 'get',
    }).done((data) => {
        let srs = $('.presentation');
        srs.empty();
        data.series.forEach(ser => {
            srs.append(
                $('<div class="presentation"/>').append(
                    $('<div/>').append(
                        $('<div/>').append(
                            $('<img src="Style/Image/Arrow.jpg"/>'),
                            $('<span/>').text("Arrow"),
                            $('<h2/>').text("8 Seasons"),
                            $('<h2/>').text("Start : 2012"),
                            $('<h2/>').text("End : 2020"),
                        ),

                        $('<div/>').append(
                            $('<img src="Style/Image/Flash.jpg"/>'),
                            $('<span/>').text("The Flash"),
                            $('<h2/>').text("6 Seasons"),
                            $('<h2/>').text("Start : 2014"),
                            $('<h2/>').text("End : No Date"),
                        )
                    ),

                    $('<div/>').append(
                        $('<div/>').append(
                            $('<img src="Style/Image/Dark.jpg"/>'),
                            $('<span/>').text("Dark"),
                            $('<h2/>').text("2 Seasons"),
                            $('<h2/>').text("Start : 2017"),
                            $('<h2/>').text("End : No Date"),
                        ),

                        $('<div/>').append(
                            $('<img src="Style/Image/3%25.jpg"/>'),
                            $('<span/>').text("3%"),
                            $('<h2/>').text("3 Seasons"),
                            $('<h2/>').text("Start : 2016"),
                            $('<h2/>').text("End : No Date"),
                        )
                    )
                )
            )
        })
    }).fail(() => {
        createAlert('error', 'Fatal error !');
    })
};