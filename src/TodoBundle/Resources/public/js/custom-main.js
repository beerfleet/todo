$(function () {
    initMenu();
    initTodoTable();
    initDatePicker();
});

function initMenu() {
    initMenuHome();
    initMenuTodo();
}

function initMenuHome() {
    $('#menu-home')
            .on('mouseenter', function () {
                $('.menu').removeClass('visible');
                $('.menu').addClass('hidden');
                $('#menu').removeClass('hidden');
                $('#menu').addClass('visible');
            });
}

function initMenuTodo() {
    $("#menu-todo")
            .on('mouseenter', function () {
                $(".menu-todo").removeClass('hidden');
                $(".menu-todo").addClass('visible');
            });
}

function initTodoTable() {
    $(".dataTable").dataTable({});
    initSetFinished();
    initSetDueDate();
}

function initSetFinished() {
    $(".finished").on('click', function () {
        is_checked = $(this).is(':checked');
        obj_data = {
            'id': $(this).parent().parent().attr("data-id"),
            'state': is_checked
        };
        $.ajax({
            url: "ajax/updateTodoFinished",
            data: obj_data,
            success: function () {
                console.log("Finished state update success ! ");
            }
        });
    });
}

function initSetDueDate() {
    $(".datepick")
            .datepicker({
                minDate: new Date(2014, 12 - 1, 25),
                dateFormat: 'yy-mm-dd'
            })
            .on("change", function () {
                input_date = $(this).datepicker('getDate');
                date_yyyy = input_date.getFullYear();
                date_mm = input_date.getMonth() + 1;
                date_dd = input_date.getDate();
                output_date = date_yyyy + '-' + date_mm + '-' + date_dd;
                obj_data = {
                    'id': $(this).parent().parent().attr("data-id"),
                    'date': output_date
                };
                $.ajax({
                    url: "ajax/updateTodoDate",
                    data: obj_data,
                    success: function() {
                        console.log("Date update success => " + output_date);
                    }
                });
            });

}

function initDatePicker() {
    $('#item_todoDate').datepicker({
        minDate: new Date(2014, 12 - 1, 25),
        dateFormat: 'yy-mm-dd'
    });
}