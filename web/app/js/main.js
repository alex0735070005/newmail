jQuery('document').ready(function()
{
    $('#changePassForm').on('submit', 'form', function (e)
    {
        e.preventDefault();
        var url = this.action;
        var formSerialize = $(this).serialize();

        $.post(url, formSerialize, function (response) {
            $('#changePassForm').find('.modal-body').html(response);
        });
    });
    
    $('#change_email').on('click', function ()
    {
        var url = this.dataset.url;
        var uemail = $('#user_email')[0];
        var button = $(this);
        
        if(uemail.disabled){
            uemail.disabled = false;
            button.find('span').removeClass('hidden');
            button.find('i').addClass('hidden');
        }
        else if(valid(uemail.value))
        {
            
            $.post(url, JSON.stringify({ 'email': uemail.value }), function (data) 
            {
                if(data.answer){
                    uemail.disabled = true;
                    $('.err_email').addClass('hidden');
                    button.find('i').removeClass('hidden');
                    button.find('span').addClass('hidden');
                     $('.success_email').removeClass('hidden');
                    setTimeout(function(){
                         $('.success_email').addClass('hidden');
                    },2000);
                }
                
            },'JSON');
        }else{
            $('.err_email').removeClass('hidden');
        }
    });
    
    $('#get_status_ttn').on('click', function ()
    {
        var url = this.dataset.url;
        var ttn = $('#user_ttn')[0];
        
        $.post(url, JSON.stringify({'ttn': ttn.value}), function (data) 
        {
           if(data!=='not_valid'){
                $('.er_ttn').addClass('hidden');
               $('#ttn_cont').html(data);
           }else{
               $('.er_ttn').removeClass('hidden');
           }
        });
        
    });
    
   
    function valid(email)
    {
       var re = /^[a-zA-Z0-9_\-\.]{2,}@[a-zA-Z0-9_\-\.]{1,}\.[a-zA-Z]{2,6}$/;
       return  re.test(email);
    }
});
