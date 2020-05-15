let haveMsgAlert = function (type, msg) {
    'use strict';
    let a = $('.haveAlerts');
    a.append(
        $('<div class="' + type + '"/>')
            .append(
                $('<div/>')
                    .html(msg)
                    .css({
                        'cursor' : 'default'
                    }),
                $('<span class="designAlerts"/>')
                    .html('Close')
                    .on('click', function () {
                        $(this).parent().fadeOut(500);
                    })
            )
            .hide()
            .fadeIn(1000)
    );

    let lastMsg = a.children().get(a.children().length -1);
    setTimeout(() => {
        $(lastMsg).slideUp('fast');
    }, 5000);
};