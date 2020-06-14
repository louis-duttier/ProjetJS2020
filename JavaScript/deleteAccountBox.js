let deleteAccountBox = () => {
    'use strict';
        $('#choix')
            .append(
                $('<span id="quitter"/>')
                    .html('Vous êtes sur de vouloir quitter ResumeS ?'),
                $('<div/>').append(
                    $('<button class="ButtonsSupprOui">')
                        .attr('type', 'button')
                        .html('OUI')
                        .on('click', () => {
                            $.ajax({
                                url: '../PHP/JSON/deleteA.php',
                                method: 'get',
                            }).done((data) => {
                                $('body').css({
                                    'overflow': 'auto'
                                });
                                if (data.success) {
                                    window.location.assign('/index.html');
                                    afficherMsgAlert('success', data.message);
                                } else {
                                    afficherMsgAlert('error', data.message);
                                }
                            }).fail(() => {
                                afficherMsgAlert('error', 'Un problème est survenu');
                            })
                        }),
                    $('<button class="ButtonsSupprNon"/>')
                        .attr('type', 'button')
                        .html('NON')
                        .on('click', () => {
                            window.location.assign('/principal.html');
                        })
                )
            )
            .fadeIn('500')
            .css('display', 'flex')
            .css('overflow', 'hidden');
};