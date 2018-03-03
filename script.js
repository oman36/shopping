var set = {};

$.each(types, function (n, el) {
    set[el.id] = {
        '$row' : $('.type[data-id=\"' + el.id + '\"]')
    };
});

function updateResult()
{
    var sum = 0;
    var cashbacks = {};
    $.each(set, function (type_id, type) {
        if (type.item) {
            sum += parseFloat(type.item.price);
            if (cashbacks.hasOwnProperty(type.item.shop_id)) {
                var cashbackVal = parseFloat(type.item.cashback);
                if (cashbackVal > 0) {
                    cashbacks[type.item.shop_id] += parseFloat(type.item.cashback);
                }
            } else {
                cashbacks[type.item.shop_id] = parseFloat(type.item.cashback);
            }
        }
    });

    $('#sum').html(sum);
    var cashback = '';


    $.each(cashbacks, function (shop_id, value) {
        cashback += '<li>' +
            findId(shop_id, shops).name +
            ' : ' +
            value +
            '</li>';

    });
    $('#cashback').html(cashback);
}

function add(el) {
    var type = set[el.type_id];
    var $cells = type.$row.find('td');
    $cells.eq(1).html(findId(el.shop_id, shops).name);
    $cells.eq(2).html(el.price);
    $cells.eq(3).html(el.cashback);
    $cells.eq(3).html(el.comment);
    type.item = el;
    updateResult();
}

function findId(id, array) {
    for (var i = 0; i < array.length; i++) {
        if (array[i].id == id) {
            return array[i];
        }
    }
}

$('#items tr').each(function (el) {
    var id = parseInt($(this).attr('data-id'));
    $(this).find('button').on('click', function (event) {
        event.preventDefault();
        add(findId(id, items));
    });
});