 <footer class="main-footer">
        <div class="footer-left">
          Copyright © 2020 <div class="bullet"></div> Design By <a href="#">CMEXPERTISE</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>  
          
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?=base_url()?>public/admin/assets/js/app.min.js"></script>
  <!-- Page Specific JS File -->
  <!-- <script src="<?=base_url()?>public/admin/assets/js/page/index.js"></script> -->
  <!-- Template JS File -->
  <script src="<?=base_url()?>public/admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
 <!-- <script>
    options = {
      useZebra: true,
      useObserver: true,
      showToggle: true,
      showToggleAll: true,
    }
    $("table.shrink").tableShrinker(options)
  </script> -->
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
<script type="text/javascript">
  $(document).on('show','.accordion', function (e) {
         //$('.accordion-heading i').toggleClass(' ');
         $(e.target).prev('.accordion-heading').addClass('accordion-opened');
    });
    
    $(document).on('hide','.accordion', function (e) {
        $(this).find('.accordion-heading').not($(e.target)).removeClass('accordion-opened');
        //$('.accordion-heading i').toggleClass('fa-chevron-right fa-chevron-down');
    });
</script>


