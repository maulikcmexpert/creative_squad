<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?=base_url()?>public/users/invoice_temp/assets/images/favicon.png" rel="icon" />
<title>Invoice Magnement</title>

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<style type="text/css">
    .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    
    padding-right: 15px;
    padding-left: 15px;
}   
body {
  background: #e7e9ed !important;
  color: #535b61 !important;
  font-family: "Poppins", sans-serif !important;
  font-size: 14px !important; 
  line-height: 22px;
}

form {
  padding: 0;
  margin: 0;
  display: inline;
}

img {
  vertical-align: inherit;
}
h1, h2, h3, h4, h5, h6 {
  color: #0c2f54;
  font-family: "Poppins", sans-serif !important;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    
}
.row1 {
    
    justify-content: space-between !important;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
}
.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
}
address {
    margin-bottom: 1rem;
    font-style: normal;
    line-height: inherit;
}
strong {
    font-weight: bolder;
}
.align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
}
.text-right {
    text-align: right!important;
}
.text-center {
    text-align: center!important;
}
.pl-2, .px-2 {
    padding-left: .5rem!important;
}
.pl-2, .px-2 {
    padding-left: .5rem!important;
}

.pr-2, .px-2 {
    padding-right: .5rem!important;
}
.pb-0, .py-0 {
    padding-bottom: 0!important;
}
.pt-0, .py-0 {
    padding-top: 0!important;
}
.pl-2, .px-2 {
    padding-left: .5rem!important;
}
.pr-2, .px-2 {
    padding-right: .5rem!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}
.mt-4, .my-4 {
    margin-top: 1.5rem!important;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529 !important;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.table-bordered {
    border: 1px solid #dee2e6;
}
.border-0 {
    border: 0!important;
}
.col-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
}
.btn-group, .btn-group-vertical {
    position: relative;
    display: -ms-inline-flexbox;
    display: inline-flex;
    vertical-align: middle;
}
.btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}
.btn-group-sm>.btn, .btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
.text-black-50 {
    color: rgba(0,0,0,.5)!important;
}
.border {
    border: 1px solid #dee2e6!important;
}
.btn-light {
    color: #212529;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-decoration: none;
}
.table {
  color: #535b61;
}

.table-hover tbody tr:hover {
  background-color: #f6f7f8;
}

  .invoice-container {
  margin: 15px auto;
  padding: 70px !important;
  max-width: 850px;
  background-color: #fff;
  border: 1px solid #ccc;
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
  -o-border-radius: 6px;
  border-radius: 6px;
}

.bg-light-2 {
  background-color: #f8f8fa !important;
}

.width-10{
width: 10% !important;
}
.width-40{
width: 40% !important;
}
@media (max-width: 767px) {
  .invoice-container {
    padding: 35px 20px 70px 20px !important;
    margin-top: 0px;
    border: none;
    border-radius: 0px;
  }
}
.flex-p{
    display: flex !important;
    justify-content: space-between !important; 
}

