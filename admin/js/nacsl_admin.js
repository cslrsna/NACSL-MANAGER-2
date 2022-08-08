jQuery(function(){
    $ = jQuery;
    const checkbox = $("input[type=checkbox]");
    checkbox.on('change',function(e){
        const elem = $(this);
        if(elem.attr('checked')){
            elem.removeAttr('checked');
            elem.attr('value',false);
        }else{
            elem.attr('checked',true);
            elem.attr('value', true);
        }
    } );
    }
)