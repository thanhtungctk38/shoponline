<div class="row">
    <?php $this->load->view('site/shared/left'); ?>
    <!-- The content -->
    <div class='col-md-9 content'> 
        <div class="clear pb20"></div>  

        <div class="box-center"><!-- The box-center product-->
            <div class="tittle-box-center">
                <h2><?php echo $title; ?>&nbsp;&nbsp;  </h2>
                <span class="badge"> <?php echo $totalRows; ?></span>
            </div>
            <div class="box-content-center product">
                <?php
                $i = 0;
                if (count($listProducts) == 0) {
                    echo "<h2 style='padding-left:20px'>Không có sản phẩm nào</h2>";
                } else {
                    foreach ($listProducts as $row):
                        $productLink = product_detail_link($row->ProductID, $row->ProductName);
                        if ($i % 5 == 0) {
                            echo '<div class="row">';
                        }
                        ?>
                        <div class='product_item item'>
                            <div class='product_img'>
                                <a  href="<?php echo $productLink; ?>">
                                    <img src="<?php echo product_img_url($row->Image); ?>" alt='<?php echo $row->ProductName; ?>'/>
                                </a>
                            </div>
                            <h3>
                                <a  href="<?php echo $productLink; ?>">
                                    <?php echo $row->ProductName; ?>                
                                </a>
                            </h3>
                            <p class='price'>
                                <?php echo format_price($row->Price); ?>
                            </p>
                            <center>
                                <div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
                            </center>
                            <div class='action'>
                                <a class='button' href="cart/add/<?php echo $row->ProductID; ?>" title='Mua ngay'>Mua ngay</a>
                                <div class='clear'></div>
                            </div>
                        </div>
                        <?php
                        $i++;
                        if ($i % 5 == 0) {
                            echo '</div>';
                        }
                    endforeach;
                }
                ?>
             
                <div class='clear'></div>
                   <div class="pagination">
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>  

    </div>
    <!-- End content -->


    <!-- End right -->
    <div class="clear"></div>
</div>