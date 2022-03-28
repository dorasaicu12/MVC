<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="header">
                                    <h4 class="title">Thêm danh mục</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="contact-form">
                                    <form method="post" id="fruitkha-contact" >
                                        <p>
                                            <b>MÃ LOẠI</b><br>
                                            <input type="text" name="maloai" style="width:100%;" disabled value="Auto">
                                        </p>
                                        <p>
                                            <b>TÊN LOẠI</b><br>
                                            <input type="text" name="name" style="width:100%;">
                                        </p>
                                        <br>
                                        <div class="button">
                                            <input type="submit" value="Thêm">&nbsp;&nbsp;
                                            <input type="reset" value="Nhập lại">&nbsp;&nbsp;
                                            <a href="danhmuc.html"><input type="button" value="Danh sách"></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
$(document).ready(function() {

    $('#fruitkha-contact').on('submit',function(event){
             event.preventDefault();
             $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/adddm",
                   method:"POST",
                   data:$('#fruitkha-contact').serialize(),
                   success:function(data){
                   alert('thành công');
                   window.location.assign('<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/mylist');
                 }
             });
         });


})
</script>          