class GetRate {

    get id() {
        return this._id;
    }

    get showNote() {
        'use strict';
        let self = this;
        $.ajax({
            url: '../PHP/JSON/getRates.php',
            method: 'GET',
            data: 'ID=' + self.id
        }).done((data) => {
            $('#note' + self.id).html(data.note + '/5.00');
        }).fail(() => {
            createAlert('error', 'Fatal error !');
        });
    }

    show(where=".notes") {
        'use strict';
        let self = this;
        $(where)
            .append(
                $('<form class="add-note" action="/json/rate.php" method="GET"/>')
                    .append(
                        $('<button type="button" class="minus"/>')
                            .html('-')
                            .on('click', function () {
                                let $value = $(this).next();
                                let val = parseInt($value.val()) - 1;
                                $value.val(val >= 0 ? val : 0);
                            }),
                        $('<input type="text" name="rate" value="5" class="value"/>')
                            .on('change', function () {
                                if (parseInt($(this).val()) > 5) {
                                    $(this).val( 5);
                                } else if (parseInt($(this).val()) < 0) {
                                    $(this).val( 0);
                                }
                            }),
                        $('<button type="button" class="plus"/>')
                            .html('+')
                            .on('click', function () {
                                let $value = $(this).prev();
                                let val = parseInt($value.val()) + 1;
                                $value.val(val <= 5 ? val : 5);
                            }),
                        $('<input type="hidden" name="video" value="' + self.id + '"/>'),
                        $('<button type="submit" class="rateBtn"/>')
                            .html('RATE')
                            .on('click', function () {
                                $.ajax({
                                    url: $(this).parent().attr('action'),
                                    method: $(this).parent().attr('method'),
                                    data: $(this).parent().serialize()
                                }).done((data) => {
                                    if (data.success) {
                                        createAlert('success', data.msg);
                                        self.showNote;
                                    }
                                    else {
                                        createAlert('error', data.msg);
                                    }
                                }).fail(() => {
                                    createAlert('error', 'Fatal error !');
                                });
                                return false;
                            })
                    ),
            )
    }
}