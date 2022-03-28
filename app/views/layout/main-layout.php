<?php 

               if(isset($_SESSION['user'])){?>
                 <body>

    
<?php 
   $this->render('block/header2');
?>
 <?php 
   
   $this->render($content,$sub_content);

?>
<?php 
   $this->render('block/footer2');
   
?>
</body>
              <?php }else{
                  require_once _DIR_ROOT.'/app/views/main/login.php';
               }
        
 ?>

