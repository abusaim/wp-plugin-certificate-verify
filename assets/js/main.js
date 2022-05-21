var $ = jQuery;
$(document).ready(function(){
    // Traning Participent delete
    $('#show_all_std .std_del').click(function(){
        if (confirm('Are you sure you want to delete this?')) {
        	let stdid = $(this).attr('href');
            let nonce = $("#show_all_std").attr('data-nonce');
            jQuery.ajax({
                type : "POST",
                url : myAjax.ajaxurl,
                data : {
                    action: "asdscvjksaim_delete_traning_participent",
                    stdid : stdid,
                    nonce : nonce,
                },
                success: function(response){
                    console.log(response);
                    if(1 == response) {
                        // page reload
                        location.reload();
                    }
                    else{
                        // error
                        alert('Error');
                    }
                }  
            });
        }
        return false;
    });
});