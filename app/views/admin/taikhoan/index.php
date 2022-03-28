<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="header">
                                    <h4 class="title">Danh sách tài khoản</h4>
                                    <p class="category"></p>
                                </div>
                                <br>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="product-id">ID</th>
                                            <th class="product-tentk">Tên tài khoản</th>
                                            <th class="product-email">Email</th>
                                            <th class="product-email">số điện thoại</th>
                                            <th class="product-diachi">Địa chỉ</th>
                                            <th></th>
                                        </thead>
                                        <tbody id="product">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>


            <script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function() {
        $(".modal-backdrop.in").hide();
    })

    function load_data() {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/taikhoan/dashboard/loadata",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    var vaitro="";
                    if(sv.vai_tro==0){
                           vaitro+="thành viên";
                    }else if(sv.vai_tro==1){
                        vaitro+="admin";
                    }
                    return `               <tr>
                                                <td class="product-id">${sv.id_tai_khoan}</td>
                                                <td class="product-tentk">${sv.username}</td>
                                                <td class="product-email">${sv.email}</td>
                                                <td class="product-email">${sv.sdt}</td>
                                                <td class="product-diachi">${vaitro}</td>
                                                <td>
                                                    <!--Xoá-->
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-id2="${sv.id_tai_khoan}" >delete</button>
                                                </td>
                                            </tr>
                           `;
                })
                $('#product').html(Arr)
            }
        })
    }
    load_data();
  
        
    $(document).on('click','.delete',function(){
              var id_dm = $(this).data('id2');
             
             if(confirm('bạn chắc chắn muốn xóa không')){
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/taikhoan/dashboard/delete",
                   method:"POST",
                   data:{id_dm:id_dm},
                   success:function(data){
                    load_data();
                    alert(data);
                 }
             });
             }
         });






})
</script>        