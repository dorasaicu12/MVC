<div class="image-slider">
    <div class="image-item">
        <div class="image">
            <img src="https://danviet.mediacdn.vn/2021/1/20/1-16111088039931950762885.png" alt="">
        </div>
        <div class="text-content">
            <h3 class="image-title">this is demo title</h3>
        </div>

    </div>

    <div class="image-item">
        <div class="image">
            <img src="https://ladalathotel.com.vn/wp-content/uploads/2020/12/Thu-Da-Lat.jpg" alt="">
        </div>
        <div class="text-content">
            <h3 class="image-title">this is demo title</h3>
        </div>

    </div>

    <div class="image-item">
        <div class="image">
            <img src="https://img3.thuthuatphanmem.vn/uploads/2019/07/13/hinh-anh-da-lat-dep-ve-dem_085718106.jpg"
                alt="">
        </div>
        <div class="text-content">
            <h3 class="image-title">this is demo title</h3>
        </div>

    </div>
    <div class="image-item">
        <div class="image">
            <img src="https://chupanhvn.s3.ap-southeast-1.amazonaws.com/wp-content/uploads/2015/12/25042219/da-lat.png"
                alt="">
        </div>
        <div class="text-content">
            <h3 class="image-title">this is demo title</h3>
        </div>

    </div>

    <div class="image-item">
        <div class="image">
            <img src="https://tgroup.vn/uploads/images/dalat-the-city-of-stories/kinh-do-anh-sang-tgroup-travel.jpg"
                alt="">
        </div>
        <div class="text-content">
            <h3 class="image-title">this is demo title</h3>
        </div>

    </div>
</div>

<div class="desc-dalat">
    <h1>Về đà lạt</h1>
    <p class="text-desc">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
        nisi ut aliquip ex ea commodo consequat.</p>
</div>

<div class="desc-img">
    <div class="image">
        <img src="https://img3.thuthuatphanmem.vn/uploads/2019/07/13/anh-dep-da-lat-nang-som_085717263.jpg" alt="">
    </div>
    <div class="desc">
        <h1>Đời người phải tới đà lạt 1 lần...</h1>
    </div>
</div>

<div class="product-list">
    <?php $data= $this->model_home->loadsanpham();  

foreach($data as $key){
    extract($key);
    $file = explode(",",substr($image, 0, -1)); 
    ?>
    <div class="pro-place">
        <div class="pro-img">
            <img src="<?php echo _WEB_ROOT.'/upload/'.$file[0];?>" alt="">
        </div>
        <div class="pro-desc">
            <h1> <?php echo $ten_san_pham; ?> </h1>
            <span><?php echo $gia_goc; ?></span>
        </div>
        <div class="pro-but">
            <a href="<?php echo _WEB_ROOT;?>/main/page/details/index?id=<?php echo $ma_san_pham;?>" class="button">mua ngay</a>
        </div>
    </div>

<?php } ?>

</div>
