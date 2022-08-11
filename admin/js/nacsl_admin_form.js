(function($){
    const checkbox = $("input[type=checkbox]");
    checkbox.on('change',function(e){
        const elem = $(this);
        elem.attr('value', ! elem.attr('value'));
    } );
    }
)(jQuery);