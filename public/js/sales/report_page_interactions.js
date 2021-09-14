$(function()
{
    var form_gerenate_report = $('#form_gerenate_report');
    var token_gerenate_report = form_gerenate_report.find("input[name=_token]").val();

    var ajax_get_compatible_sales = $('#ajax_get_compatible_sales');
    var token_compatible_sales = ajax_get_compatible_sales.find("input[name=_token]").val();

    var prof_and_offices_select = $('#prof_and_offices_select');
    var shopkeepers_select = $('#shopkeepers_select');
    var selected_month = $('#selected_month');
    var purchase_date = $('#purchase_date');
    var created_at = $('#created_at');

    var invalid_search = $('#invalid_search');
    var seeking_compatible_sales = $('#seeking_compatible_sales');
    var compatible_recorded_sales = $('#compatible_recorded_sales');
    var num_sales_found = $('#num_sales_found');


    
    prof_and_offices_select.on('change', function() {
        getCompatibleSales();

    });
    shopkeepers_select.on('change', function() {
        getCompatibleSales();

    });
    selected_month.on('change', function() {
        getCompatibleSales();

    });

    
    purchase_date.on('apply.daterangepicker', function(ev, picker) {
        getCompatibleSales();
    });
    purchase_date.on('cancel.daterangepicker', function(ev, picker) {
        getCompatibleSales();
    });
    
    created_at.on('apply.daterangepicker', function(ev, picker) {
        getCompatibleSales();
    });
    created_at.on('cancel.daterangepicker', function(ev, picker) {
        getCompatibleSales();
    });
    


    function getDataForm() {
        var data = {
            '_token': $("input[name='_token']").val(),
            'prof_and_offices_select': $("select[name='prof_and_offices_select[]']").val(),
            'shopkeepers_select': $("select[name='shopkeepers_select[]']").val(),
            'selected_month': $("select[name='selected_month']").val(),
            'purchase_date': $("input[name='purchase_date']").val(),
            'created_at': $("input[name='created_at']").val(),
            'ranking_types': $("input[name='ranking_types']").val(),
            'promotion_period': $("input[name='promotion_period']").val(),
            'bonus': $("input[name='bonus']").val(),
        };

        return data;
    }

    function getCompatibleSales() {
        var data = getDataForm();
        if (data['prof_and_offices_select'] != null && data['shopkeepers_select'] != null) {
            hideElement(compatible_recorded_sales);
            showElement(seeking_compatible_sales);
            hideElement(invalid_search);
    
            $.post(ajax_get_compatible_sales.attr('action'), data)
            .done(function(data) {
                num_sales_found.text(data.count_sales);
    
            }).always(function(data) {
                hideElement(seeking_compatible_sales);
                showElement(compatible_recorded_sales);
            });
        } else {
            showElement(invalid_search);
            hideElement(compatible_recorded_sales);
            hideElement(seeking_compatible_sales);
        }
    }

    function hideElement(element) {
        element.css('display', 'none');
    }
    function showElement(element) {
        element.css('display', 'unset');
    }
});