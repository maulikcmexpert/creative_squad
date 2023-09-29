  <style type="text/css">
    span.error{
      color: red;
    }
    @media (max-width: 575px){
	  .basic-form .button-group a{
		    margin-bottom: 8px !important;
		}
	}
  </style>
  <section class="new-customer background-blue-grey">
    <?php if($this->session->flashdata('myMessage') != ''){
      echo $this->session->flashdata('myMessage');
    } ?>
    <div class="container">
      <div class="row">
        <form id="editProfession" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
          <div class="invoice-title border-grey ">
            <h3 ><span><i class="far fa-file-alt"></i></span> Edit Profession</h3>
          </div>

          <div class="form-group mt-5" id="append">
                <label for="website" class="col-sm-2 col-form-label pl-0">Profession</label>
            <div class="row">
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control name" placeholder="profession name" value="<?=$getData[0]->name?>">
              </div>
            </div>
          </div>

            <div class="button-group">
                <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-new">Save </button>
                  <a href="<?=base_url()?>admin/profession" style="display: inline-block;" class="btn btn-new">Cancle</a>
            </div>
          </div>
      </form>
    </div>
  </div>

</section>
