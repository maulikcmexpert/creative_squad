var DASHBOARD = function () {
    
    var HandledeleteInvoive = function () {
         $('.deleteinvoice').click(function(){
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
                        // that.parent().parent().remove();
                        window.location.reload();
                    }
                }   
            })
        }

        })
    }
    var HandledeleteCustomer = function () {
         $('.deletecustomer').click(function(){
             var base_url = $('#base_url').val();
            var id = $(this).val();
            var that = $(this);
            var x = confirm("Are you sure you want to delete?");
        if(x){ 
            $.ajax({
                url : base_url +'users/customer/delete',
                method:'post',
                data: { id : id },
                success:function(response){
                    if(response){
                        // that.parent().parent().remove();
                        window.location.reload();
                    }
                }   
            })
        }

        })
         
}

    var HandledeleteProject = function () {
         $('.deleteproject').click(function(){
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
                        // that.parent().parent().remove();
                          window.location.reload();
                    }
                }   
            })
        }

        })
           
    }
    return {
        //main function to initiate the module
        invoicedelete: function () {
           HandledeleteInvoive();
        },
        customerdelete: function () {
            HandledeleteCustomer();
        },
        projectdelete: function () {
            HandledeleteProject();
        }
    };
}();