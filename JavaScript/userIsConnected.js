(() => {
    'use strict';
    $(() => {
        $.ajax({
            url: '../PHP/JSON/userConnected.php',
            method: 'get',
        }).done((data) => {
            if (data.success) {
                if (data.message !== "") {
                    afficherMsgAlert('success', data.message);
                }

                let action = $('#actions');
                action.empty();

                action.append(
                    $('<button class="ButtonsUser" type="button" id="supprimer"/>')
                        .html('Suppression')
                        .on('click', () => {
                            deleteAccountBox()
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
            $('.haveAlerts').append($('<li class="error"> Un problème est survenu ! </li>'));
        });
    });
})();
