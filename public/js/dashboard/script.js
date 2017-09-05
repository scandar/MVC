$(document).ready(function () {

    $('#ajaxform').submit(function () {
        event.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();

        // add new item
        $.post(url, data, function (response) {
            var row =  `<tr>
                            <td>${response.id}</td>
                            <td>${response.text}</td>
                            <td>
                                <a href="#" class="del btn btn-danger" rel="${response.id}">Delete</a>
                            </td>
                        </tr>`;

            // display inserted item
            $("#list").append(row);
        }, 'json');

        // empty text input
        $("#txtinpt").val('');
    });

    // get items
    $.get('dashboard/ajaxGet', function(response) {
        // display items
        for(i = 0, j = response.length; i < j; i++)
        {
            var row =  `<tr>
                            <td>${response[i].id}</td>
                            <td>${response[i].text}</td>
                            <td>
                                <a href="#" class="del btn btn-danger" rel="${response[i].id}">Delete</a>
                            </td>
                        </tr>`;

            $("#list").append(row);
        }

        // delete item
        $("#list").on("click", '.del', function() {
                event.preventDefault();
                var id = $(this).attr('rel');
                $.post('dashboard/ajaxDelete', {id: id}, function (response) {
            });
            $(this).closest('tr').remove();
        });
    }, 'json');



});
