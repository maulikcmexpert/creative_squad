<section class="background-blue-grey ">
  <div class="container">
          <form id="InvoiceForm" class="basic-form" method="post" action="<?=$FormAction?>">
          <div class="invoice-title border-grey">
            <h3><span><i class="far fa-file-alt"></i></span> New Invoice</h3>
          </div>
            <div class="p-50">
           
                  <div class="form-group row  ">
                  <label for="customer_id" class="col-sm-2 col-form-label customer_id">Customer Name</label>
                  <div class="col-sm-10">
                    <select name="customer_id" id="select2" class="form-control select2">
                        <option value ="" selected>Select customer</option>
                        <?php foreach ($getAllCustomer as $value) { ?> 
                        <option value="<?=$value->id?>" ><?=$value->salutaion. '. ' . $value->first_name?></option>
                        <?php } ?>
                         <!-- <a class="new-cust" href="<?=base_url()?>users/customer/add">
                          <span>+</span> New Customer</a> -->
                    </select>
                      <div class="wrapper" id="wrp" style="display: none;">
                       <a href="<?=base_url()?>users/customer/add" id="type" class="font-weight-300" >+ Add New Customer</a>
                  </div>
                          <label id="select2-error" class="error" for="select2"></label>
                </div>
            </div>  
                  <input type="hidden"  id="url" value="<?=base_url()?>">
                  <input type="hidden" name="sub_total" id="sub_total" value="">
                  <input type="hidden" name="discount_price" id="discount_price" value="">
                  <input type="hidden" name="final_total" id="final_total" value="">
                  <input type="hidden" name="after_discount" id="after_discount" value="">

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Invoice<!-- <sup>*</sup> --></label>
                      <div class="col-sm-10">
                      <div class="d-flex js-center">
                        <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="INV-000002" value="<?=@$invoice_number?>"><span><a href="javascript:" id="invoice"><i class="fas fa-cog"></i></a></span>
                      </div>
                      <label id="invoice_no-error" class="error" for="invoice_no"></label>
                      </div>
                    </div>
                    <div class="">
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Invoice Date<!-- <sup>*</sup> --></label>
                      <div class="col-sm-3">
                      <div class="invoicedate">
                        <input type="date" name="invoice_date" class="form-control" id="invoice_date" placeholder="05/05/2020">
                        
                      </div>
                      </div>
                        <div class="col-sm-1">
                        <p class="terms label">Terms</p>
                      </div>
                      <div class="col-sm-2">
                         <input type="text" class="form-control" name="terms" id="inputPassword3" placeholder="Due on Receipt" autocomplete="off">
                      </div>
                          <div class="col-sm-1">
                        <p class="due-date label">DueDate</p>
                      </div>
                      <div class="col-sm-3">
                        <input type="date"  class="form-control due-date-border" name="due_date" id="due_date" placeholder="05/05/2020">
                      </div>
                    </div>
                    </div>
            
                    <div class="subject-wrap">
                   <div class="form-group row  ">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Subject</label>
                          <div class="col-sm-10">
                        <textarea class="text-from-control" name="subject" style="overflow:auto !important" placeholder="Let Your customer know what this Invoice is for"></textarea>
                          </div> 
                        </div>
                    </div>
            

           <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th class="itm-detl">Project Selection</th>
        <th class="itm-detl">Item Details</th>
        <th class="qaunt-th width-100">Hours</th>
        <th class="qaunt-th width-100">Rate</th>
        <th class="qaunt-th width-100">Amount</th>
        <th class="blank-th"></th>
      </tr>
    </thead>
    <tbody id="appended">
      <tr>
        <td>
          <input type="text" id="project" name="project_selection[]" class="form-control select-item project" autocomplete="off" placeholder="Type or click to select Project"  style="border: none;" /><div style="color: red"></div>
        </td>
        <td>
          <input type="text" id="itemdetails" name="item_details[]" class="form-control select-item description" autocomplete="off" placeholder="Type or click to select Item"  style="border: none;" /><div style="color: red"></div>
        </td>
        <td>
          <input type="text" name="hour[]" class="form-control qaunt-td hour" placeholder="0.00"/><div style="color:red"></div>
        </td>
        <td>
          <input type="text" name="rate[]" class="form-control qaunt-td rate" placeholder="0.00" /><div style="color:red"></div>
        </td>
        <td class="total-amt total" >0.00</td>
        <input type="hidden" name="amount[]">
        <td class="total-amt"></td>
      </tr>
    </tbody>
  </table>

    <div class="row">
    <div class="col-lg-12 col-md-12 ">
      
        <div class="form-group row">
                <div class="col-sm-12">
                  <a href="javascript:" id="addhtml" class="add-another">Add Another Line <span>+</span></a>
                <!--     <select class="form-control another-line">
                       <option>Add Another Line</option>
                       <option>Option 2</option>
                       <option>Option 3</option>
                    </select> -->
                </div>
             </div>

            <!--  <div class="unbiled-items">
              <p>Include Unbiled Items</p>
              <a href="#">1 Unbiled Project</a>
             </div> -->

             <div class="customer-text-area">
              <div class="form-group">
                  <label class="">Customer Notes</label>
                    <textarea class="from-control" name="customer_notes" style="overflow:auto !important;width: 100%;" placeholder="Thanks for your business."></textarea>
                    <p class="below-texta color-grey">Will be display on the invoice</p>
              </div>
            </div>
      
    </div>
      <div class="offset-lg-6 col-lg-6 col-md-12">
        <div class="bg-grey sub-total-table">
           <table class="table table-borderless table-responsive">
    <tbody>
      <tr>
        <td class="wd-170">Subtotal</td>
        <td class="wd-170"></td>
        <td class="text-right" id="subtotal">0.00</td>
      </tr>
      <tr>
        <td class="wd-170">Discount</td>
        <td class="wd-170">
          <div class="d-flex">
            <input type="text" name="dicount_rate" id="dicount_rate" class="dis-text border-grey">
            <select class="bg-grey border-grey" id="discount_type" name="discount_type">
              <option value="doller">$</option>
              <option value="percent">%</option>
            </select>
          </div>
        </td>
        <td class="text-right" id="total_discount">0.00</td>
      </tr>
      <tr>
        <td class="wd-170"><input type="text" name="adjustment" placeholder="Adjusment" class="adjustment"></td>
        <td class="wd-170">
          <div class="d-flex">
            <input type="text"  id="adjustment_price" name="adjustment_price" class="adj-sub border-grey">
            <a href="#"><span class="qust-help">?</span></a>
          </div>
        </td>
        <td class="text-right " id="adjust_doller">0.00</td>
      </tr>
      <tr>
        <td class="text-bold h-25">Total($)</td>
        <td class="h-25"></td>
        <td class="text-bold text-right h-25" id="grand_total" >0.00</td>
      </tr>
    </tbody>
  </table>
        </div>
      </div>
    </div>
    
   <div class="terms">
        
          <div class="form-group">
                  <label class="">Terms & Conditions</label>
                    <textarea class="from-control" name="term_condition" style="overflow:auto !important;width: 100%;" placeholder="Enter the terms and Conditions of your business to be displayed in your transaction"></textarea>
                    <p class="below-texta color-grey">Will be display on the invoice</p>
            </div>
          
          <div class="email-to">
            <div class="form-group" id="addNewEmail">
                      <label for="client_email" class="d-block label-2">Email to<a href="#"><i class="fas fa-info-circle"></i></a></label>
                      <div class="row">
                        <div class="col-lg-4 col-md-4">
                          <input type="text" name="client_email[]" class="form-control client_email" id="client_email" placeholder=" Enter Email To"><div style="color:red"></div>
                        </div>
                      </div>
            </div>
              <a href="javascript:" id="addNew" class="add-another"> Add New <span>+</span></a>
            </div>
       </div>         
   
        
      
        <div class="button-group">
           <button type="submit" id="btnSubmit"  name="SaveAs"  value="SaveAsDraft" class="btn btn-new">Save as Draft</button>
           <div class="dropup" style="display: inline-block;">
          <button type="submit"  name="SaveAs" value="SaveNSend" class="btn btn-new">
           Save and Send
        </button>
          <!-- <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div> -->
        </div>
           <!-- <button type="button" class="btn btn-danger">Save and Send</button> -->
         <a href="<?=base_url()?>users/invoice" class="btn btn-new" >Cancle</a>
        </div>
              
        
  </div>
  </form>
    </div>
  </section>

