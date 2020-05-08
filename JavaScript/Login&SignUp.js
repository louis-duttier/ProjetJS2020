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
                    createAlert('error', data.message);
                }

                if (data.pwdChecks)
                {
                    data.pwdChecks.forEach(msg =>
                    {
                        createAlert('error', msg);
                    });
                }

                if (data.mailChecks)
                {
                    data.mailChecks.forEach(msg =>
                    {
                        createAlert('error', msg);
                    });
                }

                if (data.usrChecks)
                {
                    data.usrChecks.forEach(msg =>
                    {
                        createAlert('error', msg);
                    });
                }
            }
            )
            .fail(() =>
            {
                createAlert('error', 'Fatal error !');
            });
            return false;
        })
    })
})();