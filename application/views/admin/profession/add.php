  <style type="text/css">
    span.error{
      color: red;
    }
  </style>
  <section class="new-customer background-blue-grey">
    <?php if($this->session->flashdata('myMessage') != ''){
      echo $this->session->flashdata('myMessage');
    } ?>
    <div class="container">
      <div class="row">
        <form id="addProfession" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
          <div class="invoice-title border-grey">
            <h3 class="mb-0"><span><i class="far fa-file-alt"></i></span> Add Profession</h3>
          </div>

          <div class="form-group mt-5" id="append">
                <label for="website" class="col-sm-2 col-form-label pl-0">Profession</label>
            <div class="row">
              <div class="col-sm-9">
                <input type="text" name="name[]" class="form-control name" placeholder="profession name" >
              </div>
              <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="add">Add</button>
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
  <div style="display: none;" id="html">
     <div class="row">
        <div class="col-sm-9">
          <input type="text" name="name[]" class="form-control name" placeholder="profession name" >
          <span class="error"></span>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger remove">remove</button>
        </div>
      </div>
  </div>
</section>
