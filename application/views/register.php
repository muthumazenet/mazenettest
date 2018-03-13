<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <title>Registration-CI Login Registration</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


  </head>
  <body>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                   <?php
                  if($message!=''){
                    echo "<h4 style='color:#fff; padding:5px; background:".$color_code."'>".$message."</h4>";
                  }
                   ?>
                  <div class="panel-heading">
                      
                      <h3 class="panel-title">Registration</h3>
                  </div>
                  <div class="panel-body">

                 

                      <form role="form" method="post" >
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="User Name" name="user_name" type="text" value="<?php echo set_value('user_name'); ?>" autofocus>
                                  <label class="error"><?php echo form_error('user_name'); ?></label>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="user_email" value="<?php echo set_value('user_email'); ?>"  type="email" autofocus>
                                   <label class="error"><?php echo form_error('user_email'); ?></label>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="user_password"  type="password" value="">
                                   <label class="error"><?php echo form_error('user_password'); ?></label>
                              </div>
                        <div class="form-group">
                                 <input class="form-control" placeholder="Confirm Password" name="user_cpassword" type="password" value="">
                         <label class="error"><?php echo form_error('user_cpassword'); ?></label>
                        </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Age" name="user_age"  value="<?php echo set_value('user_age'); ?>" type="date" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Mobile No"  value="<?php echo set_value('user_mobile'); ?>" name="user_mobile" type="number" value="">
                              <label class="error"><?php echo form_error('user_mobile'); ?></label>
                              </div>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" >

                          </fieldset>
                      </form>
                      <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>">Login here</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>




  </body>
</html>
