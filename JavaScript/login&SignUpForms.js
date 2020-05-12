(() => {
    'use strict';
    $(() => {
        $('#sign-up')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#sign-up-form-box').slideUp('linear');
                } else if ($('#sign-in').data('open')) {
                    let other = $('#sign-in');
                    $('#sign-in-form-box').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#sign-up-form-box').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#sign-up-form-box').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });

        $('#sign-in')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#sign-in-form-box').slideUp('linear');
                } else if ($('#sign-up').data('open')) {
                    let other = $('#sign-up');
                    $('#sign-up-form-box').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#sign-in-form-box').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#sign-in-form-box').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });
    });
})();
