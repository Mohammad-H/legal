/* ------------------------------------------------------------------------------
*
*  # Datatables data sources
*
*  Specific JS code additions for datatable_data_sources.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&larr;', 'previous': '&rarr;' }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });





    // AJAX sourced data
    $('.datatable-ajax').dataTable({
        ajax: 'public/admin/assets/demo_data/tables/datatable_ajax.json'
    });






    // Generate content for a column
    var table = $('.datatable-generated').DataTable({
        ajax: 'public/admin/assets/demo_data/tables/datatable_ajax.json',
        columnDefs: [{
            targets: 2,
            data: null,
            defaultContent: "<button class='label label-default'>Show</button>"
        },
        {
            orderable: false,
            targets: [0, 2]
        }]
    });
    
    $('.datatable-generated tbody').on('click', 'button', function () {
        var data = table.row($(this).parents('tr')).data();
        alert(data[0] +"'s location is: "+ data[ 2 ]);
    });



    // External table additions
    // ------------------------------

    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
