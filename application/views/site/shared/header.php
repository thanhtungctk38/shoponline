<header id="header">
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div id="header_logo" class="col-sm-2">
                    <a class="logo" href="index.php" title="thoi trang nam"> 
                        <img src="public/site/img/logo.png" alt="4men" width="180" />
                    </a>
                </div>
                <div id="block_top_menu" class="sf-contener col-sm-10 clearfix ">
                    <div class="cat-title"><i class="fa fa-bars"></i> Menu </div>
                    <ul class="sf-menu clearfix menu-content">
                        <?php
                        foreach ($categories as $cate):
                            if ($cate->ParentID == NULL):
                                ?>
                                <li> <a href="product/index/<?php echo  $cate->CategoryID?>" title=""><?php echo $cate->CategoryName ?></a>
                                    <ul>
                                        <?php
                                        foreach ($categories as $subcate):
                                            if ($subcate->ParentID == $cate->CategoryID):
                                                ?>
                                                <li> <a href="<?php echo "product/index/$subcate->CategoryID"; ?>" title=<?php echo $subcate->CategoryName ?>><?php echo $subcate->CategoryName ?></a>

                                                </li>
                                                <?php
                                            endif;
                                        endforeach;
                                        ?>


                                    </ul>
                                </li>
                                <?php
                            endif;
                        endforeach;
                        ?>

                        <li><a href="index.php?c=product&a=promotion" title="Giam gia">Khuyến mãi</a>
                        </li>
                        <li><a href="#" title="Tin tuc thoi trang">Tin tức</a>
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
                <a href="index.php?c=cart&a=index" title="Giỏ hàng của bạn" rel="nofollow"> <b>Giỏ hàng</b> (<span class="cartTopRightQuantity">
                        //<?php
//                        if (empty($_SESSION['Cart'])) {
//                            echo '0';
//                        } else {
//                            echo count($_SESSION['Cart']);
//                        }
//                        ?>
                    </span>) <span class="ajax_cart_product_txt">Sản phẩm</span> </a>

            </div>

        </div>
    </div>
</header>