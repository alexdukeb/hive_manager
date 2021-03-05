const $ = require('jquery');

$(function() {

    
    var $nav = $(".validation .modal_cgu");

    function init() {
        $('.navbar .nav-item.active').removeClass('active');
        $('.navbar .nav-item a[href="' + location.pathname + '"]').closest('li').addClass('active');
    }

    function onEvents() {
        // $validation_cta.on('click', open_validation_form);
        // $modifications_cta.on('click', open_modifications_form);
        // $cta_validation.on('click', validateValidationForm);
        // $cta_modification.on('click', validateModificationForm);
        // $close_cross_modal.on('click', close_modal);

        // $modal_sumbit.on('click', submit_modal);
        // $modal_text.on('scroll', modal_scroll);
        // $modifications_attachment_input.on('change', attachmentUpload);
    }
    onEvents();
    init()

});