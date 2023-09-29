<section class="login-wrapper">
            <?php if($this->session->flashdata('myMessage') != ''){
                  echo  $this->session->flashdata('myMessage');
            } ?>
            <div class="card card-primary card-login card-forget">
              <div class="card-header" style="background: #5a5ace;">
              <div class="card-logo">
                <img src="<?=base_url()?>public/admin/assets/img/logo1.png" >
              </div>
                
              </div>
              <div class="card-body">
                <h4>Forget Password</h4>
                <p class="text-muted">We will send a link to reset your password</p>
                <form id="frmAddEditSection" method="POST" action ='<?=$FormAction?>'>
                  <div class="form-group">
                    <label for="forget_email">Email</label>
                    <input id="forget_email" type="email" class="form-control" name="forget_email" tabindex="1" required="" autofocus="">
                    <label id="forget_email-error" class="error" for="forget_email"><?=@form_error('forget_email')?></label>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-btn" tabindex="4">
                      Forgot Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            
</section>  