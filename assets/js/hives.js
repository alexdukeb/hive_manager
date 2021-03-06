const $ = require('jquery');
var dt = require( 'datatables.net' );


$(function() {

    
    var $delete_ctas = $(".hives button.delete_cta");

    function init() {
        $('#hives_table').DataTable({
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

    function deleteAction(e) {
        let id = $(e.target).data('id')
        fetch(`/hives/delete/${id}`, {
            method: 'DELETE'
        }).then(
            res => window.location.reload()
        );
    }

    function onEvents() {
        $delete_ctas.on('click', deleteAction);
    }
    onEvents();
    init()

});