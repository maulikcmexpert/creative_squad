<section class="login-wrapper">
      <?php if($this->session->flashdata('danger') != ''){
          echo $this->session->flashdata('danger');
        }else{
          echo $this->session->flashdata('success');
        } ?>

            <div class="card card-primary card-login">
              <div class="card-header" style="background: #5a5ace;">
              <div class="card-logo">
                <img src="<?=base_url()?>public/admin/assets/img/logo1.png">
              </div >
                
              </div>
              <div class="card-body">
              <h4>Login</h4>
                <form id="frmAddEditSection" method="POST" action="<?=$FormAction?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?=base_url()?>users_account/forgetpass" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group d-none">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label remb" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
            
                <div class="mt-5 text-muted text-center create-one d-none">
                <p>Don't have an account? <a href="<?=base_url()?>users_account/register">Create One</a></p>
            </div>
              </div>
            </div>
            
</section> 