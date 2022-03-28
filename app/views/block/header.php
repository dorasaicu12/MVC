<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

<style>
    .modal-backdrop{
      background-color: pink;
    }
</style>



<link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ; ?>/public/asset/client/css/style.css">

<link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ; ?>/public/asset/client/css/bootstrap.min.css">

<link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ; ?>/public/asset/client/css/animate.min.css">

<link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ; ?>/public/asset/client/css/light-bootstrap-dashboard.css?v=1.4.0">
</head>


<body>

<div class="wrapper">
    <div class="sidebar">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <img src="<?php echo _WEB_ROOT ; ?>/public/asset/client/images/logo3.png" width="100%">
            </div>
            <ul class="nav">
                <li>
                    <a href="trangchu.html">
                        <i class="pe-7s-home"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT;?>/admin/danhmuc/dashboard/mylist">
                        <i class="pe-7s-bookmarks"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT;?>/admin/sanpham/dashboard2/index">
                        <i class="pe-7s-note2"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <li class="active">
                    <a href="thuonghieu.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Thương hiệu</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT;?>/admin/donhang/dashboard/index">
                        <i class="pe-7s-cart"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT;?>/admin/taikhoan/dashboard/index">
                        <i class="pe-7s-user"></i>
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT;?>/admin/binhluan/dashboard/index">
                        <i class="pe-7s-comment"></i>
                        <p>Bình luận</p>
                    </a>
                </li>
                <li>
                    <a href="thongke.html">
                        <i class="pe-7s-graph"></i>
                        <p>Thống kê</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="#">
                        <i class="pe-7s-shopbag"></i>
                        <p>Shop The Luxuries</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Thương hiệu</a>
                </div>
<div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										Thông báo
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Thông báo 1</a></li>
                                <li><a href="#">Thông báo 2</a></li>
                                <li><a href="#">Thông báo 3</a></li>
                                <li><a href="#">Thông báo 4</a></li>
                                <li><a href="#">Thông báo 5</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Tài khoản</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Thả xuống
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Đăng xuất</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>