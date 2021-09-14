$(function() {
    var num_multiple_sales = $('#num_multiple_sales').text();
    
    if (num_multiple_sales.length) {
        var form_get_professional_and_offices_ajax = $('#form_get_professional_and_offices_ajax');
        
        for (let i = 1; i <= num_multiple_sales; i++) {
            $(".search_specifiers_"+i).select2({
                language: "pt-BR",
                minimumInputLength: 2,
                ajax: {
                    url: function (params) {
                      return form_get_professional_and_offices_ajax.attr('action')+'/'+params.term || 1;
                    },
        
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id,
                                }
                            })
                        };
                    },
                },
            });
        }
    }
});