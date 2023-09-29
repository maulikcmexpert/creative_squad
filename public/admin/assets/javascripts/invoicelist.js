var INVOICELIST = function () {
    $(document).ready(function(){
                $('.alert').fadeOut(5000);
            });

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

  var HandleSearchInvoice = function () {

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
  }
   
  
    return {
        //main function to initiate the module
        init: function () {
           HandleDeleteInvoice();
        },
        search: function () {
            HandleSearchInvoice();
        }
    };
}();