<main>
    
    
        <div class="container1">
       

        <div class="table table-reponsive">
 <h3>load đơn hàng</h3>
  <table class="table table-bordered">
     <tr>
      <td>mã sản phẩm </td>
      <td>tên sản phẩm </td>
      <td>giá sản phẩm </td>
      <td> giá </td>
      <td>màu</td>
      <td>size</td>
      <td>số lượng</td>
  </table>
 </div>
  
        </div>
    </main>


    <script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function() {
        $(".modal-backdrop.in").hide();
    })

    function load_data() {
       var id= $('#id_sp').val();
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadgiohang",
            method: "POST",
            success: function(data) {

                $('.table-bordered').html(data)
            }
        })
    }
    load_data();
    $(document).on('change','.quan',function(){
        var id= $(this).data('id1');
        var quan= $(this).val();
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/updatedonhang",
                   method:"POST",
                   data:{id:id,quan:quan},
                   success:function(data){
                    load_data()
                 }
             });
            
         });   
 
})
</script>