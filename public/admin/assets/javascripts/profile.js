var USERPROFILE = function () {
    $(document).ready(function(){
                $('.alert').fadeOut(5000);
            });

    var HandleProfile = function () {
    
         $('#ProfileForm').validate({
        rules:{
        	first_name:{ required:true},
        	email:{ required:true,
        			email:true 
        		},
            password:{ required:true,
                            minlength: 6,
                            maxlength:10
                     },
            new_password:{required:true,
            		minlength: 6,
            		maxlength:10
            	},
            confirm_password: {
		            required: true,
		            minlength: 6,
		            maxlength:10,
		            equalTo: "#new_password"
        }},
        messages:{
        	first_name:{ required : "Please enter first name"},
        	email:{ required : "Please enter email",
        			email : 'Please enter valid email address'
        		  },
            password:{required : "Please enter old password",
                      minlength:   "Please enter minmum 6 digit password",
                      maxlength:   "Your Password must be less than 10 digit"
                    },
            new_password:{required : "Please enter new password",
        			  minlength : "Please enter minmum 6 digit password",
        			  maxlength : "Your Password must be less than 10 digit"
        			},
            confirm_password:{ required : "Please enter confirm password",
            		       minlength : "Please enter minmum 6 digit password",
            		       maxlength : "Your Password must be less than 10 digit",
            		       equalTo : "Your password does not match"
            	 }
        }
       });
	}
    
    return {
        //main function to initiate the module
        init: function () {
           HandleProfile();
        }
    };
}();