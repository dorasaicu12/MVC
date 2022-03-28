
    
    <?php 
       $this->render('block/header');

    ?>
     <?php 
       
       $this->render($content,$sub_content);

    ?>
<?php 
       $this->render('block/footer');
       
    ?>
