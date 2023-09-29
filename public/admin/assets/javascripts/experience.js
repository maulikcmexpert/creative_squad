var EXPERIENCE = function () {
	
     $('#profession').DataTable({
     	ordering : false
     });

     $(document).on('change','#profession_id',function(){
     	var profession_id = $(this).val();
     	var base_url = $('#base_url').val();
     	$.ajax({
     		url : base_url + 'admin/tech/getStackOfProfession',
     		type : "post", 
     		data : { 
     			profession_id : profession_id
     		},
     		dataType : "JSON",
     		success:function(res){
     			$('#stack_html').html(res.responceData);
     		}
     	})
     })

     $(document).on('change','#stack_html',function(){
     	var stack_id = $(this).val();
     	var base_url = $('#base_url').val();
     	$.ajax({
     		url : base_url + 'admin/experience/getTechOfStack',
     		type : "post", 
     		data : { 
     			stack_id : stack_id
     		},
     		dataType : "JSON",
     		success:function(res){
     			$('#tech_html').html(res.responceData);
     		}
     	})
     })






	$(document).on('click','#add',function(){
		var html = $('#html').html();
		$('#append').append(html);
	})

	$(document).on('click','.remove',function(){
		$(this).closest('.row').remove();
	})

	var HandleEdit = function () {
    	 $.validator.addMethod('le', function (value, element, param) {
            return this.optional(element) || value > $(param).val();
        }, 'Invalid value');
       $('#editExperience').validate({
	        rules:{
	        	profession_id:{ required:true },
	        	stack_id : { required : true },
	        	tech_id : { required : true },
	        	"min[]":{
	        		 required: true,
                     number: true
	        	},
	        	"max[]":{
	        		 required: true,
                     number: true,
                     le: '#minAmount'
	        	},

	        	"frc_min[]":{
	        		 required: true,
                     number: true
	        	},
	        	"frc_max[]":{
	        		 required: true,
                     number: true,
                     le: '#frcminAmount'
	        	},

	        	"frc_base_salary_min[]":{
	        		 required: true,
                     number: true
	        	},
	        	"frc_base_salary_max[]":{
	        		 required: true,
                     number: true,
                     le: '#frcbaseminAmount'
	        	}
    		},
	        messages:{
	        	profession_id:{ required : "Please select profession"},
	        	stack_id : { required : "Please select stack" },
	        	tech_id : { required : "Please select technology" },
	        	type : { required : "Please select type" },
	        	"max[]": { le: 'Must be grater than minmum amount.' },
	        	"frc_max[]" : { le: 'Must be grater than minmum amount.' },
	        	"frc_base_salary_max[]" : { le: 'Must be grater than minmum amount.' },
	        	
	        },
	       submitHandler:function(form){
	       		$('#btnSubmit').attr('disabled', 'disabled');
		       	form.submit();
	       }
       });
	}

     var HandleAdd = function () {
    	    $.validator.addMethod('le', function (value, element, param) {
            return this.optional(element) || value > $(param).val();
        }, 'Invalid value');
       $('#addExperience').validate({
	        rules:{
	        	profession_id:{ required:true },
	        	stack_id : { required : true },
	        	tech_id : { required : true },
	        	// type : { required : true },
	        	// min:{
	        	// 	 required: true,
                //      number: true
	        	// },
	        	// max:{
	        	// 	 required: true,
                //      number: true,
                //      le: '#minAmount'
	        	// }
    		},
	        messages:{
	        	profession_id:{ required : "Please select profession"},
	        	stack_id : { required : "Please select stack" },
	        	tech_id : { required : "Please select technology" },
	        	// type : { required : "Please select type" },
	        	// max : { le: 'Must be grater than minmum amount.' },
	        },
	       submitHandler:function(form){
	       	var check = handleError();
	       	if(check == 0){
	       		$('#btnSubmit').attr('disabled', 'disabled');
	       		form.submit();
	       	}
	       }
       });
	}

	function handleError(){
		// alert();
		var error = 0;
		$('.experience_id').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('please select experience level');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		});
		$('.type').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('please select type ');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		});
		$('.min').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required minimum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		});
		$('.max').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required maximum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		});

		$('.frc_min').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required france company minimum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		});

		$('.frc_max').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required france company maximum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		})

		$('.frc_base_salary_min').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required frc base minimum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		})

		$('.frc_base_salary_max').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('Required frc base maximum amount');
					error++;
				}else{
					$(this).next('span.error').html('');
				}
				
			}
		})
		return error;

	}


    var Handledelete = function () {
         $('.delete').click(function(){
            var base_url = $('#base_url').val();
            var id = $(this).val();
            var that = $(this);
            // var x = confirm("Are you sure you want to delete?");
	    	swal({
				  title: "Are you sure?",
				  text: "Do you want to delete",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	$.ajax({
		                url : base_url+'admin/experience/delete',
		                method:'post',
		                data: { id : id },
		                success:function(response){
		                     window.location.reload();
		                }   
           			 })
				  }
			});
        })
    }

    return {
        //main function to initiate the module
        delete: function () {
           Handledelete();
        },
        add: function () {
            HandleAdd();
        },
        edit: function () {
            HandleEdit();
        }
    };
}();