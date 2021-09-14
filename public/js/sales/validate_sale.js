$(function() {
    var btns_validates = $('.btns_validates');
    if (btns_validates.length > 0) {
        var sale_id_modal = $('#sale_id_modal');
        var specifier_modal = $('#specifier_modal');
        var value_modal = $('#value_modal');
        
        $.each(btns_validates, function (indexInArray, btn_validate) { 
            btn_validate = $(this);
            var sale_id = btn_validate.attr('data-sale_id');
            var specifier_td = $('#specifier_td_'+sale_id);
            var value_td = $('#value_td_'+sale_id);

            btn_validate.on('click', function() {
            
                specifier_modal.text(specifier_td.text().trim());
                value_modal.text(value_td.text().trim());
                sale_id_modal.val(sale_id);
            })
        });

    }
});