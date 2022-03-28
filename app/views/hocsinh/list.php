
<body>
    <div class="container">
    <form method="post" id="insert_data"> 
            <label>tên đầu</label>
            <input type="text" class="form-control" id="firstname" placeholder="nhap họ"> 

            <label>tên cuối</label>
            <input type="text" class="form-control" id="lastname" placeholder="nhap tên đệm">

            <label>email</label>
            <input type="text" class="form-control" id="email" placeholder="nhap email">

            <label>passsword</label>
            <input type="text" class="form-control" id="password" placeholder="nhap password">

          

            <input type="button" id="button_insert" name="insert_data" value="insert du lieu" class="btn btn-primary">
</form> 

<input type="text" id="input">


<div class="tablehs" id="tablehs">

</div>


<div  id="thongbao">
   
</div>

<p id="error_mutiple_file"></p>
    </div>

</body>

<script type="text/javascript">
   
$(document).ready(function(){  
    function load_hs_data(){
             $.ajax({
                url:"<?php echo _WEB_ROOT;?>/hocsinh/loadhs",
                method:"POST",
                success:function(data){
                    $('#error_mutiple_file').html(data);
                   
                } 
             })
         } 
         load_hs_data();

         function editdata(id,text,columm){
        $.ajax({
          url:"<?php echo _WEB_ROOT;?>/hocsinh/suahs",
          method:"POST",
          dataType:"JSON",
          data:{id:id,text:text,columm},
          success:function(data){
              alert(data.id);
              console.log(data);
          }
 
    });
   }

   $(document).on('blur','.email',function(){
   var id= $(this).data('id1');
   var text= $(this).text();
   editdata(id,text,"email");
})
$(document).on('blur','.firstname',function(){
   var id= $(this).data('id1');
   var text= $(this).text();
   editdata(id,text,"firstname");
})
$(document).on('blur','.lastname',function(){
   var id= $(this).data('id1');
   var text= $(this).text();
   editdata(id,text,"lastname");
})  

$('#button_insert').on('click',function(){
var firstname=$('#firstname').val();
var lastname=$('#lastname').val();
var pass=$('#password').val();
var email=$('#email').val();
if(firstname==''||lastname==''||pass==''||email==''){
    $('#thongbao').html('please enter probaly');
}else{
    $.ajax({
          url:"<?php echo _WEB_ROOT;?>/hocsinh/themhs",
          method:"POST",
          data:{firstname:firstname,lastname:lastname,pass:pass,email:email},

          success:function(data){
           var data1=data;
           load_hs_data();    
           $('#thongbao').html(data1);
          }
    });
}

})


})

</script>
</html>