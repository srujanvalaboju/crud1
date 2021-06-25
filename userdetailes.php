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
    <form class="form-horizontal" enctype="multipart/form-data" class="form-horizontal" role="form">
      <h3><span class="label label-default" style="margin-left: 180px;">User Details</span></h3><br>
      <div class="form-group">
          <table style="width:100%" >
            <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">firstname</label><td>
              <td style="padding-right: 10px;">:</td>
              <td id="firstname"></td>
            </tr>
           <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">lastname</label><td>
              <td style="padding-right: 20px;">:</td>
              <td id="lastname"></td>
            </tr>
            <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">email</label><td>
              <td style="padding-right: 20px;">:</td>
              <td id="email"></td>
            </tr>
            <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">mobile</label><td>
              <td style="padding-right: 20px;">:</td>
              <td id="mobile"></td>
            </tr>
            <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">Image</label><td>
              <td style="padding-right: 20px;">:</td>
              <td><img id="image" style="height:50px; width:50px;"></img><td>
            </tr>
            <tr>
              <td><label  class="col-sm-4 control-label" style="left: 90px;">city</label><td>
              <td style="padding-right: 20px;">:</td>
              <td id="city"></td>
            </tr>
          </table>
          <br>
          <br>
          <div class="form-group">
          <button type="button" id="edit" class="btn btn-danger" style="margin-left: 170px;">Edit</button>
          <button type="button" id="logout" class="btn btn-info" style="margin-left: 10px;">Logout</button>
          <button type="button" id="reset" class="btn btn-info" style="margin-left: 10px;">Change Password</button>
          </div>
        <!-- <div id="wait" style="display:none" class='pointer'></div>
        <div id="img" style="display:none;width:45px;height:45px;position:absolute;top:50%;left:50%;">
          <img src="<?php echo base_url().'imguploads/demo_wait.gif';?>" width="32" height="32" />
        </div> -->
      </div>
    </form>
  </div>
</html>



<script>
$(document).ready(function(){
  // $("#wait").show();
  // $("#img").show();
  $.ajax({
    type: "GET",
    url: "<?php echo base_url().'Apis/Home/userdata'?>",
    dataType: "json",
    success: function (data){
      $("#firstname").text(data[0].firstname);
      $("#lastname").text(data[0].lastname);
      $("#email").text(data[0].email);
      $("#mobile").text(data[0].mobile);
      $("#city").text(data[0].City);
      $("#image").attr('src',"<?php echo base_url() ?>"+data[0].imagepath);
    }
  });
});


$(document).on('click','#edit',function(){
  window.location.href ="<?php echo base_url().'Apis/Home/edit'?>";
});

$(document).on('click','#logout',function(){
  toastr.success('Logged out successfully....!', {timeOut: 1000});
                      setTimeout(function(){
                          window.location.href = "<?php echo base_url().'Apis/home/logout/';?>";
                          }, 2000);
});

$(document).on('click','#reset',function(){
  window.location.href ="<?php echo base_url().'Apis/Home/reset'?>";
});

 
</script>






