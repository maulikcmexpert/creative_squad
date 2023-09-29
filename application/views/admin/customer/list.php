    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
      <?php if($this->session->flashdata('myMessage') != ''){
        echo $this->session->flashdata('myMessage');
      } ?>
        <input type="hidden" name="" id="base_url" value="<?=base_url()?>">
              <div class="card">
                <div class="card-header title-search">
                  <h4>Customer</h4>
              <form class="form-inline">
                <div class="search-element">
                  <input class="form-control" type="search" id="search" placeholder="Search" aria-label="Search" data-width="200" style="width: 200px;">
                  <button class="btn" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
                </div>
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                        <th class="text-center">#</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>mobile</th>
                        <th>company</th>
                        <th>Action</th>
                      </tr>
                    </tbody>
                    <tbody id="seachfield">
                        <?php
                        $i = 1; 
                        foreach ($getCustomerData as $value) { ?>
                      <tr>
                        <td class="p-0 text-center">
                        <!--   <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="chk[]" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1"> 
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                          </div> -->
                             <div class="form-check">
                              <input class="form-check-input cus_id" name="cus_id" type="checkbox" value="<?=$value->id?>" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                              </label>
                            </div>
                        </td>
                        <td><?=$value->salutaion .'. '.$value->first_name?></td>
                        <td><?=$value->customer_email?></td>
                        <td><?=$value->mobile_number?></td>
                        <td><?=$value->company_name?></td>
                        <td><a  href="<?=base_url().'users/customer/edit/'.$this->utility->safe_b64encode($value->id)?>" class="btn btn-danger btn-action"  data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"  style="color: white"></i></a> 
                        <button class="btn btn-danger btn-action delete" id="delete_id" data-toggle="tooltip"   data-original-title="Delete" value="<?=$this->utility->safe_b64encode($value->id)?>" ><i class="fas fa-trash" style="color: white"></i></button></td>
                      </tr> 
                       <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
           
              </div>
            </div>

           

           
    </div>
