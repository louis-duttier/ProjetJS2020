(() => {
    'use strict';
    $(() => {
        $.ajax({
            url : '../PHP/JSON/PopMsg.php',
            method : 'get'
        }).done((data) => {
            console.log(data);
            if (data.disconnected) {
                createAlert('info', data.disconnected);
            }
            if (data.deleted) {
                createAlert('info', data.deleted);
            }
        }).fail(() => {
            createAlert('error', 'Fatal error !');
        })
    });
})();