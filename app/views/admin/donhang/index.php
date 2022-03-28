<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="header">
                  <h4 class="title">Danh sách đơn hàng</h4>
                  <p class="category"></p>
                </div>
                <br>
                <div class="content table-responsive table-full-width">
                  <table class="table table-hover">
                    <thead>
                      <th class="product-id">ID</th>
                      <th class="product-tentk">Tên tài khoản</th>
                      <th class="product-hinh">Hình ảnh</th>
                      <th class="product-diachi">Địa chỉ</th>
                      <th class="product-gia">Giá</th>
                      <th class="product-pttt">Phương thức thanh toán</th>
                      <th class="product-trangthai">Trạng thái</th>
                      <th></th>
                    </thead>
                    <tbody id="product">



                    </tbody>
                  </table>
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
                        <label>trạng thái</label>
                        <select name="cars" id="cars" width="300px" height="300px"></select>
 
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="image_id" id="image_id" >
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
            url: "<?php echo _WEB_ROOT;?>/admin/donhang/dashboard/loadata",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    var vaitro="";
                    var trangthai=""
                    if(sv.pt_thanhtoan==0){
                           vaitro+="thanh toán khi nhận hàng";
                    }else if(sv.pt_thanhtoan==1){
                        vaitro+="thanh toán online";
                    }

                    if(sv.trang_thai==0){
                        trangthai+="đang xác nhận";
                    }else if(sv.trang_thai==1){
                        trangthai+="đang chuẩn bị";
                    }
                    return `<tr>
                        <td class="product-id">${sv.so_hoa_don}</td>
                        <td class="product-tentk">${sv.ho_ten}</td>
                        <td class="product-hinh">${sv.ngay_hoa_don} </td>
                        <td class="product-diachi">${sv.dia_chi}</td>
                        <td class="product-gia">${sv.thanh_tien} VND</td>
                        <td class="product-pttt">${vaitro}</td>
                        <td class="product-trangthai">${trangthai}</td>
                        <td>
                        <input type="hidden" name="" id="valu" value="${sv.so_hoa_don}">
                           <button type="button" class="btn btn-warning btn-xs edit" data-id2="${sv.so_hoa_don}" >cập nhập</button>
                                                    <!--Xoá-->
                           <button type="button" class="btn btn-danger btn-xs delete" data-id2="${sv.so_hoa_don}" >delete</button>
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
                   url:"<?php echo _WEB_ROOT;?>/admin/donhang/dashboard/delete",
                   method:"POST",
                   data:{id_dm:id_dm},
                   success:function(data){
                    load_data();
                    alert(data);
                 }
             });
             }
         });


         $(document).on('click', '.edit', function() {
        var id_hang = $(this).data('id2');
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/donhang/dashboard/loadata2",
            method: "POST",
            dataType: "json",
            data: {
                id_hang: id_hang
            },

            success: function(data) {
                $('#editModal').modal('show');
                var Arr = data.map(function(sv, index) {
                    $('#image_id').val(sv.so_hoa_don);
                    var trangthai=""
                    if(sv.trang_thai==0){
                        trangthai+="đang xác nhận";
                    }else if(sv.trang_thai==1){
                        trangthai+="đang chuẩn bị";
                    }
                    console.log(trangthai);
                    return `
                        <option value="${sv.trang_thai}">${trangthai}</option>
                        <option value="0">đang chuẩn bị</option>
                        <option value="1">đang giao</option>
                        <option value="2">nhận hàng</option>
                    `;
                    
                })
                $('#cars').html(Arr);
            }
        });

    });

    
    $('#edit_image_form').on('submit',function(event){
             event.preventDefault();
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/donhang/dashboard/update",
                   method:"POST",
                   data:$('#edit_image_form').serialize(),
                   success:function(data){
                    $('#editModal').modal('hide');            
                   alert('thành công');
                   load_data();
                 }
             });
            
         });



})
</script>             