</style>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/users/invoice_temp/assets/bootstrap.min.css"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
<!--   <header>
  <div class="row row1 align-items-center" style="justify-content: space-between;">
    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
      <img id="logo" src="<?=base_url()?>public/users/invoice_temp/assets/images/logo.png" title="cme" alt="cme" />
    </div>
    <div class="col-sm-5 text-center text-sm-right">
      <h4 class="text-7 mb-0" style="font-size:1.5rem;font-weight: normal;">INVOICE</h4>
    </div>
  </div>
  <hr>
  </header> -->
  <table style="width: 100%;">
      <tbody>
          <tr>
              <td>
                <img id="logo" src="<?=base_url()?>public/users/invoice_temp/assets/images/logo.png" title="cme" alt="cme" />
              </td>
              <td style="text-align: right; color: #0c2f54;font-weight: bold;">INVOICE</td>
          </tr>
      </tbody>
  </table>
  <hr style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">
  <!-- Main Content -->
  <main>
    <table style="width: 100%;margin-top: 10px;">
      <tbody>
          <tr>
              <td><strong>Date:</strong><?=$emailData['getEditInvoice'][0]->invoice_date?></td>
              <td style="text-align: right;"><strong>Invoice No:</strong><?=$emailData['getEditInvoice'][0]->invoice_no?></td>
          </tr>
      </tbody>
  </table>
  <hr style="margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0,0,0,.1);">

  <table style="width: 100%;margin-top: 10px;">
      <tbody>
          <tr>
              <td><strong>Pay To:</strong>
      <address>
      CMExpertise Pvt Ltd<br />
      D/304. Ganesh Maredian<br />
      Ahmedabad,Gujarat<br />
      cmexpertise@gmail.com
      </address></td>
    <td style="text-align: right;"><strong>Invoiced To:</strong>
       <address>
       <?=$emailData['getEditInvoice']['customerDetails'][0]->first_name .' '.$emailData['getEditInvoice']['customerDetails'][0]->last_name ?><br/>
      <?=$emailData['getEditInvoice']['customerDetails'][0]->company_name?><br/>
      <?=$emailData['getEditInvoice']['customerDetails'][0]->customer_email?><br/>
      <!-- United Ki --> 
       <?=@$emailData['to'];?>
      </address>
    </td>
          </tr>
      </tbody>
  </table>

  <div class="card">
  
      <table class="table mb-0">
        <thead>
          <tr>
            <td class="col-1 width-10 border-0"><strong>Project</strong></td>
			     <td class="col-8 width-40 border-0"><strong>Description</strong></td>
          <td class="col-1 width-10 text-center border-0"><strong>Rate</strong></td>
			   <td class="col-1 width-10 text-center border-0"><strong>Hour</strong></td>
         <td class="col-1 width-10 text-right border-0"><strong>Amount</strong></td>
          </tr>
        </thead>    
          <tbody>

             <?php foreach($emailData['getEditInvoice']['invoiceProject'] as $key => $value) { ?> 

            <tr>
              <td class="col-1 width-10 border-0"><?=$value->project_selection?></td>
              <td class="col-8 width-40  text-1 border-0"><?=$value->item_details?></td>
              <td class="col-1 width-10 text-center border-0"><?=$value->hours?></td>
      			  <td class="col-1 width-10 text-center border-0"><?=$value->rate?></td>
      			  <td class="col-1 width-10 text-right border-0"><?=$value->amount?></td>
            </tr>
           <?php  } ?> 
 
			
             <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
              <td class="bg-light-2 text-right"><?=$emailData['getEditInvoice'][0]->sub_total?></td>
            </tr>
            
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Discount  :<?=($emailData['getEditInvoice'][0]->discount_type =='percent') ? '%' :'$'?></strong></td>
              <td class="bg-light-2 text-right"><?=$emailData['getEditInvoice'][0]->discount ?> </td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Adjusment</strong></td>
              <td class="bg-light-2 text-right"><?=$emailData['getEditInvoice'][0]->adjusment_price ?></td>
            </tr>
            <tr>
              <td colspan="4" class="bg-light-2 text-right"><strong>Total:</strong></td>
              <td class="bg-light-2 text-right"><?=$emailData['getEditInvoice'][0]->total ?></td>
            </tr>
          </tbody> 
        </table>


  </div>
  <div class="table-responsive d-print-none mt-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-center"><strong>Transaction Date</strong></td>
            <td class="text-center"><strong>Gateway</strong></td>
            <td class="text-center"><strong>Transaction ID</strong></td>
            <td class="text-center"><strong>Amount</strong></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">01/07/2020</td>
            <td class="text-center">Credit Card</td>
            <td class="text-center">3912912704</td>
            <td class="text-center"><?=$emailData['getEditInvoice'][0]->total ?> USD</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
  <!-- Footer -->
  <footer class="text-center">
  <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
  <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50"><i class="fa fa-print"></i> Print</a> <a href="#" class="btn btn-light border text-black-50"><i class="fa fa-download"></i> Download</a> </div>
  </footer>
</div>
</body>

</html>