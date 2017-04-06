

<!--=== Content Part ===-->
<div class="content container">
    <div class="row">

        <div id="left_column" class=" col-md-3 hidden-xs">
            <div id="categories_block_left" class="block box-menu">
                <h2 class="title_block" align="center"> SHOP THỜI TRANG 4MEN </h2>
                <div class="block_content call-box">
                    <div class="hotline"> <i class="fa fa-phone"></i> <span>0868.044.644</span> <span>0868.444.644</span>
                        <div style="clear:both"></div>
                    </div>
                    <div class="info maps-link"> <a class="button" href="http://4menshop.com/dat-hang-truc-tuyen.html" title="Huong dan mua hang"><i class="fa fa-help"></i>Hướng dẫn mua hàng</a> </div>
                    <div class="info"> <a style="color:#FFF;" href="http://4menshop.com/ban-do.html" title="Xem ban do"><i class="fa fa-map-marker"></i>Xem bản đồ</a>
                    </div>
                    <style type="text/css">
                        .info_service li {
                            font-weight: bold;
                            color: #FFF;
                            margin-bottom: 5px;
                        }
                        .info_service li span {
                            display: inline-block;
                            padding: 5px 10px 5px 10px;
                            line-height: 15px;
                            color: #FFF;
                            background: #000;
                            border-radius: 3px;
                        }
                    </style>
                    <ul class="info_service">
                        <li> <span>1</span> Giao hàng TOÀN QUỐC </li>
                        <li> <span>2</span> Thanh toán khi nhận hàng </li>
                        <li> <span>3</span> Đổi trả trong 15 ngày </li>
                        <li> <span>4</span> Chất lượng đảm bảo </li>
                        <li> <span>5</span> Hàng luôn sẵn có </li>
                        <li> <span>6</span> MIỄN PHÍ vận chuyển: </li>
                        <li style="padding-left:30px;">» Đơn hàng trên 1 triệu đồng </li>
                    </ul>
                </div>
            </div>

            <div id="special_block_right" class="block hidden-xs">
                <p class="title_block"> 
                    <a href="index.php?c=product&a=hotproduct" title="thoi trang hot nhat"> Thời trang hot nhất</a> 
                </p>
                <div class="block_content products-block">
                    <ul>
                        <?php
                        foreach ($hottestProducts as $product):
                            $productLink = product_detail_link($product->ProductID, $product->ProductName);
                            ?>
                            <li class="clearfix">
                                <a class="products-block-image" href="<?php echo $productLink; ?>" title=""> <img class="replace-2x img-responsive" src="<?php echo product_img_url($product->Image); ?>" alt="" title="" width="60" /> </a>
                                <div class="product-content">
                                    <h5> <a class="product-name" href="<?php echo $productLink; ?>" title=""> <?php echo $product->ProductName; ?></a> </h5>
                                    <div class="price-box"> <span class="price special-price"> <?php echo format_price($product->Price); ?> </span> </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


        </div>



        <div class="col-md-9">
            <div class="row margin-bottom-5">
                <div class="result-category">
                    <h2><?php echo $title ?></h2>
                    <small class="shop-bg-red badge-results"><?php echo $totalRows . ' sản phẩm'; ?></small>
                </div>
                <div class="col-sm-8">

                </div>
            </div><!--/end result category-->

            <div class="filter-results">
                <div class="row illustration-v2 margin-bottom-30">
                    <?php
                    $i = 0;
                    if (count($listProducts) == 0) {
                        echo "<h2 style='padding-left:20px'>Không có sản phẩm nào</h2>";
                    } else {
                        foreach ($listProducts as $product):
                            $productLink = product_detail_link($product->ProductID, $product->ProductName);
                            if ($i % 3 == 0) {
                                echo '<div class="row">';
                            }
                            ?>
                            <div class="col-md-4">
                                <div class="product-img product-img-brd">
                                    <a href="<?php echo $productLink; ?>"><img style="width:265px; height: 345px" class="full-width img-responsive" src="<?php echo product_img_url($product->Image); ?>" alt=""></a>
                                    <a class="product-review" href="<?php echo $productLink; ?>">Xem chi tiết</a>
                                    <a class="add-to-cart" href="<?php echo "index.php?c=cart&a=add&id={$product->ProductID}" ?>"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>

                                </div>
                                <div class="product-description product-description-brd margin-bottom-30">
                                    <div class="overflow-h margin-bottom-5">

                                        <h4 class="product-title"><a href=""><?php echo $product->ProductName; ?></a></h4>
                                        <?php
                                        if ($product->PercentOff > 0) {
                                            echo "<div class='product-price line-through'>";
                                            echo format_price($product->Price);
                                            echo "</div>";
                                            echo "<div class='product-price'>";
                                            echo format_price($product->Price * (1 - $product->PercentOff / 100));
                                            echo "</div>";
                                        } else {
                                            echo "<div class='product-price'>";
                                            echo format_price($product->Price);

                                            echo "</div>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                            if ($i % 3 == 0) {
                                echo '</div>';
                            }
                        endforeach;
                    }
                    ?>
                    <div class="pagination">
                        <?php echo $pagination ?>
                    </div>
                </div>

            </div><!--/end filter results-->



        </div>
    </div><!--/end row-->
</div><!--/end container-->
<!--=== End Content Part ===-->