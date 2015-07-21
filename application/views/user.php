<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>arjunphp.com</title>
  </head>
  <body>
  
    <div class=" form-group-sm">
    <?php echo validation_errors(); ?>
    <label>E-mail</label>
    <input id="email" name="email" type="text" value=""  />
    <label id="message"></label>
    <span id="loading"><img src="<?php echo base_url(); ?>ajax-loader.gif" alt="Ajax Indicator" /></span> </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
   <script type="text/javascript">
      $(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
        $('#email').blur(function(){
          var email_val = $("#email").val();
          var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
          if(filter.test(email_val)){
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>/user/email_check", {
              email: email_val
            }, function(response){
              $('#loading').hide();
              $('#message').html('').html(response.message).show().delay(4000).fadeOut();
            });
          return false;
          }
        });
      });  
    </script>
  </body>
</html>
