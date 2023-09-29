  <section class="new-customer background-blue-grey">
    <?php if($this->session->flashdata('myMessage') != ''){
            echo $this->session->flashdata('myMessage');
          } ?>
  <div class="container">
    <div class="row">
      <form id="AddCustomerForm" method="POST" action="<?=$FormAction?>" class="new-cust-form basic-form">
        <div class="invoice-title border-grey">
            <h3><span><i class="far fa-file-alt"></i></span> New Customer</h3>
          </div>
          <div class="form-group row p-50">
                      <label for="primary_contact" class="col-sm-2 col-form-label">Primary Contact</label>
                      <div class="col-sm-3">
                    <select name="salutaion" class="form-control">
                        <option value=""  >Salutaion</option>
                        <option value="Mr">Mr</option>
                        <option  value="Mrs">Mrs</option>
                        <option  value="Miss">Miss</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                  <input type="text" class="form-control" name="first_name" placeholder="First Name" >
                      </div>
                      <div class="col-sm-3">
                    <input type="text" class="form-control" name="last_name"  placeholder="Last Name">
                      </div>
                    </div>


                    <div class="form-group row  ">
                      <label for="company_name" class="col-sm-2 col-form-label">Company Name</label>
                      <div class="col-sm-9">
                    <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                      </div>
                    </div>

                    <div class="form-group row  ">
                      <label for="email" class="col-sm-2 col-form-label">Cutomer Email</label>
                      <div class="col-sm-9">
                    <input type="text" name="email" class="form-control" placeholder="Cutomer Email" >
                      </div>
                    </div>

                    <div class="form-group row  ">
                      <label for="office_number" class="col-sm-2 col-form-label">Customer Phone</label>
                      <div class="col-sm-4">
                  <input type="text" name="office_number" class="form-control" placeholder="Work Phone">
                      </div>
                      <div class="col-sm-4">
                    <input type="text" name="mobile_number" class="form-control"  placeholder="Moblie">
                      </div>

                     
                    </div>

                    <div class="form-group row  ">
                      <label for="website" class="col-sm-2 col-form-label">Website</label>
                      <div class="col-sm-9">
                    <input type="text" name="website" class="form-control" placeholder="Website" >
                      </div>
                    </div>

                      <div class="form-group row  ">
                        <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                          <div class="col-sm-9">
                        <select name="currency" class="form-control">
                              <option value="">Choose Currency</option>
                              <?php foreach ($Currency as $value) { ?>
                              <option value="<?=$value->currency?>"><?=$value->currency?></option>
                              <?php } ?>
                            </select>
                          </div> 
                        </div>

                    <div class="bill-add-title">
                          <h4>Billing Address</h4>
                        </div>
                      
                       <!--  <div class="form-group row  ">
                        <label for="Attention" class="col-sm-2 col-form-label">Attention</label>
                          <div class="col-sm-8">
                        <input type="text" name="attention" class="form-control">
                          </div> 
                        </div> -->
                        <div class="form-group row  ">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                          <div class="col-sm-9">
                        <select name = 'country'class="form-control">
                              <option value="">Select</option>
                          <?php foreach ($getCountry as $key => $value) { ?>
                              <option value='<?=$value?>'><?=$value?></option>
                          <?php } ?>
                              <!-- <option>USA</option>
                              <option>China</option> -->
                            </select>
                          </div> 
                        </div>
                        <div class="form-group row  ">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-9">
                        <textarea class="from-control" style="overflow:auto !important" name="address1" placeholder="Street 1"></textarea>
                          </div> 
                        </div>
                        <div class="form-group row  ">
                       <!--  <div class="offset-sm-2 col-sm-8">
                        <textarea name="address2" class="text-from-control" style="overflow:auto !important" placeholder="Street 2"></textarea>
                          </div>  -->
                        </div>

                        <div class="form-group row  ">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                          <div class="col-sm-4">
                        <input type="text" name="city" class="form-control" placeholder="City" >
                          </div> 
                        
                        
                        <label for="state" class="col-sm-1 col-form-label">State</label>
                          <div class="col-sm-4">
                        <input type="text" name="state" class="form-control" placeholder="state" >
                          </div> 
                        </div>
                          <div class="form-group row  ">
                        <label for="zip" class="col-sm-2 col-form-label">Zip Code</label>
                          <div class="col-sm-4">
                        <input type="text" name="zip_code" class="form-control" placeholder="Zipcode" >
                          </div> 
                        
                        
                        <label for="phone" class="col-sm-1 col-form-label">Fax</label>
                          <div class="col-sm-4">
                        <input type="text" name="fax" class="form-control" placeholder="Fax" >
                          </div> 
                        </div>

                       <!--  <div class="form-group row ">
                        <label for="fax" class="col-sm-2 col-form-label">Fax</label>
                          <div class="col-sm-4">
                        <input type="text" name="fax" class="form-control" placeholder="Fax" >
                          </div> 
                        </div> -->
                        
                      <div class="bill-add-title">
                          <h4>Remark</h4>
                      </div>

                       <div class="remark w-100">
                          <div class="form-group">
                              <label>Remark &nbsp<span class="color-grey">(For Internal Use)</span></label>
                              <textarea name="remark" class="form-control"></textarea>
                          </div>
                        </div> 
        <div class="button-group">
           <!-- <button type="button" id="" class="btn btn-light">Save as Draft</button>
           <div class="dropup" style="display: inline-block;"> -->
          <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-new">
           Save 
        </button>
         <a href="<?=base_url()?>users/customer" style="display: inline-block;" class="btn btn-new">Cancle</a>
        </div>
           <!-- <button type="button" class="btn btn-danger">Save and Send</button> -->
        </div>
              
        </form>
    </div>
  </div>
</section>
