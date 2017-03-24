<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/shared/head');?>
    </head>
    <body >
        <div id="leftSide">
            <?php $this->load->view('admin/shared/left');?>
        </div>
        <div id="rightSide">
            <!--TOP NAV-->
            <?php $this->load->view('admin/shared/header');?>
            <?php $this->load->view($temp, $this->data);?>
            <?php $this->load->view('admin/shared/footer')?>
        </div>
    </body>
</html>
