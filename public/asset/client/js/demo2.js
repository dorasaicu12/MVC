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