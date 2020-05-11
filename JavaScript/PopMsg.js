(() => {
    'use strict';
    $(() => {
        $.ajax({
            url : '../PHP/JSON/PopMsg.php',
            method : 'get'
        }).done((data) => {
            console.log(data);
            if (data.disconnected) {
                haveMsgAlert('info', data.disconnected);
            }
            if (data.deleted) {
                haveMsgAlert('info', data.deleted);
            }
        }).fail(() => {
            haveMsgAlert('error', 'Fatal error !');
        })
    });
})();