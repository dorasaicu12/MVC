       <div class="content">

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