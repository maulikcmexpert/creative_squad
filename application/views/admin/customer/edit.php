<section class="new-customer background-blue-grey">
  <div class="container">
    <div class="row">
   
      <form id="AddCustomerForm" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
        <div class="invoice-title border-grey">
            <h3><span><i class="far fa-file-alt"></i></span> Edit Customer</h3>
          </div>
          <input type="hidden" name="update_id" value="<?=$getcustomer[0]->id?>">
          <div class="form-group row p-50">
                      <label for="primary_contact" class="col-sm-2 col-form-label">Primary Contact</label>
                      <div class="col-sm-3">
                    <select name="salutaion" class="form-control">
                        <option value="">Salutaion</option>
                        <?php $a = array("Mr","Mrs","Miss"); 
                        foreach ($a as $value) {
                        ?>
                        <option value="<?=$value?>" <?=($getcustomer[0]->salutaion==$value) ? 'selected' : '' ;?>><?=$value?></option>
                      <?php } ?> 
                        </select>
                      </div>
                      <div class="col-sm-3">
                  <input type="text" class="form-control" value="<?=$getcustomer[0]->first_name?>" name="first_name" placeholder="First Name">
                      </div>
                      <div class="col-sm-3">
                    <input type="text" class="form-control" value="<?=$getcustomer[0]->last_name?>" name="last_name"  placeholder="Last Name">
                      </div>
                    </div>


                    <div class="form-group row  ">
                      <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                      <div class="col-sm-9">
                    <input type="text"  name="company_name" value="<?=$getcustomer[0]->company_name?>" class="form-control" >
                      </div>
                    </div>

                    <div class="form-group row  ">
                      <label for="email" class="col-sm-2 col-form-label">Cutomer Email</label>
                      <div class="col-sm-9">
                    <input type="text" name="email" value="<?=$getcustomer[0]->customer_email?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row  ">
                      <label for="office_number" class="col-sm-2 col-form-label">Customer Phone</label>
                      <div class="col-sm-4">
                  <input type="text" name="office_number" value="<?=$getcustomer[0]->office_number?>" class="form-control" placeholder="Work Phone">
                      </div>
                      <div class="col-sm-4">
                    <input type="text" name="mobile_number" value="<?=$getcustomer[0]->mobile_number?>" class="form-control"  placeholder="Moblie">
                      </div>

                     
                    </div>

                    <div class="form-group row  ">
                      <label for="website" class="col-sm-2 col-form-label">Website</label>
                      <div class="col-sm-9">
                    <input type="text" name="website" value="<?=$getcustomer[0]->website?>" class="form-control">
                      </div>
                    </div>

                      <div class="form-group row  ">
                        <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                          <div class="col-sm-8">
                        <select name="currency" class="form-control">
                              <option value="">Choose Currency</option>
                              <?php foreach ($Currency as $value) { ?>
                              <option value="<?=$value->currency?>" <?=($getcustomer[0]->currency == $value->currency) ? 'selected' : '' ;?> ><?=$value->currency?></option>
                              <?php } ?>
                            </select>
                          </div> 
                        </div>

                    <div class="bill-add-title">
                          <h4>Billing Address</h4>
                        </div>
                      
                     <!--    <div class="form-group row  ">
                        <label for="Attention" class="col-sm-2 col-form-label">Attention</label>
                          <div class="col-sm-8">
                        <input type="text" name="attention" value="<?=$getcustomer[0]->attention?>" class="form-control">
                          </div> 
                        </div> -->
                        <div class="form-group row  ">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                          <div class="col-sm-8">
                        <select name = 'country'class="form-control">
                              <option value="">Select</option>
                          <?php foreach ($getCountry as $key => $value) { ?>
                              <option value='<?=$value?>' <?=($getcustomer[0]->country == $value) ? 'selected' : '' ;?> ><?=$value?></option>
                          <?php } ?>
                              <!-- <option>USA</option>
                              <option>China</option> -->
                            </select>
                          </div> 
                        </div>
                        <div class="form-group row  ">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-8">
                        <textarea class="from-control"  style="overflow:auto !important" name="address1" placeholder="Street 1"><?=$getcustomer[0]->address?></textarea>
                          </div> 
                        </div>
                       <!--  <div class="form-group row  ">
                        <div class="offset-sm-2 col-sm-8">
                        <textarea name="address2" class="text-from-control" style="overflow:auto !important" placeholder="Street 2"></textarea>
                          </div> 
                        </div> -->

                        <div class="form-group row  ">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                          <div class="col-sm-4">
                        <input type="text" name="city" value="<?=$getcustomer[0]->city?>" class="form-control">
                          </div> 
                        
                        
                        <label for="state" class="col-sm-1 col-form-label">State</label>
                          <div class="col-sm-4">
                        <input type="text" name="state" value="<?=$getcustomer[0]->state?>" class="form-control">
                          </div> 
                        </div>
                          <div class="form-group row  ">
                        <label for="zip" class="col-sm-2 col-form-label">Zip Code</label>
                          <div class="col-sm-4">
                        <input type="text" name="zip_code" value="<?=$getcustomer[0]->zip_code?>" class="form-control">
                          </div> 
                        
                        
                       <!--  <label for="phone" class="col-sm-1 col-form-label">Phone</label>
                          <div class="col-sm-4">
                        <input type="text" name="phone" value="<?=$getcustomer[0]->phone?>" class="form-control">
                          </div>  -->
                          <label for="fax" class="col-sm-1 col-form-label">Fax</label>
                          <div class="col-sm-4">
                        <input type="text" name="fax" class="form-control" value="<?=$getcustomer[0]->fax_no?>">
                          </div> 
                        </div>

                           <div class="form-group row  ">
                      <!--   <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                          <div class="col-sm-4">
                        <input type="text" name="fax" value="<?=$getcustomer[0]->fax_no?>" class="form-control">
                          </div>  -->
                        </div>
                        
                      <div class="bill-add-title">
                          <h4>Remark</h4>
                      </div>

                       <div class="remark w-100">
                          <div class="form-group">
                              <label>Textarea <span class="color-grey">(For Internal Use)</span></label>
                              <textarea name="remark" class="form-control"><?=$getcustomer[0]->textarea?></textarea>
                          </div>
                        </div> 
        <div class="button-group">
           <!-- <button type="button" id="" class="btn btn-light">Save as Draft</button>
           <div class="dropup" style="display: inline-block;"> -->
          <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-new">
           Update
        </button>
         <a href="<?=base_url()?>users/customer" style="display: inline-block;" class="btn btn-new">Cancle</a>
        </div>
           <!-- <button type="button" class="btn btn-danger">Save and Send</button> -->
        </div>
              
        </form>
    </div>
  </div>
</section>
