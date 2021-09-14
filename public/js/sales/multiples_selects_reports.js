$(function()
{
    var prof_and_offices_select = $('.prof_and_offices_select');
    if (prof_and_offices_select.length)
    {
        $('.prof_and_offices_select').multiSelect();
        $('.select-all-professionals').click(function(){
        $('.prof_and_offices_select').multiSelect('select_all');
        return false;
        });
        $('.deselect-all-professionals').click(function(){
        $('.prof_and_offices_select').multiSelect('deselect_all');
        return false;
        });
        $('.refresh').on('click', function(){
        $('.prof_and_offices_select').multiSelect('refresh');
        return false;
        });
    }

    var shopkeepers_select = $('.shopkeepers_select');
    if (shopkeepers_select.length)
    {    
        $('.shopkeepers_select').multiSelect();
        $('.select-all-shopkeepers').click(function(){
        $('.shopkeepers_select').multiSelect('select_all');
        return false;
        });
        $('.deselect-all-shopkeepers').click(function(){
        $('.shopkeepers_select').multiSelect('deselect_all');
        return false;
        });
        $('.refresh').on('click', function(){
        $('.shopkeepers_select').multiSelect('refresh');
        return false;
        });
    }
});