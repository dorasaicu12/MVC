<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Danh sách bình luận</h4>
                                <p class="category"></p>
                            </div>
                            <br>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="product-id">ID</th>
                                        <th class="product-ten">Tên</th>
                                        <th class="product-tenloai">Tên sản phẩm bình luận</th>
                                        <th class="product-hinh">Hình ảnh</th>
                                        <th class="product-noidung">Nội dung bình luận</th>
                                        <th class="product-thoigian">Thời gian bình luận</th>
                                        <th></th>
                                    </thead>
                                    <tbody id="taikhoan">


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
            url: "<?php echo _WEB_ROOT;?>/admin/binhluan/dashboard/loadatabl",
            method: "POST",
            dataType: "json",
            success: function(data) {
             

                var Arr = data.map(function(sv, index) {
                    var hinhanh = sv.image.split(',')
                    var id_dm = sv.ma_nhom_hang;
                    return `    
                    <tr>
                                            <td class="product-id">${sv.ma_bl}</td>
                                            <td class="product-ten">${sv.username}</td>
                                            <td class="product-tenloai">${sv.ten_san_pham}</td>
                                            <td class="product-hinh">
                                                <img src="<?php echo _WEB_ROOT;?>/upload/${hinhanh[1]}" max-width="50px" alt="">
                                            </td>
                                            <td class="product-noidung">${sv.noi_dung}</td>
                                            <td class="product-thoigian">${sv.ngay_bl}</td>
                                            <td>
                                            <button type="button" class="btn btn-danger btn-xs delete" data-id2="${sv.ma_bl}" >delete</button>
                                            </td>
                                        </tr>        
                           `;
                })
                $('#taikhoan').html(Arr)
            }
        })
    }
    load_data();
  
        
    $(document).on('click','.delete',function(){
              var id_dm = $(this).data('id2');
             
             if(confirm('bạn chắc chắn muốn xóa không')){
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/binhluan/dashboard/deletebl",
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