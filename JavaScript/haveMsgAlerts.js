let afficherMsgAlert = function (type, msg) {
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
                    .html('X')
                    .on('click', function () {
                        $(this).parent().fadeOut(300);
                    })
            )
            .hide()
            .fadeIn(700)
    );

    let dernierMsg = a.children().get(a.children().length -1);
    setTimeout(() => {
        $(dernierMsg).slideUp('fast');
    }, 2000);
};