<nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>

          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user" style="text-align: center !important;"> 
              <!-- <img alt="image" src="<?=base_url()?> -->
               <!-- public/admin/assets/img/user.png" class="user-img-radious-style"  -->
               >
                <i class="fa-solid fa-circle-user" style="color:#6777ef !important;text-align: center;font-size: 35px !important;margin-left: -5px !important;"></i> 
                 <span class="d-sm-none d-lg-inline-block"></span>
              </a>
            <div class="dropdown-menu dropdown-menu-right pullDown new-dropdown-2">
              <div class="dropdown-title"><?=$this->session->userdata('name')?></div>
              <a href="<?=base_url()?>admin/profile" class="dropdown-item has-icon"> <i class="far
                    fa-user"></i> Profile
              </a> 
                            <div class="dropdown-divider"></div>
              <a href="<?=base_url()?>users_account/logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>