(() => {
    'use strict';
    $(() => {
        $('#Arrow')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#description-box-arrow').slideUp('linear');
                } else if ($('#Flash').data('open')) {
                    let other = $('#Flash');
                    $('#description-box-flash').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-arrow').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#Dark').data('open')) {
                    let other = $('#Dark');
                    $('#description-box-dark').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-arrow').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#TroisPerCent').data('open')) {
                    let other = $('#TroisPerCent');
                    $('#description-box-troispercent').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-arrow').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#description-box-arrow').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });

        $('#Flash')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#description-box-flash').slideUp('linear');
                } else if ($('#Arrow').data('open')) {
                    let other = $('#Arrow');
                    $('#description-box-arrow').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-flash').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#Dark').data('open')) {
                    let other = $('#Dark');
                    $('#description-box-dark').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-flash').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#TroisPerCent').data('open')) {
                    let other = $('#TroisPerCent');
                    $('#description-box-troispercent').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-flash').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#description-box-flash').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });

        $('#Dark')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#description-box-dark').slideUp('linear');
                } else if ($('#Arrow').data('open')) {
                    let other = $('#Arrow');
                    $('#description-box-Arrow').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-dark').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#Flash').data('open')) {
                    let other = $('#Flash');
                    $('#description-box-flash').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-dark').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#TroisPerCent').data('open')) {
                    let other = $('#TroisPerCent');
                    $('#description-box-troispercent').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-dark').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#description-box-dark').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });

        $('#TroisPerCent')
            .data('open', false)
            .on('click', function () {
                if ($(this).data('open')) {
                    $('#description-box-troispercent').slideUp('linear');
                } else if ($('#Arrow').data('open')) {
                    let other = $('#Arrow');
                    $('#description-box-Arrow').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-troispercent').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#Flash').data('open')) {
                    let other = $('#Flash');
                    $('#description-box-flash').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-troispercent').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else if ($('#Dark').data('open')) {
                    let other = $('#Dark');
                    $('#description-box-dark').slideUp('linear');
                    other.data('open', !other.data('open'));
                    setTimeout(() => {
                        $('#description-box-troispercent').slideDown('linear').css({
                            display: 'flex'
                        });
                    }, 200)
                } else {
                    $('#description-box-troispercent').slideDown('linear').css({
                        display: 'flex'
                    });
                }
                $(this).data('open', !$(this).data('open'));
            });
    });
})();