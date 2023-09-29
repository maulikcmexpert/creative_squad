<section class="login-wrapper">
  

  
            <div class="card card-primary card-register">
              <div class="card-header">
                <div class="card-logo">
                <img src="<?=base_url()?>public/users/assets/img/logo.png">
              </div >
              
              </div>
              <div class="card-body">
                <h4>Register</h4>
                <form id="frmAddEditSection" method="POST" action ="<?=$FormAction?>">
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                      <label for="first_name ">First Name</label>
                      <input id="first_name " type="text" class="form-control" name="first_name" autofocus>
                      <label id="first_name -error" class="error" for="first_name "></label>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                      <label id="last_name-error" class="error" for="last_name"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <label id="email-error" class="error" for="email"></label>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <label id="password-error" class="error" for="password"></label>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12">
                      <label for="confirm_password" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="confirm_password">
                      <label id="password2-error" class="error" for="password2"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="<?=base_url().'admin'?>">Login</a>
              </div>
            </div>
            
</section>  