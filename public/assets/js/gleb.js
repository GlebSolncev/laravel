(function($) {
    'use strict';
    $(function() {
        $('#DataTable').DataTable({
            "aLengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "All"]
            ],
            "iDisplayLength": 10,
            "language": {
                "sEmptyTable": "Пусто!",
                "sInfo": "_START_ по _END_ всего _TOTAL_ стр.",
                "sInfoEmpty": "0 до 0 из 0 записей",
                "sInfoFiltered": "(отфильтровано по _MAX_ записей\n)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Показать по _MENU_ штук.",
                "sLoadingRecords": "Сек, ща будет...",
                "sProcessing": "Подожди, ща загружу...",
                "sSearch": "Тут что-то можно найти",
                "sZeroRecords": "Соррян записей нет :(",
                "oPaginate": {
                    "sFirst": "Первая",
                    "sPrevious": "Назад",
                    "sNext": "Следующая",
                    "sLast": "Последняя"
                }
            }
        });
        $('#DataTable').each(function() {
            var datatable = $(this);
            var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
            search_input.attr('placeholder', 'Search')
                .removeClass('form-control-sm')
                .addClass('form-control');

            datatable.closest('.dataTables_wrapper')
                .find('div[id$=_length] select')
                .addClass('custom-select custom-select-sm');

        });


        $('html').on('click', '#flashClose', function(e){
            e.preventDefault();
            $(this).parents('#proBanner').fadeOut();//.addClass('d-none');
        })
    });
})(jQuery);