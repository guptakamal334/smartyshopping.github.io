//-- ------------------------JS for product Gallery---------------- -
 
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");
        SmallImg[0].onclick=function()
        {
            ProductImg.src=SmallImg[0].src; 
        }
        SmallImg[1].onclick=function()
        {
            ProductImg.src=SmallImg[1].src; 
        }
        SmallImg[2].onclick=function()
        {
            ProductImg.src=SmallImg[2].src; 
        }
        SmallImg[3].onclick=function()
        {
            ProductImg.src=SmallImg[3].src; 
        }
        SmallImg[4].onclick=function()
        {
            ProductImg.src=SmallImg[4].src; 
        }
        SmallImg[5].onclick=function()
        {
            ProductImg.src=SmallImg[5].src; 
        }
        SmallImg[6].onclick=function()
        {
            ProductImg.src=SmallImg[6].src; 
        }
        SmallImg[7].onclick=function()
        {
            ProductImg.src=SmallImg[7].src; 
        }




// ----------------------------check--Out---form-------------------------------------

    var MenuItems1=document.getElementById("check__form");
    MenuItems1.style.maxHeight="20px";
    function height1(){
        if(MenuItems1.style.maxHeight=="20px")
        {
            MenuItems1.style.maxHeight="500px";
        }
        else
        {
            MenuItems1.style.maxHeight="20px";
        }
    }


    var MenuItems2=document.getElementById("billing__form");
    MenuItems2.style.maxHeight="20px";
    function height2(){
        if(MenuItems2.style.maxHeight=="20px")
        {
            MenuItems2.style.maxHeight="500px";
        }
        else
        {
            MenuItems2.style.maxHeight="20px";
        }
    }



    var MenuItems3=document.getElementById("payment__form");
    MenuItems3.style.maxHeight="20px";
    function height3(){
        if(MenuItems3.style.maxHeight=="20px")
        {
            MenuItems3.style.maxHeight="500px";
        }
        else
        {
            MenuItems3.style.maxHeight="20px";
        }
    }


// ---------------------contact Us form--------------------------

function send_message() {
    // jQuery('.error').html('');
    var name =jQuery("#name").val();
    var mobile =jQuery("#mobile").val();
    var email =jQuery("#email").val();
    var query =jQuery("#query").val();
    var is_error='';
    if(name==''){
        jQuery('#error_name').html('Please Enter Name');
        is_error='yes';
    }else{
        jQuery('#error_name').html('');
    }
    if(mobile==''){
        jQuery('#error_mobile').html('Please Enter Mobile');
        is_error='yes';
    }else{
        jQuery('#error_mobile').html('');
    }
    if(email==''){
        jQuery("#error_email").html('Please Enter email');
        is_error='yes';
    }else{
        jQuery("#error_email").html('');
    }
    if(query==''){
        jQuery("#error_query").html('Please Enter query');
        is_error='yes';
    }else{
        jQuery("#error_query").html('');
    }
    if(is_error==''){
        jQuery.ajax({
            url:'send_message.php',
            type:'post',
            data:'name='+name+'&mobile='+mobile+'&email='+email+'&query='+query,
            success:function (result){
                
                    jQuery('#error_button').html(result);
                    // alert(result);
                    jQuery('#contact')[0].reset();
             
            }
        })
    }
}


// ------------------------------------------for signup Form------------------------

function sign_up() {
    // jQuery('.error').html('');
    var name =jQuery("#name").val();
    var mobile =jQuery("#mobile").val();
    var email =jQuery("#email").val();
    var password =jQuery("#password").val();
    var is_error='';
    
    if(name==''){
        jQuery('#error_name').html('Please Enter Name');
        is_error='yes';
    }else{
        jQuery('#error_name').html('');
    }
    if(mobile==''){
        jQuery('#error_mobile').html('Please Enter Mobile');
        is_error='yes';
    }else{
        jQuery('#error_mobile').html('');
    }
    
    if(email==''){
        jQuery("#error_email").html('Please Enter email');
        is_error='yes';
    }else{
        jQuery('#error_email').html('');
    }
    if(password==''){
        jQuery("#error_password").html('Please Enter Password');
        is_error='yes';
    }else{
        jQuery('#error_password').html('');
    }
    if(is_error==''){
        jQuery.ajax({
            url:'save_signup.php',
            type:'post',
            data:'name='+name+'&mobile='+mobile+'&email='+email+'&password='+password,
            success:function (result){
                // if(result == "save"){
                //         jQuery('#error_button').html("your email already Exist! plase enter differnt Email Id");
                //         jQuery('#error_email').html("your email already Exist! plase enter differnt Email Id");
                // }
                // else{
                //         jQuery('#error_button').html("Your Signu is Successful");
                //         jQuery('#signup')[0].reset();        
                //     }
                
                jQuery('#error_button').html(result);
              
            }
        })
    }
}



// ------------------------for Login--------------------------

function sign_in() {
    // jQuery('.error').html('');
    var email =jQuery("#email-l").val();
    var password =jQuery("#password-d").val();
    var is_error='';
    
    if(email==''){
        jQuery('#wrong_email').html('Please Enter Name');
        is_error='yes';
    }else{
        jQuery('#wrong_email').html('');
    }
    
    if(password==''){
        jQuery("#wrong_password").html('Please Enter Password');
        is_error='yes';
    }else{
        jQuery('#wrong_password').html('');
    }

    if(is_error==''){
        jQuery.ajax({
            url:'check_signin.php',
            type:'post',
            data:'&email='+email+'&password='+password,
            success:function (result){
                // if(result == "save"){
                //         jQuery('#error_button').html("your email already Exist! plase enter differnt Email Id");
                //         jQuery('#error_email').html("your email already Exist! plase enter differnt Email Id");
                // }
                // else{
                //         jQuery('#error_button').html("Your Signu is Successful");
                //         jQuery('#signup')[0].reset();        
                //     }
                
                jQuery('#login_button').html(result);
                if(window.location.href=='signin.php'){
                    window.location.href='index.php';
                }else{
                    window.location.href=window.location.href;
                }
              
            }
        })
    }
}

function manage_cart(pid,type){
    if(type=='update'){
        var qty=jQuery("#"+pid+"qty").val();
    }else{
        qty=jQuery('#qty').val();
    }
    

    if(qty<0){
        qty=1;
    }
    jQuery.ajax({
        url:'manage_cart.php',
        type:'post',
        data:'pid='+pid+'&type='+type+'&qty='+qty,
        success:function(result){
            if(type=='update'){
                
            }
            if(type=='remove'){
                window.location.href=window.location.href;
            }
            // alert(result);
            jQuery('#cart_count').html(result);
        }
    })
}



function select(cat_id,site_path){
    var select_id=jQuery("#select_id").val();
    window.location.href=site_path+"/UserSmartyShopping/category.php?id="+cat_id+"&sort="+select_id;
}