</div>
</div>
</div>
</section>





<!-- Modal 1-->
  <form  id="formModel" method="post" data-url="<?=base_url()?>users/invoice/numberGenerator" action="<?=base_url()?>users/invoice/InvoiceNumber">

<div class="modal fade first-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Invoice Number</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <p>Your invoice number is set to auto-generate mode to save your time.Are you sure about
        changing this setting ?</p>
        <div class="radio-select">
        <div class="row">
          <div class="col-md-7">
            <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input rdo"  type="radio" name="rdo" id="exampleRadios1" autocomplete="off" value="auto_generate">
                        <label class="form-check-label" for="exampleRadios1">
                          Continue  auto-generating invoice numbers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input rdo" type="radio" name="rdo" id="exampleRadios2"  value="manual">
                        <label class="form-check-label" for="exampleRadios2">
                          I will add them manually each time
                        </label>
                      </div>
                    </div>
                  
          </div>
          <div class="col-md-5">
          <div class="row">
          
            <div class="form-group col-md-4">
                      <label for="prfx">prefix</label>
                      <input type="text" id="prfx" class="form-control" name="prfx" placeholder="INV"  style="padding: 0px 5px 0px 5px">
                    </div>
               <div class="form-group col-md-8">
                      <label for="number">Next Number</label>
                      <input type="text" id="number" class="form-control" name="number" 
                       placeholder="000002"  style="padding: 0px 5px 0px 5px ;">
                    </div>     
                   
          </div>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
         <span class="error"></span>
         <button type="submit" id="btnsubmit" data-dismiss="modal"  class="btn btn-danger">Save</button>
         <button type="button" class="btn btn-light" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>
  </form>


<!-- Modal 2-->
<div class="modal fade first-modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Invoice Number</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <p>You have selected manual innvoice numbering . Do you want us to auto generate it for you ?</p>
        <div class="radio-select">
        <div class="row">
          <div class="col-md-12">
         
            <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked="">
                        <label class="form-check-label" for="exampleRadios1">
                          Continue  auto-generating invoice numbers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" checked="">
                        <label class="form-check-label" for="exampleRadios2">
                          I will add them manually each time
                        </label>
                      </div>
                    </div>
                  
          </div>
          
        </div>
        </div>
      </div>
      <div class="modal-footer">
         <span class="error"></span>
         <button type="button" id="submit" class="btn btn-danger">Save</button>
         <button type="button" class="btn btn-light" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>
