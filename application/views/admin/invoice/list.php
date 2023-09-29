    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
          <?php if($this->session->flashdata('myMessage') != ''){
            echo $this->session->flashdata('myMessage');
          } ?>
            <input type="hidden" name="" id="base_url" value="<?=base_url()?>">
              <div class="card">
                <div class="card-header title-search">
                  <h4>Invoice</h4>
                  <form class="form-inline">
                <div class="search-element">
                  <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search" data-width="200" style="width: 200px;">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
                </div>
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tbody><tr>
                        <th class="text-center">#</th>
                        <th>Customer</th>
                        <th>Invoice Number</th>
                        <th>Due Date</th>
                        <th>Terms</th>
                        <th>Action</th>
                        <th>Genarate</th>
                      </tr>
                    </tbody>
                    <tbody id="searchInvoice">
                        <?php foreach ($getInvoice as $value) { ?>
                      <tr>
                        <td class="p-0 text-center">
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1"> <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                     
                        <td class="font-weight-600"><?=$value->salutaion.'. '.$value->first_name?></td>
                        <td><?=$value->invoice_no?></td>
                        <td><?=$value->due_date?></td>
                        <td><?=$value->terms?></td>
                        <td><a  href="<?=base_url().'users/invoice/edit/'.$this->utility->safe_b64encode($value->id)?>" class="btn btn-danger btn-action"  data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"  style="color: white"></i></a> 
                        <button class="btn btn-danger btn-action delete" data-toggle="tooltip"   data-original-title="Delete" value="<?=$this->utility->safe_b64encode($value->id)?>" ><i class="fas fa-trash" style="color: white"></i></button></td>
                        <td><a  href="<?=base_url().'users/invoice/genarate/'.$this->utility->safe_b64encode($value->id)?>" class="btn btn-light" style="background:white"  data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-file-pdf"  style="color: red"></i></a></td>
                      </tr>
                        <?php } ?>
                    </tbody></table>
                  </div>
                </div>
       
              </div>
            </div>
           

           
    </div>
  