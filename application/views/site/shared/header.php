<header id="header">
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div id="header_logo" class="col-sm-2">
                    <a class="logo" href="" title="thoi trang nam"> 
                        <img src="public/site/img/logo.png" alt="4men" width="180" />
                    </a>
                </div>
                <div id="block_top_menu" class="sf-contener col-sm-10 clearfix ">
                    <div class="cat-title"><i class="fa fa-bars"></i> Menu </div>
                    <ul class="sf-menu clearfix menu-content">
                        <li>
                            <a href="" title="Trang chủ">Trang chủ</a>
                        </li>
                        <li>
                            <a href="danhmuc/0-thoi-trang-nam.html" title="Sản phẩm">Thời trang nam</a>
                        </li>
                        <li>
                            <a href="" title="Giam gia">Khuyến mãi</a>
                        </li>
                        <li>
                            <a href="#" title="Tin tuc thoi trang">Nổi bật</a>
                        </li>

                        <li> <a href="#" title="4men">Về 4MEN</a>
                            <ul>

                                <li> <a href="#" title="4men chinh sach">Chính sách</a>
                                    <ul>
                                        <li><a href="#" title="Chinh sach giao hang">Chính sách giao hàng</a>
                                        </li>
                                        <li><a href="#" title="Chinh sach doi hang">Chính sách đổi hàng</a>
                                        </li>
                                        <li><a href="#" title="Chinh sach khach vip">Chính sách khách vip</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom clearfix">
        <div class="container">
            <div id="search_block_top" class="clearfix">
                <form id="searchbox"  method="post">
                    <input class="search_query form-control" type="text" id="search_query_top" name="text" placeholder="Tìm kiếm" value="" />
                    <button type="button"  onclick="search()" name="submit" class="button-search"> <i class="fa fa-search"></i> </button>
                </form>
                <script type="text/javascript">
                    function search() {
                        var s = document.getElementById("search_query_top").value;
                        window.location = "index.php?c=product&a=searchproduct&search=" + s;

                    }
                </script>
            </div>

            <div class="shopping_cart clearfix">
                <a href="gio-hang.html" title="Giỏ hàng của bạn" rel="nofollow">
                    <b>Giỏ hàng</b> 
                  
                    <span class="cartTopRightQuantity" style="font-weight: bold;">
                       (<?php echo empty($this->cart->contents()) ? 0 : $this->cart->total_items(); ?>)
                    </span>
                    
                    <span class="ajax_cart_product_txt"> sản phẩm</span>
                </a>
                </div>
            <div class="clearfix">
                <a href="">Đăng nhập</a> /
                <a href="">Đăng kí</a>
            </div>

        </div>
    </div>
</header>