const $ = require('jquery');

$(function() {

    
    var $delete_ctas = $(".hives button.delete_cta");

    function init() {
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