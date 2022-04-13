<div class="content">
<div class="input-group mb-3">
  <input type="text" id="search" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

  <div class="place-type">
      <div class="left">
          <span>kết qua tìm được:<p class="number" id="number"></p></span>
      </div>
      <div class="right">
         <button class="button1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-plus icons"></i></button>
      </div>
  </div>


  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">category name</th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody id="body">



  </tbody>
</table>




  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="form-add">
            
        <div class="form-group">
                        <label>Tên danh mục</label>
                      <input type="text" name="name" id="ten_dm" class="form-control">
                        </div>

                    <label>thương danh mục cha</label>
                        <select name="cate" id="cate" class="form-control">
 
                        </select>
                <div class="modal-footer">
                    
                    <button type="submit" name="submit" class="btn btn-primary" id="image_id" data-bs-dismiss="modal" aria-label="Close">cập nhập</button>
                    <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-default" data-dismiss="modal">đóng</button>
                </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" id="edit_image_form">
            <!-- Modal content-->

                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <div class="inside">

                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label>thương danh mục cha</label>
                        <select name="cars1" id="cars1" class="form-control">
 
                        </select>
                    </div>


                <div class="modal-footer">

                </div>

        </form>
      </div>

    </div>
  </div>
</div>






<script type="text/javascript">
$(document).ready(function() {
    $('#editModal').on('shown.bs.modal', function () {
      $(".modal-backdrop.in").hide();
   })

var page_number=1;
    function load_data(page_number) {
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddata",
            method: "POST",
            data:{page:page_number},
            dataType: "json",
            success: function(data) {
            
           
                var Arr = data['data'].map(function(sv, index) {
                    return `    <tr>
      <th scope="row">${sv.id}</th>
      <td>${sv.ten_dm}</td>
    <td>
          <button class="button2 edit" data-id2="${sv.id}" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa-solid fa-pen-to-square icons2"></i></i></button>
          <button class="button2" data-id2="${sv.id}" ><i class="fa-solid fa-copy icons2"></i></button>
          <button class="button2" id="delete" data-id2="${sv.id}"><i class="fa-solid fa-trash-can icons2"></i></button>
    </td>

    </tr>        
                           `;
                })
                $('#body').html(Arr)
                $('#pagination_link').html(data['pagination'])
            }
        })
    }
    load_data(page_number);
    $( "#search" ).keyup(function() {
        if($('#search').val()==""){
            load_data(page_number);
    }else{
        var data2=$('#search').val()
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddata",
            method: "POST",
            data:{data:data2,page:page_number},
            dataType: "json",
            success: function(data) {
                var Arr = data['data'].map(function(sv, index) {
                    return `    <tr>
      <th scope="row">${sv.id}</th>
      <td>${sv.ten_dm}</td>
    <td>
          <button class="button2 edit" data-id2="${sv.id}" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa-solid fa-pen-to-square icons2"></i></i></button>
          <button class="button2" data-id2="${sv.id}" ><i class="fa-solid fa-copy icons2"></i></button>
          <button class="button2" id="delete" data-id2="${sv.id}"><i class="fa-solid fa-trash-can icons2"></i></button>
    </td>
    </tr>        
    
                           `;
                           
                           
                })
                $('#body').html(Arr)

                $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddatacount",
            method: "POST",
            data:{data:data2},
            dataType: "json",
            success: function(data) {
                var Arr2 = data.map(function(sv, index) {
                    return ` 
               <p>${sv.number}</p>
                           `;
                           
                           
                })
                $('#number').html(Arr2)
            }
        })
            }
        })
    }
       });


  

    $(document).on('click', '.edit', function() {
        var id_hang = $(this).data('id2');
        $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddata2",
            method: "POST",
            dataType: "json",
            data: {
                id_hang: id_hang
            },

            success: function(data) {
              
                var Arr = data.map(function(sv, index) {
                    $('.inside').html(`<input type="text"  name="name" id="id" class="form-control" value="${sv.ten_dm}"> <input type="hidden" name="id_dm" id="id_dm" value="${sv.id}">`);
                    $('.modal-footer').html(`                    
                    <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close" data-id2="${sv.id}">cập nhập</button>
                    <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-default" data-dismiss="modal">đóng</button>`)
                    var id_th=sv.id
                    $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddatacate",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr2 = data.map(function(sv2, index2) {
                    return ` 
                             <option value="${sv2.id_cate}">${sv2.cate_name}</option>
                           `;

                })
                  $('#cars1').html(` <option value="${sv.id_cate}">${sv.cate_name}</option>`+Arr2);
            }
        });
                })
            }
        });

    });

    $('#edit_image_form').on('submit',function(event){
             event.preventDefault();
             var id_hang = $(this).data('id2');
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/realupdate",
                   method:"POST",
                   data:$('#edit_image_form').serialize(),
                   success:function(data){
                   alert('thành công');
                   load_data(page_number);
                   $('.inside').html(``);
                   $('#cars1').html(``);
                 }
             });
            
         });
         function loadatadm(){
            $.ajax({
            url: "<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/loaddatacate",
            method: "POST",
            dataType: "json",
            success: function(data) {

                var Arr2 = data.map(function(sv2, index2) {
                    return ` 
                             <option value="${sv2.id_cate}">${sv2.cate_name}</option>
                           `;

                })
                  $('#cate').html( Arr2);
            }
        });
         }
         loadatadm()
         $('#form-add').on('submit',function(event){
             event.preventDefault();
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/insertdm",
                   method:"POST",
                   data: new FormData(this),
                   processData: false,
                   contentType: false,
                   success:function(data){
                   alert('thành công');
                   load_data(page_number);
                   $('#ten_dm').val(``);
                 }
             });
            
         });    

         $(document).on('click','#delete',function(){
              var id_dm = $(this).data('id2');
             
             if(confirm('bạn chắc chắn muốn xóa không')){
                $.ajax({
                   url:"<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/delete",
                   method:"POST",
                   data:{id_dm:id_dm},
                   success:function(data){
                    load_data(page_number);
                    alert('thành công');
                 }
             });
             }
         });


})
</script>

<div id="pagination_link"></div>