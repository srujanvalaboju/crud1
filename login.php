<?php
include 'script.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ApiCrud</title>
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css"> 
    </head>
    <br>
    <br>
    <div class="container">
        <form method="post" id="formLogin" class="form-horizontal" role="form">
            <h3><span class="label label-default" style="margin-left: 200px;">Login Form</span></h3><br>
            <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control" name= "email">
                        <span style="color:red; display:none" id="inline_email"> Please enter Email adress.. </span><br>
                        <span style="color:red; display:none" id="inline_emailFormat"> Email not in a correct format...! </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="Password" id="password" name="password" placeholder="Password" class="form-control">
                        <span style="color:red; display:none" id="inline_password"> Please enter Password </span><br>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" id="login" onclick="ValidateForm()" name="login" class="btn btn-danger" style="margin-left: 150px;">Login</button>
                    <a href="<?php echo base_url().'Apis/home/register';?> " class="btn btn-info" >Register</a>
                </div>
            </div>
        </form>
    </div>
    <div id="wait" style="display:none" class='pointer'></div>
    <div id="img" style="display:none;width:45px;height:45px;position:absolute;top:50%;left:50%;">
    <img src="<?php echo base_url().'imguploads/demo_wait.gif';?>" width="32" height="32" />
    </div>

</html>



<script>
$(document).on('keyup','.form-control',function(){
  if($(".form-control").val()){
    var id=$(this).attr('id');
    $("#inline_"+id).hide();
  }
});

function ValidateForm(){
  var isError = false;
  if(!$("#email").val()){
    $("#inline_email").show();
    isError=true;
    }
    
    if(!$("#password").val()){
    $("#inline_password").show();
    isError=true;
    }
    

    if(!isError){
        $("#wait").show();
        $("#img").show();
        $("#formLogin").trigger('submit');
    }
}

$("#formLogin").submit(function(e){
            e.preventDefault();
        $.ajax({
                type: "POST",
                url: "<?php echo base_url().'Apis/Home/logindata'?>",
                data: $("#formLogin").serialize(),
                success: function(data){
                    if(data>0){
                        toastr.success('Logged in successfully....!', {timeOut: 1000});
                        setTimeout(function(){
                            window.location.href = "<?php echo base_url().'Apis/home/Userdetailes';?>"
                        }, 2000);                            
                    }
                    else
                    {
                        toastr.error('Username/Password is incorrect....!', {timeOut: 500});
                        $("#img").hide();
                        $("#wait").hide();
                    }
                    
                },
        });
    });



$(document).on('focusout','#email',function(){
var userinput = $('#email').val();
if(userinput){
var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
var res =pattern.test(userinput);
    if(res == false){
        $("#inline_emailFormat").show();
        $('#email').val('');
    }else{
        $("#inline_emailFormat").hide();
    }
}
});
</script>












    