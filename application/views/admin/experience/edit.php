<style type="text/css">
    span.error{
      color: red;
    }

    .about-experience-wrp label{
    	font-weight: 600;
	    color: black;
	    font-size: 14px;
	    letter-spacing: 0px;
	    display: flex;
	    align-items: center;
    } 
    .about-experience-wrp{
    	margin-bottom: 20px;
    }
    .about-experience-wrp input{
         color: #495057 !important;
         margin-right: 2px;
    }
  
  </style>
  <section class="new-customer background-blue-grey">
    <?php if($this->session->flashdata('myMessage') != ''){
      echo $this->session->flashdata('myMessage');
    } ?>
    <div class="container">
      <div class="row">
        <form id="editExperience" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
          <div class="invoice-title border-grey">
            <h3 class="mb-0"><span><i class="far fa-file-alt"></i></span> Edit Experience</h3>
          </div>

           <div class="form-group mt-5">
                <label for="website" class="col-sm-2 col-form-label pl-0">Profession</label>
            <div class="row">
              <div class="col-sm-9">
                <select name="profession_id" class="form-control" id="profession_id">
                    <option value="">Select Profession</option>
                    <?php foreach ($getProfession as $key => $value) { ?>
                    	<option value="<?=$value->id?>" <?=($editData[0]->profession_id==$value->id) ? "SELECTED" : ""?>><?=$value->name?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
                <label for="website" class="col-sm-2 col-form-label pl-0">Stack</label>
            <div class="row">
              <div class="col-sm-9">
                <select name="stack_id" class="form-control" id="stack_html">
                    <option value="">Select Stack</option>
                    <?php foreach ($GetStack as $key => $value) { ?>
                    	<option value="<?=$value->id?>" <?=($editData[0]->stack_id==$value->id) ? "SELECTED" : ""?>><?=$value->name?></option>
                    <?php } ?>
                   
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
                <label for="website" class="col-sm-2 col-form-label pl-0">Tech</label>
            <div class="row">
              <div class="col-sm-9">
                <select name="tech_id" class="form-control" id="tech_html">
                    <option value="">Select tech</option>
                    <?php foreach ($GetTech as $key => $value) { ?>
                    	<option value="<?=$value->id?>" <?=($editData[0]->tech_id==$value->id) ?  'selected' : '' ?>><?=$value->name?></option>
                    <?php } ?>
                   
                </select>
              </div>
            </div>
          </div>
         <!--   <div class="about-experience-wrp">
         	   <label  for="myradio">Experience level</label>
         	   <?php foreach ($getExperience as $key => $value): ?>
         	   <input type="radio" name="experience_id" id="radio-1" value="<?=$value->id?>"  <?=($editData[0]->experience_id == $value->id ) ? 'checked' : '' ?> style="margin-left:<?=($key > 0 )  ? '15px' : '' ?>" ><?=$value->name?>
         	   <?php endforeach ?>
         	   <label id="experience_id-error" class="error" for="experience_id" style="color:red"></label>
         </div> -->

<!-- 
          <div class="about-experience-wrp">
         	   <label  for="myradiotype">Type</label>
         	   <input type="radio" name="type" value="yearly" id="radio-3" <?=($editData[0]->type == 'yearly') ? 'checked' : '' ?>>Yearly
         	   <input type="radio" name="type" value="monthly" id="radio-4" <?=($editData[0]->type == 'monthly') ? 'checked' : '' ?> style="margin-left: 15px;">Monthly
         		<label id="type-error" class="error" for="type" style="color:red"></label>
         </div> -->
        
         <!-- <div class="form-group" >
                <label for="website" class="col-sm-2 col-form-label pl-0">Amount</label>
            <div class="row">
              <div class="col-sm-4">
                <input type="text" name="min" class="form-control" id="minAmount" value="<?=$editData[0]->min?>" placeholder="Minimum amount" >
                 <span class="error"></span>
              </div>
              <div class="col-sm-4">
                <input type="text" name="max" class="form-control" id="maxAmount" value="<?=$editData[0]->max?>" placeholder="Maximum amount" >
                 <span class="error"></span>
              </div>
            </div>
          </div> -->
            <div class="form-group" id="append" >
                <!-- <label for="website" class="col-sm-2 col-form-label pl-0">Experience level</label> -->
            <div class="row">
              <div class="col-sm-3">
              	<label for="website" class="col-form-label pl-0" style="color:#000">Experience level</label>
                <select name="experience_id[]" class="form-control experience_id">
                    <option value="">Select Experience</option>
                   <?php foreach ($getExperience as $key => $value){ ?>
                   	<option value="<?=$value->id?>" <?=($editData[0]->experience_id == $value->id)? 'selected' : '' ?>><?=$value->name?></option>
                   <?php } ?>
                </select>
                 <span class="error"></span>
              </div>
              <div class="col-sm-3">
              	<label for="website" class="col-form-label pl-0" style="color:#000">Type</label>
                <select name="type[]" class="form-control type">
                    <option value="">Select type</option>
                   	<option value="monthly" <?=($editData[0]->type == 'monthly') ? 'selected' : '' ?>>Monthly</option>
                   	<option value="yearly" <?=($editData[0]->type == 'yearly') ? 'selected' : '' ?>>Yearly</option>
                </select>
                 <span class="error"></span>
              </div>
              <div class="col-sm-2">
              	<label for="website" class="col-form-label pl-0" style="color:#000">Min Amount</label>
                <input type="text" name="min[]" class="form-control min" id="minAmount" placeholder="Minimum amount" value="<?=$editData[0]->min?>" >
                 <span class="error"></span>
              </div>
              <div class="col-sm-2">
              	<label for="website" class="col-form-label pl-0" style="color:#000">Max Amount</label>
                <input type="text" name="max[]" class="form-control max" id="maxAmount" placeholder="Maximum amount" value="<?=$editData[0]->max?>">
                 <span class="error"></span>
              </div>
             
               <div class="col-sm-2">
                <label for="website" class="col-form-label pl-0" style="color:#000">France Company Min Amount</label>
                <input type="text" name="frc_min[]" class="form-control min" id="frcminAmount" placeholder="Minimum amount" value="<?=$editData[0]->frc_min?>" >
                 <span class="error"></span>
              </div>
              <div class="col-sm-2">
                <label for="website" class="col-form-label pl-0" style="color:#000">France Company Max Amount</label>
                <input type="text" name="frc_max[]" class="form-control max" id="frcmaxAmount" placeholder="Maximum amount" value="<?=$editData[0]->frc_max?>">
                 <span class="error"></span>
              </div>
               <div class="col-sm-2">
                <label for="website" class="col-form-label pl-0" style="color:#000">Frc Base Min Amount</label>
                <input type="text" name="frc_base_salary_min[]" class="form-control min" id="frcbaseminAmount" placeholder="Minimum amount" value="<?=$editData[0]->frc_base_salary_min?>" >
                 <span class="error"></span>
              </div>
              <div class="col-sm-2">
                <label for="website" class="col-form-label pl-0" style="color:#000">Frc Base Max Amount</label>
                <input type="text" name="frc_base_salary_max[]" class="form-control max" id="frcbasemaxAmount" placeholder="Maximum amount" value="<?=$editData[0]->frc_base_salary_max?>">
                 <span class="error"></span>
              </div>
             <!--  <div class="col-sm-2 align-self-center pt-4">
                <button type="button" class="btn btn-primary" id="add">Add</button>
              </div> -->
            </div>
          </div>

          </div>
          
            <div class="button-group">
                <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-new">Save </button>
                  <a href="<?=base_url()?>admin/experience" style="display: inline-block;" class="btn btn-new">Cancle</a>
            </div>
          </div>
      </form>
    </div>
  </div>
</section>
