var INVOICE = function () {
    var url = $('#url').val();

  $(document).ready(function(){
        $('.alert').fadeOut(5000);
    });
$(document).ready(function() {
    $('.select2').select2();

    var flg = 0;
    $('#select2').on("select2:open", function () {
      flg++;
      if (flg == 1) {
        $this_html = jQuery('#wrp').html();
        $(".select2-results").append("<div class='select2-results__option'>" + 
      $this_html + "</div>");
      }
    });


});

 $(document).ready(function () {
    $('#customer_notes').html('Lorem ipsum dolor sit amet, ante commodo, nunc enim ac dui felis, proin mollis ac. A nostra dolor, mi et nullam suspendisse turpis, enim facilisis suspendisse vitae. Sociis class, pellentesque in, faucibus ac dolor, quam fringilla. Ut wisi sapien aenean ligula est, nam fames justo leo dolor orci, id id massa egestas eu sed, leo a quis ut ut, ornare et nibh suspendisse pulvinar quisque. A platea, ac morbi sed suscipit sit, viverra magna eget at lorem tempor ');
});
 


    $(document).on('click','#addhtml',function(){
        $('#appended').append('<tr><td><input type="text" id="project" name="project_selection[]" class="form-control select-item project" autocomplete="off" placeholder="Type or click to select Project"  style="border: none;" /><div style="color:red"></div></td><td><input type="text" id="itemdetails" name="item_details[]" class="form-control select-item description" autocomplete="off" placeholder="Type or click to select Item"  style="border: none;" /><div style="color:red"></div></td><td><input type="text" name="hour[]" class="form-control qaunt-td hour" placeholder="0.00"/><div style="color:red"></div></td><td><input type="text" name="rate[]" class="form-control qaunt-td rate" placeholder="0.00" /><div style="color:red"></div></td><td class="total-amt total" >0.00</td><input type="hidden" name="amount[]"><td class="total-amt" ><span class="minus" style=" display: flex;justify-content: center;align-items: center;color: red;border:1px solid red;margin-left: auto;border-radius: 100%;width: 25px;height: 25px;" id="remove"><i class="fas fa-minus"></i></span></td></tr>');   
     })

  //  invoice  number generator
    $('#invoice').click(function(){
    //open bootsrap modal
    $('#myModal').modal({
       show: true
    });

});

    $(document).on('change','#select2',function(){
      var customer_table_id = $(this).val();
      $.ajax({
          url : url+'users/invoice/cusEmail',
          data:{customer_table_id:customer_table_id},
          method:'post',
          dataType:"json",
          success:function(output){
            $('#client_email').val(output[0].customer_email);
          }
      })

    })
   

    $(document).on('click','#remove',function(){
      $(this).closest('td').parent().remove();
      calculation();
    })

    $(document).on('click','#addNew',function(){
      $('#addNewEmail').append('  <div class="row"><div class="col-lg-4 col-md-4"><input type="text" name="client_email[]" class="form-control client_email" id="client_email" placeholder="Enter Email To"><div style="color:red"></div></div></div>');
    })

     $('#search').on('keyup',function(){
        var search = $(this).val();
        var base_url = $('#base_url').val();
        $.ajax({
            url : base_url+'users/invoice/search',
            data:{search:search},
            method:'post',
            success:function(output){
                $('#searchInvoice').html(output);
            }
        })
    })


   
    $(document).on('focus',".project",function(){

        $(this).each(function(){}) .autocomplete({
            source: url+'users/invoice/searchproject',
        });

   });

   $(document).on('focus',".description",function(){

        $(this).each(function(){}) .autocomplete({
            source: url+'users/invoice/searchitemdetails',
        });

   });

    $(document).ready(function(){
     var first =   $.ajax({
            url : url+'users/invoice/searchfordescription',
            dataType : 'json',
             async: false,
            success:function(output){
            }
        }) .responseText;

       first =JSON.parse(first);
                             
    $(document).on("click",".description", function(){

      var that =  $(this).each(function(){}).autocomplete("search","");
       
        that.autocomplete({
            source: first,
            minLength:0,
            select : function(event, ui){
             if(ui.item && ui.item.value){
              // alert(ui.item.value);  
             }
            }
        });
    });

   });


   $(document).ready(function(){

     var second =   $.ajax({
            url : url+'users/invoice/searchforproject',
            dataType : 'json',
             async: false,
            success:function(output){
            }
        }).responseText;

       second = JSON.parse(second);
                           
    $(document).on("click",".project", function(){
       var that =  $(this).each(function(){}).autocomplete("search","");
        that.autocomplete({
            source: second,
            minLength:0,
            select : function(event, ui){
             if(ui.item && ui.item.value){
              // alert(ui.item.value);
             }
            }
        });
    });
   });


    $(document).ready(function(){
      calculation();
    });

    
    $(document).on('keyup','.hour',function(){

        var h = $(this).val();
        var r = $(this).closest('td').next('td').find('input').val();
        var total = h * r;
        var r = $(this).closest('td').next('td').next('td').html(total.toFixed(2));
        var t = $(this).closest('td').next('td').next('td').next('input').val(total.toFixed(2));
           calculation();
      })

    $(document).on('keyup','.rate',function(){
        var r = $(this).val();
        var h = $(this).closest('td').prev('td').find('input').val();
        var total = h * r;
        var r = $(this).closest('td').next('td').html(total.toFixed(2));
        var t = $(this).closest('td').next('td').next('input').val(total.toFixed(2));
           calculation();
      })

    function calculation(){
        var t = 0;
      $('.total').each(function(){
           t += parseFloat($(this).html());
      })  
           t = parseFloat(t).toFixed(2);
          $('#subtotal').html(t);
          $('#sub_total').val(t);
          var discount_rate = $('#dicount_rate').val();
          var discount_type = $('#discount_type').val();

          if(discount_rate == ''){
              discount_rate = 0;
          }


              if(discount_type == 'doller'){
                var g_total = t - discount_rate
                $('#total_discount').text(parseFloat(discount_rate).toFixed(2)) ;
                $('#discount_price').val(parseFloat(discount_rate).toFixed(2))
              }else{
                   var discount_price =  t * discount_rate/100;
                      g_total    =  t - discount_price;
              $('#total_discount').text(parseFloat(discount_price).toFixed(2));
              $('#discount_price').val(parseFloat(discount_price).toFixed(2))
              }
              $('#after_discount').val(parseFloat(g_total).toFixed(2));
              var adjusment = $('#adjustment_price').val();
              var after_discount = $('#after_discount').val();   
              $('#grand_total').html(parseFloat(after_discount-adjusment).toFixed(2));
              $('#final_total').val(parseFloat(after_discount-adjusment).toFixed(2)); 
    }

    $(document).on('keyup','#adjustment_price',function(){
      var ad = parseFloat($(this).val());
        if(ad != '' && ad >= 0){

        if($.isNumeric(ad)){  
           var tot =$('#sub_total').val();
           var g_total = tot - ad;

            $('#adjust_doller').text(ad.toFixed(2));
            $('#grand_total').html(g_total);
            calculation();
        }else{
          $(this).val('');
        }
      }else{
         $(this).val('');
         $('#adjust_doller').text('0.00');
          $('#grand_total').html(tot);
          calculation();
      }
    })

      $('#discount_type').on('change',function(){
         var that = $(this).prev('input');
         var dis = $(this).prev('input').val();
          var sub_total = $('#subtotal').html();
         if($(this).val() == 'percent'){
            if(dis > 100){
              alert('discount should not grater than 100');
                    that.val('');
                    $('#total_discount').html(0);
                    $('#discount_price').val(0);
                    calculation();
            }else{
              var    dis_price =  parseInt(sub_total) * dis/100;
            }
         }else{
                dis_price = dis;
         }
          var   g_total    =  parseInt(sub_total) - dis_price;
           $('#grand_total').html(g_total);
           $('#total_discount').html(dis_price);
           $('#final_total').val(g_total);    //update on hidden field
           $('#discount_price').val(dis_price); //update on hidden field
           calculation();
      })

       $(document).on('keyup','#dicount_rate',function(){
          var type = $(this).next('select').val();
           var discount_rate = $(this).val();
           var that = $(this);
           var sub_total = $('#subtotal').html();
            var adjusment = $('#adjustment_price').val();
          if(discount_rate > 0){


           if(discount_rate != '' && discount_rate != 0 && sub_total != 0 ){
              if(type == 'doller'){
                if(parseInt(sub_total) >= discount_rate ){
                    var grand_total =  parseInt(sub_total) - discount_rate;
                    $('#total_discount').html(discount_rate);
                    $('#grand_total').html(grand_total-adjusment);
                    $('#discount_price').val(discount_rate);
                    $('#final_total').val(grand_total-adjusment);
                    calculation();
                }else{
                  alert('discount price not more than subtotal');
                    that.val('');
                    $('#total_discount').html(0);
                    $('#discount_price').val(0);
                    calculation();
                }
              }else{
                if(discount_rate <= 100){
                  var  discount_price =  parseInt(sub_total) * discount_rate/100;
                  var  grand_total    =  parseInt(sub_total) - discount_price;
                  $('#total_discount').html(discount_price);
                  $('#grand_total').html(grand_total-adjusment);
                  $('#discount_price').val(discount_rate);
                  $('#final_total').val(grand_total-adjusment);
                  calculation();
                }else{
                    that.val('');
                    $('#total_discount').html(0);
                    $('#discount_price').val(0);
                  calculation();
                }
             }
         }else {

                calculation();
                that.val('');
                $('#total_discount').html(0); 

         }
      }else{

            that.val('');
            $('#total_discount').html(0);
            $('#discount_price').val(0);
            calculation();
      }
    })

        $(document).on('change','#invoice_date',function(){
            var invoice_date = $(this).val();
            $('#due_date').val(invoice_date);
            // $('due_date-error').remove();
        })

        function checkRadio(){
          var value = $("input[name='rdo']:checked"). val();
           var action = $('#formModel').data('url');
          $.ajax({
              url:action,
              method: "POST",
              data: $('#formModel').serialize(),
              dataType:"json",
              success:function(output){
                console.log(output);
                if(value == "auto_generate"){
                  $('#prfx').val('INV');
                  $('#number').val(output.invoice_number);
                }else{
                  $('#prfx').val('');
                  $('#number').val('');
                }
              }
          })

        }

        $('.rdo').click(function(){
            checkRadio();
        })

       $('#btnsubmit').click(function(e){
           e.preventDefault();
          var action = $('#formModel').attr('action');
          $.ajax({
              url:action,
              method: "POST",
              data: $('#formModel').serialize(),
              dataType:"json",
              success:function(output){

                if(output.invoice_number != ''){
                    $('#invoice_no').val(output.invoice_number);
                }
              }
          })
       })


var HandleDeleteInvoice = function () {
     $('.delete').click(function(){
            var base_url = $('#base_url').val();
            var id = $(this).val();
            var that = $(this);
            var x = confirm("Are you sure you want to delete?");
        if(x){ 
            $.ajax({
                url : base_url+'users/invoice/deleteinvoice',
                method:'post',
                data: { id : id },
                success:function(response){
                    if(response){
                        that.parent().parent().remove();
                    }
                }   
            })
        }

        })
  }


function handleDynamic(){

            errorHandle = 0;
             var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            $('.project').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter project name');
                        errorHandle++;
                    } else {
                        $(this).next('div').text('');
                    }
                }
            });

            $('.hour').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter hour');
                        errorHandle++;
                    } else {
                        $(this).next('div').text('');
                    }
                }
            });

            $('.rate').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter rate');
                        errorHandle++;
                    } else {
                        $(this).next('div').text('');
                    }
                }
            });

            $('.description').each(function () {

                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter project description');
                        errorHandle++;
                    } else {
                        $(this).next('div').text('');
                    }
                }
            });


            $('.client_email').each(function () {

                if ($(this).is(':visible')) {
                  var email = $(this).val();
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter client email');
                        errorHandle++;
                    } else if(!emailReg.test(email)){
                        $(this).next('div').html('Please enter valid client email');
                        errorHandle++;
                    }else{
                        $(this).next('div').text('');
                    }
                }
            });
            return errorHandle;
        } 


 var HandleInvoiceForm = function () {
    
      $('#InvoiceForm').validate({
            rules: {
             customer_id:{required:true},
             invoice_no:{required:true},
             invoice_date:{required:true,
                            date:true },
             terms:{required:true},
             subject:{required:true},
             due_date:{required:true,
                        date:true },          
             customer_notes:{required:true},

            },
            messages: {
             customer_id:{required:'please select customer name'},
             invoice_no:{required:'please select invoice number'},
             invoice_date:{required:'please select invoice date',
                            date: "please select date format"},
             terms:{required:'please enter due on receipt '},
             subject:{required:'please enter subject'},
             due_date:{required:'please select due date',
                         date: "please select date format" },
            
             
             customer_notes:{required:'please enter customer notes'}
          },
           invalidHandler : function (){
                errorHandle = handleDynamic();
            },
              error: function (label) {
                $(this).addClass("error");
            },
            submitHandler : function (form){
                  $('#btnSubmit').attr('disabled','disabled');
                errorHandle = handleDynamic();
                if(errorHandle == 0){
                    form.submit();
                }else{
                  $('#btnSubmit').removeAttr('disabled');
                }
            }
        });
 }   

return {
    init: function () {
      HandleInvoiceForm();
    },
    delete: function () {
      HandleDeleteInvoice();
    }
}

    
}();