(function ()
{
    'use strict';
    $(() =>
    {
        $('#sign-up-form, #sign-in-form').on('submit', function ()
        {
            $.ajax(
            {
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }

            )
            .done((data) =>
            {
                if (data.success)
                {
                    window.location.assign('/principal.html');
                }

                else
                {
                    haveMsgAlert('error', data.message);
                }

                if (data.pwdChecks)
                {
                    data.pwdChecks.forEach(msg =>
                    {
                        haveMsgAlert('error', msg);
                    });
                }

                if (data.mailChecks)
                {
                    data.mailChecks.forEach(msg =>
                    {
                        haveMsgAlert('error', msg);
                    });
                }

                if (data.usrChecks)
                {
                    data.usrChecks.forEach(msg =>
                    {
                        haveMsgAlert('error', msg);
                    });
                }
            }
            )
            .fail(() =>
            {
                haveMsgAlert('error', 'Fatal error !');
            });
            return false;
        })
    })
})();