<!-- The left -->
<div class='col-md-3 left'>
    <div class="box-left">
        <div class="title tittle-box-left">
            <h2> Tìm kiếm theo giá </h2>
        </div>
        <div class="content-box" ><!-- The content-box -->
            <form class="t-form form_action" method="get" style='padding:10px' action="product/search_by_price" name="search" >
                <div class="form-row">
                    <label for="param_price_from" class="form-label" style='width:70px'>Giá: <span class="req">*</span></label>
                    <div class="form-item"  style='width:90px'>
                        <select  class="input" id="price_from" name="price" >
                            <option value="Below100">Dưới 100 ngàn</option>
                            <option value="100To300">Từ 100 đến 300 ngàn</option>
                            <option value="300To500">Từ 300 đến 500 ngàn</option>
                            <option value="500To1">Từ 500 ngàn đến 1 triệu</option>
                            <option value="Above1">Trên 1 triệu</option>
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>


                <div class="form-row">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-item">
                        <input type="submit" class="button"  value="Tìm kiềm" style='height:30px !important;line-height:30px !important;padding:0px 10px !important'>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
        </div><!-- End content-box -->
    </div>
    <div class="box-left">
        <div class="title tittle-box-left">
            <h2> Danh mục sản phẩm </h2>
        </div>
        <div class="content-box"><!-- The content-box -->
            <ul id="category_menu" class="metismenu catalog-main" style="display:block;">
                <?php foreach ($categories as $row): ?>
                    <li>
                        <a href="<?php echo product_link($row->CategoryID, $row->CategoryName); ?>" aria-expanded="false">
                            <?php echo $row->CategoryName; ?>
                            <span class="fa plus-minus"></span>
                        </a>
                        <!-- lay danh sach danh muc con -->
                        <?php if (count($row->subs) > 1): ?>
                            <ul class="catalog-sub"> 
                                <?php foreach ($row->subs as $sub): ?>
                                    <li>
                                        <a href="<?php echo product_link($sub->CategoryID, $sub->CategoryName); ?>" title=""> 
                                            <?php echo $sub->CategoryName; ?>
                                        </a>
                                    </li>		

                                <?php endforeach; ?>

                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>	    </div><!-- End content-box -->
    </div>
    <!-- The Support -->
    <div class="box-left">
        <div class="title tittle-box-right">
            <h2> Hỗ trợ trực tuyến </h2>
        </div>
        <div class="content-box">
            <div class='support'>

                <p>
                    <img style="margin-bottom:-3px" src="public/site/images/phone.png"> 01665761394 </p>

                <p>
                    <a rel="nofollow" href="mailto:ngthtung2805@gmail.com">
                        <img style="margin-bottom:-3px" src="public/site/images/email.png"> Email: ngthtung2805@gmail.com
                        </p>
                        <p>
                            <a rel="nofollow" href="skype:thanhtungctk38">
                                <img style="margin-bottom:-3px" src="public/site/images/skype.png"> Skype: thanhtungctk38			</a>
                        </p>	
            </div>			        
        </div>
    </div>
    <!-- End Support -->


    <!-- The Ads -->
    <div class="box-left">
        <div class="title tittle-box-right">
            <h2> Quảng cáo </h2>
        </div>
        <div class="content-box">
            <a href="">
                <img  src="public/site/images/ads.png" >
            </a>
            <hr>
            <a href="http://cntt.dlu.edu.vn" target="_blank">
                <img  src="public/site/images/itdlu-ads.png">
            </a>
            <hr>
            <a href="http://dammio.com" target="_blank">
                <img  src="public/site/images/dammio-ads.png">
            </a>
        </div>
    </div>
    <!-- End Ads -->

    <!-- The Fanpage -->
    <div class="box-left">
        <div class="title tittle-box-right">
            <h2> Fanpage </h2>
        </div>
        <div class="content-box">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdammiodotcom%2F&tabs=timeline&width=260&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=452453958426171" width="260" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
    </div>
    <!-- End Fanpage -->

    <!-- The Fanpage -->
    <div class="box-left">
        <div class="title tittle-box-right">
            <h2> Thống kê truy cập </h2>
        </div>
        <div class="content-box">
            <center>
                <!-- Histats.com  START  (standard)-->
                <script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
                <a href="http://www.histats.com" target="_blank" title="hit counter" ><script  type="text/javascript" >
                    try {
                        Histats.start(1, 2138481, 4, 401, 118, 80, "00011111");
                        Histats.track_hits();
                    } catch (err) {
                    }
                    ;
                    </script></a>
                <noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2138481&101" alt="hit counter" border="0"></a></noscript>
                <!-- Histats.com  END  -->
            </center>                
        </div>
    </div>
    <!-- End Fanpage -->
</div>
<!-- End left -->