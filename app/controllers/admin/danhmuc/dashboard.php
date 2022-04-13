<?php
 class dashboard extends controller{
    public $data=[];
    public $model_home;
    public function __construct(){
        
        $this->model_home=$this->model('danhmuc'); //lấy ra các hàm từ hocsinhModel của file models/hocsinhModel
 }

     public function index(){     
         $this->data['content']='admin/danhmuc/index';
         $this->data['sub_content']['title']='trang admin';
         $this->render('layout/client-layout',$this->data);
     }  
    public function loaddata(){
        $limit=2;
        $page=1;
        if($_POST['page']>1){
          $start=(($_POST['page']-1)*$limit);

          $page=$_POST['page'];
        }else{
              $start=0;
        }
        if(isset($_POST['data'])){
            $data1=$_POST['data'];
            $data2=$this->model_home->loaddanhmucsearch($data1,$limit,$page,$start);
            if(isset($data2)){
                $data=$this->model_home->loaddanhmucsearch($data1,$limit,$page,$start);
                foreach($data as $key){
                    extract($key);
                    
                    $output=array(
                        'data'=>$data,
                    );
                }
                
                echo json_encode($output);
            }else{
                $data='không tìm được';
            }
        }else{

            $sql="select * from danhmuc  LIMIT $start ,$limit";
            $total=countAll($sql);
            $limit=2;
            $total_link=ceil($total/$limit);

            if($total_link>4){
                if($page<5){
                    for($count=1;$count<=5;$count++){
                        $page_array[]='...';
                        $page_array[]=$count;
                    }
                }else{
                $end_limit=$total_link-5;
                if($page>$end_limit){
                     $page_array[]=1;
                     $page_array[]='...';
                     for($count=$end_limit;$count<=$total_link;$count++){
                         $page_array[]=$count;
                     }
                }else{
                   $page_array[]=1;
                   $page_array[]='...';
                   for($count=$page-1;$count<=$total_link;$count++)
                   {
                    $page_array[]=$count;
                   }
                   $page_array[]='...';
                   $page_array[]=$total_link;
                }

                }

            }else{
                for($count=1;$count<=$total_link;$count++){
                    $page_array[]=$count;
                }
            }
               for($count=0;$count<count($page_array);$count++){
                  if($page==$page_array[$count]){
                    $page_link='
                    <li class="page-item active">
                      <a class="page-link" href="#">'.$page_array[$count].'</a>
                    </li>
                    ';
                    $previous_id=$page_array[$count]-1;

                    if($previous_id>0){
                       $previous_link='<li class="page-item"><a class="page-link" href="" onclick="load_data('.$page_array[$count].')">Previous</a></li>';
                    }else{
                        $previous_link='<li class="page-item disabled"><a class="page-link" href="" ">Previous</a></li>';
                    }
                    $next_id=$page_array[$count]+1;
                    if($next_id>=$total_link){
                        $next_link='<li class="page-item "><a class="page-link" href="" onclick="load_data(1)">next</a></li>';
                    }else{
                      $next_link='<li class="page-item "><a class="page-link" href="" onclick="load_data('.$next_id.')">next</a></li>';
                    }

                  }
                  else{
                    if($page_array[$count]=='...'){
                      $page_link='<li class="page-item disabled"><a class="page-link" href="" ">...</a></li>';
                    }else{
                        $page_link='<li class="page-item "><a class="page-link" href="" onclick="load_data('.$page_array[$count].')">'.$page_array[$count].'</a></li>';
                    }
                  }

               }
               $pagination_html='';
            $pagination_html.='
            <div align="center">
            <ul class="pagination">

          
            ';
            $pagination_html.=$previous_link.$page_link.$next_link;

            $pagination_html.='
            

            <ul>
            </div>
            ';
           
            
            
            $data=$this->model_home->loaddanhmuc($limit,$page,$start);
            foreach($data as $key){
                extract($key);
                
                $output=array(
                    'data'=>$data,
                    'pagination'=>$pagination_html,
                    '$total'=>$total
                );
            }
            echo json_encode($output);
        }     

        
    }
    public function loaddatacount(){
        if(isset($_POST['data'])){
            $data1=$_POST['data'];
                $data=$this->model_home->loadcountsearch($data1);
                foreach($data as $key){
                    extract($key);  
                    $output[]=$key;
                }
  
                echo json_encode($output);

        }    

        
    }
    public function insertdm(){
        $name=$_POST['name'];
        $id_cate=$_POST['cate'];
        $data=$this->model_home->insert($id_cate,$name);
    }

    public function loaddata2(){     
        $id=$_POST['id_hang'];
        $data=$this->model_home->loaddanhmuc1($id);
        foreach($data as $key){
        extract($key);
        $output[]=$key;
    } 
    echo json_encode($output);
    }    

 public function loaddatacate(){
    $data=$this->model_home->loadcate();
    foreach($data as $key){
    extract($key);
    $output[]=$key;
 }
  echo json_encode($output);
}  

    public function realupdate(){     
          $name=$_POST['name'];
          $id=$_POST['cars1'];
          $id_dm=$_POST['id_dm'];
          
          
          $this->model_home->update($id,$name,$id_dm);
         
    } 
    public function delete(){ 
        $id=$_POST['id_dm'];
        $this->model_home->delete($id);
  } 
 }
 ?>