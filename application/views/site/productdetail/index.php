<div class="columns-container">
    <div id="columns" class="container">
        <div class="row">
            <div id="center_column" class="center_column col-sm-7 col-md-9">
                <div class="breadcrumb breadcrumbs hidden-xs hidden-sm">
                    <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a class="home_link" title="Thời trang nam giá rẻ 4menshop.com" href="<?php echo base_url(); ?>" itemprop="url">
                            <span itemprop="title">4MEN</span>
                        </a>
                        <span class="arrow">›</span>
                        <?php if ($category->Parent != NULL): ?>
                            <div itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a title="<?php echo $category->Parent->CategoryName; ?>" href="" itemprop="url">
                                    <span itemprop="title"><?php echo $category->Parent->CategoryName ?></span>
                                </a>
                                <span class="arrow">›</span>
                            </div>
                        <?php endif; ?>
                        <div itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                            <a title="<?php echo $category->CategoryName ?>" href="" itemprop="url">
                                <span itemprop="title"><?php echo $category->CategoryName ?></span>
                            </a>
                            <span class="arrow">›</span>
                            <div itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                <a title="<?php echo $product->ProductName ?>" href="" itemprop="url">
                                    <span itemprop="title"><?php echo $product->ProductName ?></span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div itemscope itemtype="http://schema.org/Product" style="clear:both;">
                    <div class="primary_block row">
                        <div class="pb-left-column col-xs-12 col-sm-12 col-md-5">
                            <div id="image-block" class="clearfix"> 
                                <span id="view_full_size"> 
                                    <a class="jqzoom" title="<?php echo $product->ProductName; ?>" rel="gal1" href="<?php echo product_img_url($product->Image); ?>">
                                        <img itemprop="image" src="<?php echo product_img_url($product->Image); ?>" title="<?php echo $product->ProductName; ?>" alt="<?php echo $product->ProductName; ?>"/> 
                                    </a> 
                                </span>
                            </div>

                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-12 col-md-7">
                            <h1 itemprop="name"><?php echo $product->ProductName; ?></h1>
                            <meta itemprop="url" content="<?php echo product_detail_link($product->ProductID, $product->ProductName); ?>" />
                            <div id="oosHook" style="display: none;"></div>
                            <div class="content_prices clearfix">
                                <div class="price">
                                    <p class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <link itemprop="availability" href="http://schema.org/InStock" /> 
                                        <span id="our_price_display" itemprop="price"> <?php echo format_price($product->Price); ?></span>
                                        <meta itemprop="priceCurrency" content="VND"/> </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="box-info-product" style="margin-bottom:10px !important; padding-bottom:5px; border-bottom:1px solid #e6e6e6; margin-top:10px !important;">
                                <div class="product_attributes clearfix"> <strong>Trọng lượng: <?php echo $product->Weight ?> (Gram)</strong> </div>
                            </div>
                            <div id="short_description_block">
                                <div id="short_description_content" class="rte align_justify" itemprop="description">
                                    <p><?php echo $product->Description; ?></p>
                                </div>
                            </div>
                            <div id="container_buy_top" style="background:#fafafa; padding:10px;">
                                <div class="box-info-product">
                                    <div class="product_attributes clearfix">
                                        <div id="attributes">
                                            <div class="clearfix"></div>
                                            <fieldset class="attribute_fieldset">
                                                <label class="attribute_label" for="group_1">Kích thước</label>
                                                <div class="attribute_list">
                                                    <select name="sizeSelect" id="sizeSelect" style="width:70px;">
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="34">34</option>
                                                    </select>
                                                    <input type="hidden" id="sizeChoice" value="28" />
                                                </div>
                                                <a class="hidden-xs" target="_blank" href="http://4menshop.com/huong-dan-chon-size.html" title="Huong dan chong size" style="margin:5px; font-size:12px; color:#FF0000; font-weight:bold;"> &raquo; Hướng dẫn chọn size</a> 
                                            </fieldset>
                                        </div>
                                        <p>
                                            <label class="m-w-68">Số lượng</label>
                                            <input class="text" style="width:70px; text-align:center;" type="number" min="1" max="10" value="1" id="quantityBuy" /> <span class="clearfix"></span> 
                                        </p>
                                        <div class="box-cart-bottom">
                                            <p class="buttons_bottom_block">
                                                <button type="button" id="buyNow" rel="7745" class=" btn btn-danger btn-buynow" value="Mua ngay" onclick="addToCart(<?php echo $product->ProductID; ?>)"> 
                                                    <i class="fa fa-shopping-cart "></i>
                                                    <span>Mua ngay</span>
                                                </button>
                                                <script>
                                                    function addToCart(id) {
                                                        var qty = $("#quantityBuy").val();
                                                        window.location = "cart/add/" + id + "/" + qty;
                                                    }
                                                </script>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p class="socialsharing_product list-inline box-info-product">
                            <div class="product-note"> <span><i class="fa fa-info"></i>Cam kết: </span> Hình ảnh sản phẩm được chụp từ mẫu thực. Chất lượng sản phẩm được sản xuất và thiết kế theo xu hướng thời trang 2017 của thương hiệu 4MEN(R) </div>
                            <div> <span style="float:left; padding-right:10px;"> <div class="fb-like" data-href="http://4menshop.com/quan-jeans-rach/quan-jean-rach-goi-den-qj1395-7745.html" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true" data-font="arial"> </div> </span> <span style="float:left"> <div class="g-plusone" data-size="medium"></div> </span>
                                <div style="clear:both;"></div>
                            </div>
                            </p>
                        </div>
                    </div>
                    <div class="moreinfo_block" class="clear">
                        <ul class="nav nav-tabs tab-info page-product-heading">
                            <li class="active">
                                <a data-toggle="tab" href="#idTab1">Mô tả sản phẩm</a>
                            </li>
                             <li>
                                <a data-toggle="tab" href="#reviews">Bình luận sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <section id="idTab1" class="page-product-box active">
                                <div class="rte">
                                    <br />
                                    <br /> <strong>Quần Jean Đen QJ1395</strong>
                                    <br />
                                    <br /> Quần Jean rách ngang gối<span style="font-family:sans-serif"> đang là hot trend trong giới trẻ hiện nay, được nhiều bạn trẻ ưa thích bởi tính thiết kế phá cách mới lạ. Với chất liệu Jean cao cấp, chắc chắn và bền đẹp, </span><strong>Quần Jean Đen QJ1395 </strong><span style="font-family:sans-serif">sẽ mang đến cho bạn một diện mạo cực kỳ thu hút mà vẫn không kém phần nam tính, phong cách.</span>
                                    <br />
                                    <br /> <img src="http://4menshop.com/images/2017/03/20170326_56f6695c7fdb126b911c9ac2a3acc639_1490537716.jpg" alt="Quần jean rách gối đen qj1395 - 1" />
                                    <br />
                                    <br /> <span style="font-family:sans-serif">- Màu đen mạnh mẽ và nam tính</span>
                                    <br /> <span style="font-family:sans-serif">- Chất liệu jean bền đẹp, không bị phai màu trong thời gian sử dụng<br /> - Sản phẩm có độ co dãn nhất định giúp bạn thoải mái và năng động hơn</span>
                                    <br /> <span style="font-family:sans-serif">- Thiết kế phá cách, mới lạ, mang nét nam tính</span>
                                    <br /> <span style="font-family:sans-serif">- Hai túi trước, sau có độ sâu rộng phù hợp rất tiện lợi</span>
                                    <br /> <span style="font-family:sans-serif">- Nút và khóa quần đều là kim loại không gỉ, giúp đạt chất lượng sử dụng tối ưu</span>
                                    <br /> <span style="font-family:sans-serif">- Màu sắc và kiểu dáng cho bạn tính ứng dụng rất cao</span>

                                </div>
                            </section>
                            <div class="tab-pane fade active in" id="reviews">
                                <div class="product-comment margin-bottom-40">
                                    <div class="product-comment-in">
                                        <img class="product-comment-img rounded-x" src="assets/img/team/01.jpg" alt="">
                                        <div class="product-comment-dtl">
                                            <h4>Mickel <small>22 days ago</small></h4>
                                            <p>I like the green colour, it's very likeable and reminds me of Hollister. A little loose though but I am very skinny</p>
                                            <ul class="list-inline product-ratings">
                                                <li class="reply"><a href="#">Reply</a></li>
                                                <li class="pull-right">
                                                    <ul class="list-inline">
                                                        <li><i class="rating-selected fa fa-star"></i></li>
                                                        <li><i class="rating-selected fa fa-star"></i></li>
                                                        <li><i class="rating-selected fa fa-star"></i></li>
                                                        <li><i class="rating fa fa-star"></i></li>
                                                        <li><i class="rating fa fa-star"></i></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="heading-md margin-bottom-30">Add a review</h3>
                                <form action="assets/php/demo-contacts-process.php" method="post" id="sky-form3" class="sky-form sky-changes-4">
                                    <fieldset>
                                        <div class="margin-bottom-30">
                                            <label class="label-v2">Name</label>
                                            <label class="input">
                                                <input name="name" id="name" type="text">
                                            </label>
                                        </div>

                                        <div class="margin-bottom-30">
                                            <label class="label-v2">Email</label>
                                            <label class="input">
                                                <input name="email" id="email" type="email">
                                            </label>
                                        </div>

                                        <div class="margin-bottom-30">
                                            <label class="label-v2">Review</label>
                                            <label class="textarea">
                                                <textarea rows="7" name="message" id="message"></textarea>
                                            </label>
                                        </div>
                                    </fieldset>

                                    <footer class="review-submit">
                                        <label class="label-v2">Review</label>
                                        <div class="stars-ratings">
                                            <input name="stars-rating" id="stars-rating-5" type="radio">
                                            <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                            <input name="stars-rating" id="stars-rating-4" type="radio">
                                            <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                            <input name="stars-rating" id="stars-rating-3" type="radio">
                                            <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                            <input name="stars-rating" id="stars-rating-2" type="radio">
                                            <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                            <input name="stars-rating" id="stars-rating-1" type="radio">
                                            <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                        </div>
                                        <button type="button" class="btn-u btn-u-sea-shop btn-u-sm pull-right">Submit</button>
                                    </footer>
                                </form>
                            </div>
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
                    <p class="title_block"> <a href="<?php //echo product_link($id, $name);     ?>" title="thoi trang hot nhat"> Thời trang hot nhất </a> </p>
                    <div class="block_content products-block">
                        <ul>
                            <?php foreach ($hottestProducts as $product): ?>
                                <li class="clearfix">
                                    <a class="products-block-image" href="<?php echo product_detail_link($product->ProductID, $product->ProductName); ?>" title="<?php echo $product->ProductName; ?>">
                                        <img class="replace-2x img-responsive" src="<?php echo product_img_url($product->Image); ?>" alt="<?php echo $product->ProductName; ?>" title="<?php echo $product->ProductName; ?>" width="60" /> </a>
                                    <div class="product-content">
                                        <h5> 
                                            <a class="product-name" href="<?php echo product_detail_link($product->ProductID, $product->ProductName); ?>" title="<?php echo $product->ProductName; ?>"> <?php echo $product->ProductName; ?> </a> 
                                        </h5>
                                        <div class="price-box"> <span class="price special-price"> <?php echo format_price($product->Price); ?> </span> </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div id="tags_block_left" class="block tags_block">
                    <p class="title_block"> Từ khóa thời trang </p>
                    <div class="block_content"> <a href="http://4menshop.com/ao-quan-nam.html" title="ao quan nam">Áo quần nam</a> <a href="http://4menshop.com/ao-so-mi-nam.html" title="ao so mi nam">Áo sơ mi nam</a> <a href="http://4menshop.com/ao-vest-nam.html" title="ao vest nam">Áo vest nam</a> <a href="http://4menshop.com/quan-kaki-nam.html" title="quan kaki nam">Quần kaki nam</a> <a href="http://4menshop.com/quan-jean-nam.html" title="quan jean nam">Quần jean nam</a> <a href="http://4menshop.com/quan-tay-nam.html" title="quan tay nam">Quần tây nam</a> <a href="http://4menshop.com/ao-khoac-da.html" title="ao da nam">Áo da nam</a> <a href="http://4menshop.com/ao-khoac-nam.html" title="ao khoac nam">Áo khoác nam</a> <a href="http://4menshop.com/ao-len-nam.html" title="ao len nam">Áo len nam</a> <a href="http://4menshop.com/quan-nam.html" title="quan nam">Quần nam</a> <a href="http://4menshop.com/ao-nam.html" title="ao nam">Áo nam</a> <a href="http://4menshop.com/ao-thun-nam.html" title="ao thun nam">Áo thun nam</a> <a href="http://4menshop.com/giay-nam.html" title="giay nam">Giày nam</a> <a href="http://4menshop.com/vi-da-nam.html" title="vi da nam">Ví da nam</a> <a href="http://4menshop.com/that-lung-nam.html" title="That lung nam">Thắt lưng nam</a> <a href="http://4menshop.com/quan-ao-nam.html" title="quan ao nam">Quần áo nam</a> <a href="http://4menshop.com/quan-jean-nam-ha-noi.html" title="quan jean nam ha noi">Quần jean nam Hà Nội</a> </div>
                </div>

            </div>
        </div>
        <div class="center_column" id="product_populary" style="clear:both;">
            <div class="heading heading-v1">
                <h2>Sản phẩm cùng danh mục</h2>
            </div>
            <div class="illustration-v2" style="margin-bottom: 60px">
                <div class="customNavigation margin-bottom-25">
                    <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                    <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
                </div>

                <ul class="list-inline owl-slider">
                    <?php
                    foreach ($products as $product):
                        $productLink = product_detail_link($product->ProductID, $product->ProductName);
                        ?>
                        <li class="item">
                            <div class="product-img">
                                <a href=<?php echo $productLink; ?>><img style="width:265px; height: 345px" class="full-width img-responsive" src=<?php echo product_img_url($product->Image) ?> alt=""></a>
                                <a class="product-review" href=<?php echo $productLink; ?>>Xem chi tiết</a>
                                <a class="add-to-cart" href="<?php echo "cart/add/$product->ProductID"; ?>"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                            <div class="product-description product-description-brd">
                                <div class="overflow-h margin-bottom-5">

                                    <h4 class="title-price">
                                        <a href=<?php echo $productLink; ?>>
                                            <?php echo $product->ProductName; ?>
                                        </a>
                                    </h4>

                                    <div class="product-price">
                                        <?php echo format_price($product->Price); ?>
                                    </div>
                                </div>

                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
