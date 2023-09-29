<!DOCTYPE html>
<html lang="en">
<head>
  <title>silwana france</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/public/admin/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/public/admin/assets/css/style.css"> 
<link rel="stylesheet" type="text/css" href="<?=base_url()?>/public/admin/assets/fonts/fontawesome5/css/all.css">
<style type="text/css">
  label.error{
    color:red;
  }
  div.alert{
    width : 350px;
    margin-top : 10px;
    float: right;
    border-radius: 15px;
  }
</style>
</head>
<body class="background-blue-grey">
    <?php $this->load->view($page) ?>

     <!-- General JS Scripts -->
 <script src="<?=base_url()?>public/admin/assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>public/admin/assets/js/popper.min.js"></script>
<script src="<?=base_url()?>public/admin/assets/js/bootstrap.min.js"></script>  

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</script>
<?php

if (!empty($js)) {
    foreach ($js as $value) {
        ?>
        <script src="<?php echo base_url(); ?>public/admin/assets/javascripts/<?php echo $value ?>"
        type="text/javascript"></script>
        <?php
    }
}
?>
<script>
    jQuery(document).ready(function () {
<?php
if (!empty($init)) {
    foreach ($init as $value) {
        echo $value . ';';
    }
}
?>
    });
</script>
</body>
</html>