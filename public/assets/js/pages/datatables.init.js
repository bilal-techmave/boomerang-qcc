
/*
Template Name: Shreyu - Responsive Bootstrap 5 Admin Dashboard
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Data tables init js
*/
$(document).ready(function() {
    var table = $('#basic-datatable').DataTable({
        dom: '<"top"lf><"middle"rt><"bottom"Bip>',
        buttons: [],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "paging": true,
        "searching": true,
        "ordering": false, // Disable sorting
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });

    var columns = table.columns().header().toArray();

    var columnVisibilityDropdown = '<div class="dropdown colum_visibility_ak" style="display:inline-block;">' +
        '<button class="btn btn-warning dropdown-toggle" type="button" id="columnVisibilityDropdown" data-bs-toggle="dropdown" aria-expanded="false">Column Visibility</button>' +
        '<div class="dropdown-menu custom_dp_menu" aria-labelledby="columnVisibilityDropdown">';

    columns.forEach(function(column, index) {
        columnVisibilityDropdown += '<div class="form-check"><input class="form-check-input column-toggle" type="checkbox" value="' + $(column).text() + '" id="Checkme' + index + '" checked><label class="form-check-label" for="Checkme' + index + '">' + $(column).text() + '</label></div>';
    });

    columnVisibilityDropdown += '</div></div>';

    $('.dataTables_length').parent().append(columnVisibilityDropdown);

    table.buttons().container().appendTo($('.dataTables_length').parent());

    $('.column-toggle').on('change', function() {
        var columnIndex = $(this).parent().index();
        table.column(columnIndex).visible(this.checked);
    });
});


$(document).ready(function() {

    // Default Datatable
    // $('#basic-datatable').DataTable({
    //     "columnDefs": [
    //         { "orderable": false, "targets": "_all" }
    //     ],
    //     "language": {
    //         "paginate": {
    //             "previous": "<i class='uil uil-angle-left'>",
    //             "next": "<i class='uil uil-angle-right'>"
    //         }
    //     },
    //     "dom": 'Bfrtip',
    //     "buttons": [{
    //         'extend':'colvis',
    //         'text':'Show/Hide Columns',
    //         'columns': ':not(.action)'
    //     },
    //     ],
    //     "drawCallback": function () {
    //         $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    //     }
    // });
 

 // Default Datatable
 $('.basic-datatable').DataTable({
    "ordering": false,
    "columnDefs": [
        { "orderable": false, "targets": "_all" }
    ],
    "language": {
        "paginate": {
            "previous": "<i class='uil uil-angle-left'>",
            "next": "<i class='uil uil-angle-right'>"
        }
    },
    "dom": 'Bfrtip',
    "buttons": [
        'colvis'
    ],
    "drawCallback": function () {
        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
    }
});
    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": "_all" }
        ],
        lengthChange: false,
        buttons: ['copy', 'print'],
        "language": {
            "paginate": {
                "previous": "<i class='uil uil-angle-left'>",
                "next": "<i class='uil uil-angle-right'>"
            }
        },
        "dom": 'Bfrtip',
        "buttons": [{
            'extend':'colvis',
            'text':'Show/Hide Columns',
            'columns': ':not(.action)'
        }
        ],
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });

    // Multi Selection Datatable
    $('#selection-datatable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": "_all" }
        ],
        select: {
            style: 'multi'
        },
        "language": {
            "paginate": {
                "previous": "<i class='uil uil-angle-left'>",
                "next": "<i class='uil uil-angle-right'>"
            }
        },
        "dom": 'Bfrtip',
        "buttons": [{
            'extend':'colvis',
            'text':'Show/Hide Columns',
            'columns': ':not(.action)'
        }
        ],
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });

    // Key Datatable
    $('#key-datatable').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": "_all" }
        ],
        keys: true,
        "language": {
            "paginate": {
                "previous": "<i class='uil uil-angle-left'>",
                "next": "<i class='uil uil-angle-right'>"
            }
        },
        "dom": 'Bfrtip',
        "buttons": [{
            'extend':'colvis',
            'text':'Show/Hide Columns',
            'columns': ':not(.action)'
        }
        ],
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });




    table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $(".dataTables_length select").addClass('form-select form-select-sm');
    $(".dataTables_length select").removeClass('custom-select custom-select-sm');

    $(".dataTables_length label").addClass('form-label');


} );
