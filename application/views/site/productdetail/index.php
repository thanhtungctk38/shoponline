<div class="columns-container">
    <div id="columns" class="container">
        <div class="row">
            <div id="center_column" class="center_column col-sm-7 col-md-9">

                <div style="clear:both;">
                    <div class="primary_block row">
                        <div class="pb-left-column col-xs-12 col-sm-12 col-md-5">
                            <div id="image-block" class="clearfix"> 
                                <img src="<?php echo product_img_url($product->Image) ?>" title="" alt="" style="width:265px; height: 345px" />
                            </div>

                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-12 col-md-7">
                            <br>
                            <h1 style="margin-top:30px"><?php echo $product->ProductName; ?></h1>
                            <div class="content_prices clearfix">
                                <div class="price">
                                    <p class="our_price_display" >
                                        <span id="our_price_display" > <?php echo format_price($product->Price); ?></span>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label >Số lượng</label>
                                    <input class="text" style="width:70px; text-align:center;" type="number" min="1" max="10" value="1" id="quantityBuy" /> <span class="clearfix"></span> 
                                </div>
                                <div class="col-md-3">
                                    <button type="button" id="buyNow" onclick="<?php echo "buyNow({$product->ProductID});" ?>" class=" btn btn-danger btn-buynow" value="Mua ngay"> <i class="fa fa-shopping-cart "></i><span>Mua ngay</span>
                                    </button> 
                                    <script type="text/javascript">
                                        function buyNow(id) {
                                            var number = document.getElementById("quantityBuy").value;

                                            window.location = "index.php?c=cart&a=add&id=" + id + "&number=" + number;

                                        }
                                    </script>
                                </div>
                            </div>
                            <p class="socialsharing_product list-inline box-info-product">

                           
                            </p>
                        </div>
                    </div>
                    <div class="moreinfo_block" class="clear">
                        <ul class="nav nav-tabs tab-info page-product-heading">
                            <li class="active"><a data-toggle="tab" href="#idTab1">Mô tả sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <section id="idTab1" class="page-product-box active">
                                <div class="rte">
                                    <div style="text-align:justify"><span style="color:#000000">
                                            <strong><?php echo $product->ProductName?></strong>
                                            <br/> <br/> 
                                            <p><?php echo $product->Description ?></p>
                                        </span>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div id="right_column" class="column col-sm-5 col-md-3 hidden-xs">
                <div id="categories_block_left" class="block box-menu">
                    <h2 class="title_block" align="center"> SHOP THỜI TRANG 4MEN </h2>
                    <div class="block_content call-box">
                        <div class="hotline"> <i class="fa fa-phone"></i> <span>0868.044.644</span> <span>0868.444.644</span>
                            <div style="clear:both"></div>
                        </div>
                        <div class="info maps-link"> <a class="button" href="#" title="Huong dan mua hang"><i class="fa fa-help"></i>Hướng dẫn mua hàng</a> </div>
                        <div class="info"> <a style="color:#FFF;" href="#" title="Xem ban do"><i class="fa fa-map-marker"></i>Xem bản đồ</a>
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
                            <?php foreach ($hottestProducts as $product): ?>
                                <li class="clearfix">
                                    <a class="products-block-image" href="<?php echo "index.php?a=product&id={$product->ProductID}"; ?>" title=""> 
                                        <img class="replace-2x img-responsive" src="<?php echo product_img_url($product->Image); ?>" alt="" title="" width="60" /> </a>
                                    <div class="product-content">
                                        <h5> <a class="product-name" href="<?php echo "index.php?a=product&id={$product->ProductID}"; ?>" title=""> <?php echo $product->ProductName; ?></a> </h5>
                                        <div class="price-box"> <span class="price special-price"> <?php echo format_price($product->Price); ?> </span> </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>