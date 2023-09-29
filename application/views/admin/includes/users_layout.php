<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from radixtouch.in/templates/admin/aegis/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Mar 2020 10:02:45 GMT -->
<head>
      <?php $this->load->view('admin/includes/header');?>  
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php $this->load->view('admin/includes/navbar');?>

      <div class="main-sidebar sidebar-style-2">
        <?php $this->load->view('admin/includes/sidebar');?>
      </div>
      <!-- Main Content -->
      <div class="main-content" style="min-height: 562px;">
        <?php $this->load->view($page);?>
      </div>
      <?php $this->load->view('admin/includes/footer'); ?>
  <input type="hidden" id="base_url" value="<?=base_url()?>">
</body>
</html>