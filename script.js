var elems = {

};

function add(el) {
    types
}

$('#items tr').each(function (el) {
    var id = parseInt($(this).attr('data-id'));
    $(this).find('button').on('click', function (event) {
        event.preventDefault();
        $.each(items, function (n, el) {
           if (el.id != id) {
               return this;
           }
           add(el);
        });
    });
});