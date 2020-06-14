(function () {
    'use strict';
    $(() => {
        $('#sign-up-form, #sign-in-form').on('submit', function () {
            $.ajax(
                {
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize()
                }
            )
                .done((data) => {
                        console.log(data);
                        if (data.success) {
                            window.location.assign('/principal.html');
                        } else {
                            afficherMsgAlert('error', data.msg);
                        }

                        if (data.pwdChecks) {
                            data.pwdChecks.forEach(msg => {
                                afficherMsgAlert('error', msg);
                            });
                        }

                        if (data.mailChecks) {
                            data.mailChecks.forEach(msg => {
                                afficherMsgAlert('error', msg);
                            });
                        }

                        if (data.usrChecks) {
                            data.usrChecks.forEach(msg => {
                                afficherMsgAlert('error', msg);
                            });
                        }
                    }
                )
                .fail(() => {
                    afficherMsgAlert('error', 'Un problème est survenu !');
                });
            return false;
        })
    })
})();