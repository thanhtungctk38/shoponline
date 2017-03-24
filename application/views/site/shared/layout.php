<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('site/shared/head');?>
    </head>
    <body class="header-fixed">
        <div class="wrapper">
            <div class="header-v5 header-static">
                <?php $this->load->view('site/shared/header');?>
            </div>
            <div class="content">
                <?php $this->load->view($temp);?>
            </div>
            <div class="footer-v4">
                <?php $this->load->view('site/shared/footer');?>
            </div>
        </div>
        <!--Script-->
        <?php $this->load->view('site/shared/script')?>
        <!--End script-->
    </body>
    
</html>
