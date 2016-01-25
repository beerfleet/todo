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
    $(".finished").on('click', function() {
        is_checked = $(this).is(':checked');        
        if (is_checked) {
            
        }
    });
}

function initDatePicker() {
    $('#item_todoDate').datepicker({
        minDate: new Date(2014, 12-1, 25),
        dateFormat: 'yy-mm-dd'
    });
}