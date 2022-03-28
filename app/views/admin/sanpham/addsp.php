
<style>
    .hinhanh{
        width:100%;
        display: flex;
        text-align:center;
    }
    .anh{
        width:30%;
        height:200px;
        margin-left:20px;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">Thêm Sản Phẩm</h4>
                        <p class="category"></p>
                    </div>
                    <br>

                    <div id="form_status"></div>
                    <div class="contact1">



                        <form method="post" enctype="multipart/form-data" id="fruitkha"
                            action="<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/themsp">

                            <br>
                            <div class="danhmuc">
                                <div class="danhmuc1">
                                    <br>
                                    <select name="danhmuc" id="danhmuc">
                                        

                                    </select>

                                    <select name="thuonghieu" id="thuonghieu">
                                        

                                    </select>


                                    <p1>
                                        <input type="file" name="mutiple_file[]" id="mutiple_file" multiple />
                                        <span class="text-muted">Chỉ cho upload:jpg,png,gif,jpeg</span>
                                        <span id="error_mutiple_file"></span>
                                    </p1>
                                </div>
                                <br>
                                <p>
                                    <input type="text" placeholder="Tên" name="name">&nbsp;
                                    <input type="text" placeholder="Giá" name="giasp">
                                </p>
                                <br>
                                <p><textarea name="mota" id="mota" cols="30" rows="10" placeholder="Mô tả"></textarea>
                                </p>
                        </form>
                    </div>
                </div>
                <div class="button">
                    <input form="fruitkha" name="submit" type="submit" value="Thêm">&nbsp;&nbsp;
                    <a href="<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/index"><input type="button"
                            value="Danh sách"></a>
                </div>
                </form>

                <div class="hinhanh" id="hinhanh"> 
                         
                         <span class="text-muted">Chỉ cho upload:jpg,png,gif,jpeg</span>
                         <span id="error_mutiple_file"></span>

                    </div>

            </div>
        </div>
    </div>
</div>
</div>



</div>
</div>


</body>


<script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function() {
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
                    <option value="${sv.ma_nhom_hang}">${sv.ten_nhom_hang}</option>
                           `;
                })
                $('#danhmuc').html(Arr)
            }
        })
    }
    load_data();

    function load_data2() {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddata2",
            method: "POST",
            dataType: "json",
            success: function(data) {
                var Arr = data.map(function(sv, index) {
                    return `  
                    <option value="${sv.ma_thuong_hieu}">${sv.ten_thuong_hieu}</option>
                           `;
                })
                $('#thuonghieu').html(Arr)
            }
        })
    }
    load_data2();

    $('#mutiple_file').change(function() {
        var error_image = '';
        var form_data = new FormData();
        var files = $('#mutiple_file')[0].files;
        if (files.length > 10) {
            error_image += 'bạn không được up quá 10 hình ảnh';
        } else {
            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById('mutiple_file').files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpeg', 'jpg']) == -1) {
                    error_image += '<p>không có hiệu lực</p>';

                }
                var ofreader = new FileReader();
                ofreader.readAsDataURL(document.getElementById('mutiple_file').files[i]);
                var f = document.getElementById('mutiple_file').files[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 20000000) {
                    error_image += '<p>file ảnh quá lớn</p>';
                } else {
                    form_data.append("file[]", document.getElementById('mutiple_file').files[i])
                }
                $('#error_mutiple_file').html(error_image);
            }
        }

        if (error_image == '') {
            $.ajax({
                url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/hinhanh",
                method: "POST",
                dataType: "json",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#error_mutiple_file').html(
                        '<br><label class="text-primary">đang tải...</label>');
                },
                success: function(data) {
                    $('#error_mutiple_file').html(
                        '<br><label class="text-success">đã tải thành công...</label>');

                var Arr2 = data.map(function(sv2, index2) {
                    
                        return `
                    <img src="<?php echo _WEB_ROOT;?>/upload/${sv2[0]}" alt="" class="anh">
                    <img src="<?php echo _WEB_ROOT;?>/upload/${sv2[1]}" alt="" class="anh">
                    <img src="<?php echo _WEB_ROOT;?>/upload/${sv2[2]}" alt="" class="anh">
                           `;
               
                })
                $('#hinhanh').html( Arr2);
                }
            });

        }


    });


})
</script>
