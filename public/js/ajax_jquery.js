//script put in oneNovelView.php

$(document).on('click','.signalLink',function(){
        let id=$(this).attr('data-id');
        let novelid=$(this).attr('data-novelid');
        let bt = $(this);
        let div_parent =  bt.closest('.bts');
        let bt_danger= div_parent.find('.btn-danger');
        $.ajax({
            type: "POST",
            url: "./public/ajax/action.ajx.php",
            data: "action=signalComment&id="+id+"&novel_id="+novelid,
            success: function(retour){
                if(retour==1){
                    bt.removeClass('d-block').addClass('d-none');
                    bt_danger.removeClass('d-none').addClass('d-block');
                }
            },
        });
}); 
     