<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">Danh Sách Danh Mục</h4>
                        <p class="category"></p>
                    </div>
                    <br>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th class="product-id">Mã loại</th>
                                <th class="product-tenloai">Tên loại</th>
                                <th></th>
                            </thead>
                            <tbody id="place">



                            </tbody>
                        </table>
                        <div class="buttons">
                            <a href="../dashboard/newdm" class="boxed-btn">Nhập thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<body>
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
                        <label>Tên Hình</label>
                       

                        <input type="text" disabled name="id" id="id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" name="ten_dm" id="name" class="form-control">
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
</body>

<script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function () {
      $(".modal-backdrop.in").hide();
   })


    function load_data() {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddata",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    return `
                                           <tr>
                                                <td class="product-id">${sv.ma_nhom_hang}</td>
                                                <td class="product-tenloai">${sv.ten_nhom_hang}</td>            
                                                <td>
                                                    <!--sửa-->
                                                    <input type="hidden" id="valu" value="${sv.ten_nhom_hang}">
                                                    <button type="button" class="btn btn-warning btn-xs edit" data-id2="${sv.ma_nhom_hang}" >edit</button>
                                                    <!--Xoá-->
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-id2="${sv.ma_nhom_hang}" >delete</button>
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
        var id_dm = $(this).data('id2');
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/update",
            method: "POST",
           
            data: {
                id_dm:id_dm
            },
             dataType: "json",
            success: function(data) {
                $('#editModal').modal('show');
                var Arr = data.map(function(sv, index) {
                    $('#image_id').val(sv.ma_nhom_hang);
                    $('#name').val(sv.ten_nhom_hang);
                    $('#id').val(sv.ma_nhom_hang);
                })
            }
        });

    });

    $('#edit_image_form').on('submit',function(event){
             event.preventDefault();
             if($('#image_name').val() == ''){
                 alert('làm ơn điền tên');
             }else{
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/realupdate",
                   method:"POST",
                   data:$('#edit_image_form').serialize(),
                   success:function(data){
                    $('#editModal').modal('hide');
                    load_data();
                   alert('update thành công');
                 }
             });
             }
         });

         $(document).on('click','.delete',function(){
              var id_dm = $(this).data('id2');
             
             if(confirm('bạn chắc chắn muốn xóa không')){
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/delete",
                   method:"POST",
                   data:{id_dm:id_dm},
                   success:function(data){
                    load_data();
                    alert('xóa thành công');
                 }
             });
             }
         });
})
</script>