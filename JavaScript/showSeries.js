(() => {
    'use strict';
    $(() => {
        $('.presentation')
            .append(
                    $('<div id="DCComics">').append(
                        $('<div />').append(
                            $('<img alt="DC Comics" src="../Style/Image/Arrow.jpg"/>'),
                            $('<span id="Arrow"/>')
                                .text("Arrow"),
                            $('<h2/>')
                                .text("8 Seasons"),
                            $('<h2/>')
                                .text("Start : 2012"),
                            $('<h2/>')
                                .text("End : 2020")
                        ),

                        $('<div/>').append(
                            $('<img alt="DC Comics" src="../Style/Image/Flash.jpg"/>'),
                            $('<span id="Flash"/>')
                                .text("The Flash"),
                            $('<h2/>')
                                .text("6 Seasons"),
                            $('<h2/>')
                                .text("Start : 2014"),
                            $('<h2/>')
                                .text("End : No Date")
                        ),
                    ),

                    $('<div id="Netflix"/>').append(
                        $('<div/>').append(
                            $('<img alt="Netflix" src="../Style/Image/Dark.jpg"/>'),
                            $('<span id="Dark"/>')
                                .text("Dark"),
                            $('<h2/>')
                                .text("2 Seasons"),
                            $('<h2/>')
                                .text("Start : 2017"),
                            $('<h2/>')
                                .text("End : No Date")
                        ),

                        $('<div/>').append(
                            $('<img alt="Netflix" src="../Style/Image/3%25.jpg"/>'),
                            $('<span id="TroisPerCent"/>')
                                .text("3%"),
                            $('<h2/>')
                                .text("3 Seasons"),
                            $('<h2/>')
                                .text("Start : 2016"),
                            $('<h2/>')
                                .text("End : No Date")
                        ),
                    ),
            )
    });
})();