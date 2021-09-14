$(function()
{
    var buyers_selector = $("#buyers_selector");

    if (buyers_selector.length > 0) {

        var div_professional_link = $('#div_professional_link');
        // buyers_selector.on('change', function() {
        //     var user_selected = buyers_selector.find(":selected");
        //     var office_user_selected = user_selected.parent();
            
        //     var div_office = $('#div_office');
            
        //     var radio_user = $('#radio_user');
        //     var span_user = $('#span_user');

        //     var radio_office = $('#radio_office');
        //     var span_office = $('#span_office');


        //     if (office_user_selected.attr('data-office_id').length > 0) {
        //         div_office.text(office_user_selected.attr('label'));
                
        //         radio_user.val(1);
        //         radio_office.val(0);
        //         span_user.text(user_selected.text().trim());
        //         span_office.text(office_user_selected.attr('label'));

        //         showElement(div_professional_link);
        //     } else {
        //         radio_user.val(1);
        //         radio_office.val(1);

        //         hideElement(div_professional_link);
        //     }
        // });

        function showElement(element) {
            element.css('display', 'unset');
        }
        function hideElement(element) {
            element.css('display', 'none');
        }
    }
});