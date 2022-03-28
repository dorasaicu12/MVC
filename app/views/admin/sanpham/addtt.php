<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="header">
                                    <h4 class="title10">Thêm loại sản phẩm và số lượng của từng loại</h4>
                                    <p class="category"></p>
                                </div>
                                        <div class="contact-form">
                                            <form action="index.php?act=update_dm" method="post" id="fruitkha-contact12"  name="">
                                                <label for="">Chọn size cho sản phẩm:</label>
                                                <input name="size" type="radio" id="html" value="S" checked>
                                                <label for="html">S</label>
                                                <input name="size" type="radio" id="css" value="M">
                                                <label for="css">M</label>
                                                <input name="size" type="radio" id="javascript" value="L">
                                                <label for="javascript">L</label>
                                                <input name="size" type="radio" id="javascript" value="XL">
                                                <label for="javascript">XL</label>
                                                <input name="size" type="radio" id="javascript" value="XXL">
                                                <label for="javascript">XXL</label><br>
                                                <!--dfdsf-->
                                                <label for="favcolor">Chọn màu cho sản phẩm:</label>
                                                <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                                                <label for="">Số lượng sản phẩm:</label>
                                                <input id="number" name="number" type="number" value="50"> <br>
                                                <p><button type="submit" name="add_session">Thêm loại</button></p>
                                                <a href="#"><input type="button" value="Xác nhận"></a>
                                                <input type="reset" value="Nhập lại"></a>
                                            </form>
                                            <div id="thuoctinh">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
$(document).ready(function() {

    function load_data() {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadatatt",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    return `  
                            <ul> 
                            <li>${sv.id_tt}</li>
                            <li>${sv.color}</li>
                            <li>${sv.size}</li>
                            <li>${sv.so_luong}</li>
                             <ul>
                           `;
                })
                $('#thuoctinh').html(Arr)
            }
        })
    }
   
    $('#fruitkha-contact12').on('submit',function(event){
             event.preventDefault();
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/addtt2",
                   method:"POST",
                   data:$('#fruitkha-contact12').serialize(),
                   success:function(data){
                 
                    
                   
                   load_data() 
                 }
             });
            
         });



})
</script>        