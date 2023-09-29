var CUSTOMER = function () {
    $(document).ready(function(){
                $('.alert').fadeOut(5000);
            });
    $(document).ready(function() {
        $('.select2').select2();
    });

    var HandleAddCustomer = function () {

         $('#AddCustomerForm').validate({
        rules:{
        	salutaion:{ required:true},
            first_name:{ required:true},
            last_name:{ required:true},
            company_name:{ required:true},
        	email:{ required:true,
        			email:true 
        		},
            office_number:{ required:true,
                            number:true,
                            minlength:10,
                            maxlength:10,
                            },
            mobile_number:{  required:true,
                            number:true,
                            minlength:10,
                            maxlength:10,
                            },
            website:{ required : true,
                        url : true 
                    },
            currency:{ required : true},
            country:{ required : true},
            address1:{ required : true},
            city:{ required : true},
            state:{ required : true},
            zip_code:{ required : true},
            fax:{ required : true},
            remark:{ required : true},
         },
        messages:{
            salutaion:{ required : "Please select salutaion"},
        	first_name:{ required : "Please enter first name"},
            last_name:{ required : "Please enter last name"},
            company_name:{ required : "Please enter company name"},
        	email:{ required : "Please enter email",
        			email : 'Please enter valid email address'
        		  },
            office_number:{ required:'Please enter phone number',
                             number:'Please enter valid number',
                            minlength:'Please enter minimum 10 digit office number',
                            maxlength:'Please enter maximum 10 digit office number',
                            },
            mobile_number:{ required:'Please enter mobile number',
                            number:'Please enter valid number',
                            minlength:'Please enter minimum 10 digit mobile number',
                            maxlength:'Please enter maximum 10 digit mobile number',
                             },
            website:{ required:"Please enter website"},
            currency:{ required:'Please select currency'},
            country:{ required:'Please select country'},
            address1:{ required:'Please enter address'},
            city:{ required:'Please enter city'},
            state:{ required:'Please enter state'},
            zip_code:{ required:'Please enter zip code'},
            fax:{ required:'Please enter fax'},
            remark:{ required:'Please enter remark'},
        }, 
        submitHandler: function (form) {

                $('body').attr('disabled','disabled');
                $('#btnSubmit').attr('disabled','disabled');
                $('#btnSubmit').value('please wait');
                    $(form).submit();
            }
       });
	}
    var url = $('#base_url').val();
    $('#search').on('keyup',function(){
        var search = $(this).val();
        $.ajax({
            url : url+'users/customer/search',
            data:{search:search},
            method:'post',
            success:function(output){
                $('#seachfield').html(output);
            }
        })
    })

    var HandleDeleteCustomer = function () {

        $('.delete').click(function(){
            var id = $(this).val();
            var that = $(this);
            var x = confirm("Are you sure you want to delete?");
        if(x){ 
            $.ajax({
                url : url +'users/customer/delete',
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
        //main function to initiate the module
        init: function () {
           HandleAddCustomer();
        },
        delete: function () {
            HandleDeleteCustomer();
        }
    };
}();