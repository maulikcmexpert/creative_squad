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
        <form id="addStack" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
          <div class="invoice-title border-grey">
            <h3 class="mb-0"><span><i class="far fa-file-alt"></i></span> Add Stack</h3>
          </div>

           <div class="form-group mt-5">
                <label for="website" class="col-sm-2 col-form-label pl-0">Profession</label>
            <div class="row">
              <div class="col-sm-9">
                <select name="profession_id" class="form-control">
                    <option value="">Select Profession</option>
                    <?php foreach ($getProfession as $key => $value) { ?>
                    	<option value="<?=$value->id?>" <?=($editData[0]->profession_id==$value->id) ? "SELECTED" : ""?>><?=$value->name?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group" id="append">
                <label for="website" class="col-sm-2 col-form-label pl-0">Stack</label>
            <div class="row">
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control name" placeholder="Stack name" value="<?=$editData[0]->stack_name?>">
                 <span class="error"></span>
              </div>
            </div>
          </div>

            <div class="button-group">
                <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-new">Save </button>
                  <a href="<?=base_url()?>admin/stack" style="display: inline-block;" class="btn btn-new">Cancle</a>
            </div>
          </div>
      </form>
    </div>
  </div>
</section>
