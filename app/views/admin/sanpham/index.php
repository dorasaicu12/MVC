<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">Danh sách sản phẩm</h4>
                        <p class="category"></p>
                    </div>
                    <br>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th class="product-id">ID</th>
                                <th class="product-tenloai">danh mục</th>
                                <th class="product-tenloai">Thuơng hiệu</th>
                                <th class="product-tenloai">Tên loại</th>
                                <th class="product-hinh">Hình ảnh</th>
                                <th class="product-gia">Giá</th>
                                <th></th>
                            </thead>
                            <tbody id="place">


                            </tbody>
                        </table>


                        <div class="buttons">
                            <a href="<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/addsp" class="boxed-btn">Nhập thêm</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <form method="post" id="edit_image_form">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập Nhập hình ảnh</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID sản phẩm</label>
                        <input type="text" disabled name="id" id="id" class="form-control">
                    </div>
                    

                    <div class="form-group">
                        <label>danh mục</label>
                        <select name="cars" id="cars">
 
                        </select>
                    </div>

                    <div class="form-group">
                        <label>thương hiệu</label>
                        <select name="cars1" id="cars1">
 
                        </select>
                    </div>

                    <div class="form-group">
                        <label>tên sản phẩm</label>
                        <input type="text" name="name_sp" id="name_sp" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>giá cả</label>
                        <input type="text" name="price_sp" id="price_sp" class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="image_id" id="image_id" value="">
                    <input type="submit" name="submit" class="btnn btn-infor" id="image_id" value="cập nhập">
                    <button type="button" class="btn btn-default" data-dismiss="modal">đóng</button>
                </div>
            </div>
        </form>


    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function() {
        $(".modal-backdrop.in").hide();
    })

    function load_data() {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadata",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    var hinhanh = sv.image.split(',')
                    var id_dm = sv.ma_nhom_hang;


                    return `  <tr>
                                                <td class="product-id">${sv.ma_san_pham}</td>
                                                <td class="product-tenloai">${sv.ten_nhom_hang}</td>
                                                <td class="product-tenloai">${sv.ten_thuong_hieu}</td>
                                                <td class="product-tenloai">${sv.ten_san_pham}</td>
                                                <td class="product-hinh">
                                                    <img src="<?php echo _WEB_ROOT;?>/upload/${hinhanh[1]}" max-width="50px" alt="">
                                                </td>
                                                <td class="product-gia">${sv.gia_goc}</td>
                                                <td>
                                                <!--sửa-->
                                                    <input type="hidden" name="" id="valu" value="${sv.ten_nhom_hang}">
                                                    <button type="button" class="btn btn-warning btn-xs edit" data-id2="${sv.ma_san_pham}" >edit</button>
                                                    <!--Xoá-->
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-id2="${sv.ma_san_pham}" >delete</button>
                                                </td>
                                            </tr> 
                           `;
                })
                $('#place').html(Arr)
            }
        })
    }
    load_data();
    $(document).on('click', '.edit', function() {
        var id_hang = $(this).data('id2');
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loaddata2",
            method: "POST",
            dataType: "json",
            data: {
                id_hang: id_hang
            },

            success: function(data) {
                $('#editModal').modal('show');
                var Arr = data.map(function(sv, index) {
                    $('#id').val(sv.ma_san_pham);
                    $('#image_id').val(sv.ma_san_pham);
                    $('#name_sp').val(sv.ten_san_pham);
                    $('#price_sp').val(sv.gia_goc);
                    var id_th=sv.ma_thuong_hieu



                    $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadth",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr2 = data.map(function(sv2, index2) {
                    return ` 
                             <option value="${sv2.ma_nhom_hang}">${sv2.ten_nhom_hang}</option>
                           `;

                })
                  $('#cars').html(` <option value="${sv.ma_nhom_hang}">${sv.ten_nhom_hang}</option>`+Arr2);
            }
        });
        

        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadth2",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr2 = data.map(function(sv2, index2) {
                    return ` 
                             <option value="${sv2.ma_thuong_hieu}">${sv2.ten_thuong_hieu}</option>
                           `;

                })
                  $('#cars1').html(` <option value="${sv.ma_thuong_hieu}">${sv.ten_thuong_hieu}</option>`+Arr2);
            }
        });
        


                })
            }
        });

    });

    $('#edit_image_form').on('submit',function(event){
             event.preventDefault();
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/realupdate",
                   method:"POST",
                   data:$('#edit_image_form').serialize(),
                   success:function(data){
                    $('#editModal').modal('hide');
                    
                   alert(data);
                   load_data();
                 }
             });
            
         });

         $(document).on('click','.delete',function(){
              var id_dm = $(this).data('id2');
             
             if(confirm('bạn chắc chắn muốn xóa không')){
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/delete",
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