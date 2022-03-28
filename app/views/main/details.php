<main>
    <style>
        .div{
            width: 50px;
        }
        .contains{
            width:100%;
        }
        .binhluan{
            width:80%;
            margin:auto;
            display:flex;
          
        }
        .textbl{
               width:90%;
               height:50px;
        }
        .blplace{
            width:80%;
            margin:auto;
            margin-top:30px;
            display:flex;
            flex-direction:column;
            min-height:500px;
            border:1px solid #ccc;
        }
        .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 5px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 0px 12px;
  cursor: pointer;
}
.binhluan1{
    width:90%;
    margin-left:50px;
    margin-bottom:40px;
}
.people{
    font-size: 20px;
}
.time{
    font-size: 13px;
    color: gray;
}
.noidung{
    color: gray;
}
    </style>
    
        <div class="container1">
       

        <?php
        $id=$_GET['id'];
        $data=$this->model_home->loadsanpham1($id);
       
            extract($data);
            $file = explode(",",substr($image, 0, -1)); 
            ?>
      
      <input  type="hidden" id="gia_sp" value="<?php echo $gia_goc;?>" >

            <div class="cover">
                <img src="<?php echo _WEB_ROOT.'/upload/'.$file[0];?>" alt="">
            </div>
            <div class="content">
                <div class="nav1">
                    <span class="logo"><?php echo $ten_thuong_hieu ;?></span>
                    <span><i class="fab fa-sistrix" style='font-size:24px'></i></span>
                </div>
      
                <div class="conten-body">
                    <div class="pages">
                        <span class="active"><b>1</b></span>
                        <span>02</span>
                        <span>03</span>
                        <span>04</span>
                    </div>
                    <div class="black-label">
                        <span class="title"><b><?php echo $ten_san_pham ;?><b></span>
                          <p>
                          <?php echo $mo_ta ;?>
                          </p>
                          <p>
                          <p>

                          <?php
                          $data=$this->model_home->loadtt($ma_san_pham);
                          foreach($data as $key){
                              extract($key);
                          ?>
                              
                          <input name="size" type="radio" id="size"value="<?php echo $size ;?>">
                          <label for="size"><?php echo $size ;?></label>
                          <?php } ?>

                          </p>
                            
                          <p>

                       <?php
                         $data=$this->model_home->loadtt($ma_san_pham);
                         foreach($data as $key){
                         extract($key);
                         ?>
    
                       <input name="color" type="radio" id="color"value="<?php echo $color ;?>">
                       <label for="color"><div class="div"  style="background-color:<?php echo $color ;?>;"  > <?php echo $color ;?> </div></label>
                       <?php } ?>

                             </p>

                          </p>
                    </div>
                    <input  type="hidden" id="id_sp" value="<?php echo $_GET['id'];?>" >
            </div>
            <div class="prix">
                <span><b><?php echo $gia_goc ;?></b></span>
                <span><button class="button" id="dathang">mua ngay</button></span>
            </div>
  



            </div>
                
  
        </div>
    </main>

    <div class="contains">

        <div class="binhluan">
            <h1>bình luận</h1>
          
        </div>

        <div class="binhluan">
            
            <input type="text" class="textbl" >
            <button class="button">bình luận</button>
        </div>


        <div class="blplace" id="blplace">



        </div>
    </div>

    <script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function() {
        $(".modal-backdrop.in").hide();
    })

    function load_data() {
       var id= $('#id_sp').val();
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/loadbinhluan",
            method: "POST",
            data:{id:id},
            dataType: "json",
            success: function(data) {

                var Arr = data.map(function(sv, index) {
                    return ` 
                    <div class="binhluan1">
                  <p class="people">người bình luận:${sv.username}</p>
                  <p class="time">lúc:${sv.ngay_bl}</p>
                  <p class="noidung">${sv.noi_dung}</p>
              </div>
                           `;
                })
                $('#blplace').html(Arr)
            }
        })
    }
    load_data();
 

    $(document).on('click','#dathang',function(){
             var id_sp= $('#id_sp').val();
             var soluong=1
             var gia=$('#gia_sp').val();
             var size=$('#size').val();
             var color=$('#color').val();
           
            
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/insertdonhang",
                   method:"POST",
                   dataType: "json",
                   data:{id_sp:id_sp,soluong:soluong,gia:gia,size:size,color:color},
                   success:function(data){
                       
                    console.log(data);
                 }
             });
            
         });



         $(document).on('click','.button',function(){
             var id= $('#id_sp').val();
             var noidung= $('.textbl').val();
            
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/insertbinhluan",
                   method:"POST",
                   data:{id:id,noidung:noidung},
                   success:function(data){
                       
                    load_data();
                 }
             });
            
         });    




  



 

})
</script>