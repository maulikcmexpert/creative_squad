var PROFESSION = function () {
     $('#profession').DataTable({
     	ordering : false
     });
	$(document).on('click','#add',function(){
		var html = $('#html').html();
		$('#append').append(html);
	})

	$(document).on('click','.remove',function(){
		$(this).closest('.row').remove();
	})

	var HandleEdit = function () {
    
       $('#editProfession').validate({
	        rules:{
	        	name:{ required:true},
    		},
	        messages:{
	        	name:{ required : "Please enter name"},
	        },
	       submitHandler:function(form){
	       		form.submit();
	       }
       });
	}

     var HandleAdd = function () {
    
       $('#addProfession').validate({
	        rules:{
	        	'name[]':{ required:true},
    		},
	        messages:{
	        	'name[]':{ required : "Please enter name"},
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
					$(this).next('span.error').html('please enter name');
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
		                url : base_url+'admin/profession/delete',
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
        professionAdd: function () {
            HandleAdd();
        },
        edit: function () {
            HandleEdit();
        }
    };
}();