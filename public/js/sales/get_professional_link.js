$(function () {
    var num_multiple_sales = $('#num_multiple_sales').text();
    
    if (num_multiple_sales.length) {
        var form_get_professional_link_ajax = $('#form_get_professional_link_ajax');
        
        for (let i = 1; i <= num_multiple_sales; i++) {

            $('.search_specifiers_'+i).on('change', function() {
                var search_specifiers = $('.search_specifiers_'+i);
                var div_professional_link = $('.div_professional_link_'+i);
                var link_information = $('.link_information_'+i);
                
                div_professional_link.addClass('hide');
    
                $.get(form_get_professional_link_ajax.attr('action')+'/'+search_specifiers.val(), function(data) {
                    if (data == 'is_autonomous') {
    
                        link_information.text('Autônomo');
                    } else if (data == 'is_office') {
    
                        link_information.text('Escritório');
                    } else {
                        var span_office = $('.span_office_'+i);
                        var span_user = $('.span_user_'+i);
                        var radio_office = $('#radio_office_'+i);
                        var radio_user = $('#radio_user_'+i);

                        div_professional_link.removeClass('hide');
                        
                        link_information.text('');
                        span_office.text(data['office']['name']);
                        span_user.text(data['professional']['name']);
                        radio_office.val(data['office']['id']);
                        radio_user.val(data['professional']['id']);
                    }
                });
            });
        }
    }
});