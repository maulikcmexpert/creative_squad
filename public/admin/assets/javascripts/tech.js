var TECH = function () {
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






	$(document).on('click','#add',function(){
		var html = $('#html').html();
		$('#append').append(html);
	})

	$(document).on('click','.remove',function(){
		$(this).closest('.row').remove();
	})

	var HandleEdit = function () {
    
       $('#editTecho').validate({
	        rules:{
	        	profession_id:{ required:true },
	        	stack_id : { required : true } 
    		},
	        messages:{
	        	profession_id:{ required : "Please select profession"},
	        	stack_id : { required : "Please select stack" }
	        },
	       submitHandler:function(form){
	       		var check =	handleError();
		       	if(check == 0){
		       		form.submit();
		       	}
	       }
       });
	}

     var HandleAdd = function () {
    
       $('#addTecho').validate({
	        rules:{
	        	profession_id:{ required:true },
	        	stack_id : { required : true } 
    		},
	        messages:{
	        	profession_id:{ required : "Please select profession"},
	        	stack_id : { required : "Please select stack" }
	        },
	       submitHandler:function(form){
	       	var check =	handleError();
	       	if(check == 0){
	       		form.submit();
	       	}
	       }
       });
	}

	function handleError(){
		// alert();
		var error = 0;
		$('.name').each(function(){
			var name = $(this).val();
			if($(this).is(':visible')){
				if($(this).val() == ''){
					$(this).next('span.error').html('please enter technology name');
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
		                url : base_url+'admin/tech/delete',
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