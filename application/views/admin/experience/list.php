<div class="row">
<div class="col-12 col-sm-12 col-lg-12 text-right mb-3">
	<a class="btn btn-primary" href="<?=base_url().'admin/experience/add'?>">Add</a>
</div>
</div>
    <form action="<?=base_url().'admin/experience/'?>" method="post">
  <div class="row mb-5">  
    <div class="col-sm-3">
      <select name="profession_id" class="form-control" id="profession_id">
        <option value="">Select Profession</option>
        <?php foreach ($getProfession as $key => $value) { ?>
          <option value="<?=$value->id?>" <?=($profession_id == $value->id) ? 'selected' : '' ?>><?=$value->name?></option>
        <?php } ?>
      </select>
    </div>
      <div class="col-sm-3">
        <select name="stack_id" class="form-control" id="stack_html">
          <option value="">Select Stack</option>
          <?php foreach ($stack as $key => $value): ?>
              <option value="<?=$value->id?>" <?=($value->id==$stack_id) ? 'selected' : '' ?>><?=$value->name?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-sm-3">
        <select name="tech_id" class="form-control" id="tech_html">
          <option value="">Select tech</option>
          <?php foreach ($tech as $key => $value): ?>
              <option value="<?=$value->id?>" <?=($value->id==$tech_id) ? 'selected' : '' ?>><?=$value->name?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-sm-3">
        <input class="btn btn-primary" type="submit" name="btnSubmit" value="Search">
        <a class="btn btn-danger" href="<?=base_url().'admin/experience'?>">Reset</a>
      </div>
  
</div>
    </form>
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
      <?php if($this->session->flashdata('myMessage') != ''){
        echo $this->session->flashdata('myMessage');
      } ?>
        <input type="hidden" name="" id="base_url" value="<?=base_url()?>">
              <div class="card">
                <div class="card-header title-search">
                  <h4>Experience</h4>
              <form class="form-inline">
                <!-- <div class="search-element"> -->
                 <!--  <input class="form-control" type="search" id="search" placeholder="Search" aria-label="Search" data-width="200" style="width: 200px;">
                  <button class="btn" type="button">
                    <i class="fas fa-search"></i>
                  </button> -->
                <!-- </div> -->
              </form>
                </div>
                <div class="card-body">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped" id="profession">
                      <thead>
                        <tr>
                          <th>Profession name</th>
                          <th>Stack name</th>
                          <th>Experience level</th>
                          <th>Tech name</th>
                          <th>Type</th>
                          <th>Min amount</th>
                          <th>Max amount</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php
                        foreach ($getPayable as $value) { ?>
                      <tr>

                        <td><?=$value->profession_name?></td>
                        <td><?=$value->stack_name?></td>
                        <td><?=$value->experience_name?></td>
                        <td><?=$value->tech_name?></td>
                        <td><?=$value->type?></td>
                        <td><?=$value->min?></td>
                        <td><?=$value->max?></td>
                        <td>
                          <a  href="<?=base_url().'admin/experience/edit/'.$this->utility->safe_b64encode($value->id)?>" class="btn btn-danger btn-action"  data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"  style="color: white"></i></a> 
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
