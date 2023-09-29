var PROJECT = function () {
        $(document).ready(function(){
                $('.alert').fadeOut(5000);
            });
	//user add in add project section
	$(document).on('click','#addHtml',function(){
		$('#appended').append('<tr><td><input type="text" class="emailuser form-control" name="user[]" placeholder="Enter User"><div style="color:red"></div></td><td><input type="text" class="useremail form-control" name="user_email[]" placeholder="Enter User Email"><div style="color:red"></div></td><td class="action"><span class="minus" id="removeTd"><i class="fas fa-minus"></i> </span></td></tr>');
	});

	//task add in add project section
		$('#addTask').click(function(){
		$('#TaskAppend').append('<tr><td><input  class="form-control taskforproject" name="task[]" id="inputPassword3" placeholder="Task Name"><div style="color:red"></div></td></tr>');
	});

    $(document).on('click','#removeTd',function(){
        $(this).closest('td').parent().remove();
    })

    $(document).on('click','.re',function(){
        $(this).parent().parent().remove();
    })

    $(document).ready(function () {

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


     var url = $('#base_url').val();
       
            // $('#multipledelete').click(function(){

            //        var deletepro = [];
            //          $.each($("input[name='cus_id[]']:checked"), function(){
            //              deletepro.push($(this).val());
            //         });
            //        if(deletepro.length !== 0){
            //             var x = confirm("Are you sure you want to delete?");
            //             if(x){
            //                 $.ajax({
            //                 url: url + 'users/project/multipledelete',
            //                 method:'post',
            //                 data:{deletepro: deletepro },
            //                 success:function (output){
            //                     console.log(output);
            //                 }
            //              })
            //             }
            //        }

                // $('.cus_id').each(function(){
                //     if($(this).is(':checked')){ 
                //         var id =  $(this).val();
                //         $.ajax({
                //             url: url + 'users/project/multipledelete',
                //             method:'post',
                //             data:{id: id },
                //             success:function (output){
                //                 console.log(output);
                //             }
                //         })
                //     }
                // })                
            // })


     $('#search').on('keyup',function(){
        var search = $(this).val();
        $.ajax({
            url : url+'users/project/search',
            data:{search:search},
            method:'post',
            success:function(output){
                $('#serchProject').html(output);
            }
        })
    })




    function handleDynamic(){
            var errorHandle = 0;
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            $('.emailuser').each(function () {
                if ($(this).is(':visible')) {
                    var email = $(this).val();
                    if ($(this).val() == '') {
                            $(this).next('div').html('Please enter user name');
                            errorHandle++;
                    }else{
                        $(this).next('div').text('');
                    }
                }
            });

            $('.useremail').each(function () {
                if ($(this).is(':visible')) {
                    var email = $(this).val();
                    if ($(this).val() == '') {
                        $(this).next('div').html('Please enter email');
                        errorHandle++;

                    } else if(!emailReg.test(email)){
                        $(this).next('div').html('Please enter valid email');
                        errorHandle++;

                    }else{

                        $(this).next('div').text('');
                    }
                }
            });

            $('.taskforproject').each(function () {
                if ($(this).is(':visible')) {
                    if ($(this).val() == '') {
                            $(this).next('div').html('Please enter task');
                            errorHandle++;
                    } else {
                        $(this).next('div').text('');
                    }
                }
            });

            return errorHandle;


        } 
        
    //      $(document).on('blur','.emailuser',function(){
    //         $(this).each(function(){
    //         var errorHandle = handleDynamic();
    //         if(errorHandle == 0){
    //             $(this). $(this).next('div').html('');
    //         }
    //     })
    // })

    //   $(document).on('blur','.useremail',function(){
    //         $(this).each(function(){
    //         var errorHandle = handleDynamic();
    //         if(errorHandle == 0){
    //             $(this). $(this).next('div').html('');
    //         }
    //     })
    // })


	var HandleAddProject = function () {
	
	$('#addProject').validate({
        rules:{
        	project_name:{ required:true},
        	description:{ required:true},
        	customer_name:{ required:true},
        	bill_method:{ required:true}    
    },
        messages:{
        	project_name:{ required : "Please enter project name"},
        	description:{ required : "Please enter project decription"},
        	customer_name:{ required : "Please select customer name"},
        	bill_method:{ required : "Please select bill methid"}
        },
         invalidHandler : function (){
                errorHandle = handleDynamic();
            },
        submitHandler: function (form) {
            $('#btnSubmit').attr('disabled','disabled');
               var errorHandle = handleDynamic();
                if(errorHandle == 0){
                    form.submit();
                }else
                {
                  $('#btnSubmit').removeAttr('disabled');
                }
            }

       });
	}

	var HandleDeleteProduct = function () {
		 $('.delete').click(function(){
            var base_url = $('#base_url').val();
            var id = $(this).val();
            var that = $(this);
            var x = confirm("Are you sure you want to delete?");
        if(x){ 
            $.ajax({
                url : base_url+'users/project/delete',
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
	return {
		init: function () {
			HandleAddProject();
		},
		delete : function () {
			HandleDeleteProduct();
		}
	}


}();