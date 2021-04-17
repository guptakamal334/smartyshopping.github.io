// ----------------------for contact Us form--------------------------------
function send_message() {
    jQuery('.error').html('');
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
            success:function(result) {
                
                    jQuery('#error_button').html(result);
                    // alert(result);
                    jQuery('#contact')[0].reset();
             
            }
        })
    }
}

// ------------------------for Login--------------------------

function sign_in() {
    // jQuery('.error').html('');
    var email =jQuery("#username").val();
    var password =jQuery("#password").val();
    var is_error='';
    
    if(email==''){
        jQuery('#error_username').html('Please Enter Name');
        is_error='yes';
    }else{
        jQuery('#error_username').html('');
    }
    
    if(password==''){
        jQuery("#error_password").html('Please Enter Password');
        is_error='yes';
    }else{
        jQuery('#error_password').html('');
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
                
                jQuery('#error_button').html(result);
               alert(result);
                   window.location.href='home.php';
                // if(window.location.href=='signin.php'){
                //     window.location.href='index.php';
                // }else{
                //     window.location.href=window.location.href;
                // }
              
            }
        })
    }
}



// ----------------------------------select problem Title & problem category--------------------------
$(document).ready(function(){
    jQuery('#problem_title').change(function(){
      var id=jQuery('#problem_title').val();
      
      if(id==''){
        jQuery('#problem_category').html('<option value="">Select Problem Category....</option>'); 
      }else{
        jQuery('#problem_category').html('<option value="">Select Problem Category....</option>'); 
              jQuery.ajax({
              type:'post',
              url:'get_problem_title.php',
              data:'id='+id,
              success:function(result){
                // alert(result);
                  jQuery('#problem_category').append(result);
              }
        });
      }
    });
  });