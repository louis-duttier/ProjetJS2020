class Description extends Series {
    show (where) {
        'use strict';
        let self = this;
        $(where)
            .append(
                $('<div id="DCComics">').append(
                    $('<div />').append(
                        $('<img src="Style/Image/Arrow.jpg"/>'),
                        $('<span/>').text("Arrow"),
                        $('<h2/>').text("8 Seasons"),
                        $('<h2/>').text("Start : 2012"),
                        $('<h2/>').text("End : 2020")
                    ),

                    $('<div/>').append(
                        $('<img src="Style/Image/Flash.jpg"/>'),
                        $('<span/>').text("The Flash"),
                        $('<h2/>').text("6 Seasons"),
                        $('<h2/>').text("Start : 2014"),
                        $('<h2/>').text("End : No Date")
                    ),
                ),

                $('<div id="Netflix"/>').append(
                    $('<div/>').append(
                        $('<img src="Style/Image/Dark.jpg"/>'),
                        $('<span/>').text("Dark"),
                        $('<h2/>').text("2 Seasons"),
                        $('<h2/>').text("Start : 2017"),
                        $('<h2/>').text("End : No Date")
                    ),

                    $('<div/>').append(
                        $('<img src="Style/Image/3%25.jpg"/>'),
                        $('<span/>').text("3%"),
                        $('<h2/>').text("3 Seasons"),
                        $('<h2/>').text("Start : 2016"),
                        $('<h2/>').text("End : No Date")
                    ),
                ),
            )
    }
}