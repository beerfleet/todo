$(function () {
    initMenu();
    initTable();
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

function initTable() {
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
                console.log("Item update finished success ! ");
            }
        });
    });
}

function initSetDueDate() {
    $(".datepick").datepicker({
        minDate: new Date(2014, 12 - 1, 25),
        dateFormat: 'yy-mm-dd'
    });
    console.log("SET DATEPICKER -> " + $(this));
}

function initDatePicker() {
    $('#item_todoDate').datepicker({
        minDate: new Date(2014, 12 - 1, 25),
        dateFormat: 'yy-mm-dd'
    });
}