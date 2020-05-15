(() => {
    'use strict';
    $(() => {
        $.ajax({
            url: '../PHP/JSON/userConnected.php',
            method: 'get',
        }).done((data) => {
            if (data.success) {
                if (data.message !== "") {
                    haveMsgAlert('success', data.message);
                }
                let action = $('#actions');
                action.empty();

                action.append(
                    $('<button class="ButtonsUser" type="button" id="profile"/>')
                        .html('Profil')
                        .on('click', function () {
                            let self = this;
                            $.ajax({
                                url: '../PHP/JSON/userProfile.php',
                                method: 'get'
                            }).done((data) => {
                                if (data.profile) {
                                    $('#profile-box').slideUp('fast');
                                    $(self).html('Profil');
                                } else {
                                    $('#profile-box').empty()
                                        .append(
                                            $('<h2/>')  .html(data.username),
                                            $('<span>') .html('Inscrit le : ' + data.date),
                                            $('<span>') .html(data.admin),
                                            $('<button type="button" id="trash"/>')
                                                .html('SUPPRIMER SON COMPTE 🗑️')
                                                .on('click', () => {
                                                    confirmDelAccount('me')
                                                })
                                        )
                                        .slideDown('fast')
                                        .css('display', 'flex');
                                    $(self).html('Close');
                                }
                            })
                        }),
                    $('<button class="ButtonsUser" type="button" id="logout"/>')
                        .html('Déconnexion')
                        .on('click', function () {
                            $.ajax({
                                url: '../PHP/JSON/logOut.php',
                                method: 'get'
                            }).done(() => {
                                window.location.assign('/index.html');
                            })
                        })
                );
            } else {
                window.location.assign('/index.html');
            }
        }).fail(() => {
            $('.alerts').append($('<li class="error"> Fatal error ! </li>'));
        });
    });
})();
