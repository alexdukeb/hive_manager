const $ = require('jquery');
var dt = require( 'datatables.net' );

$(function() {

    function init() {
        $('#info_table').DataTable({
            "paging": true,
            "info": true,
            "searching": true,
            "dom": 'ftlip',
            "language": {
                "lengthMenu": "_MENU_ lignes par page",
                "info": "Lignes _START_ à _END_ sur _TOTAL_",
                "paginate": {
                  "previous": "<",
                  "next": ">",
                },
                "search": "",
                "searchPlaceholder": "Rechercher ..."
            }
        });
    }

    function onEvents() {
    }
    
    onEvents();
    init()

});