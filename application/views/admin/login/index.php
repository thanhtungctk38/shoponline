<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('admin/shared/head') ?>
    </head>
    <body class="nobg loginPage" style="min-height:100%;">
        <div class="loginWrapper" style="top:45%;">

            <div class="widget" id="admin_login" style="height:auto; margin:auto;">
                <div class="title"><img src="images/icons/dark/laptop.png" alt="" class="titleIcon" />
                    <h6>Đăng nhập</h6>
                </div>

                <form class="form" id="form" action="" method="post">
                    <fieldset>
                        <div class="formRow">
                            <label for="param_username">Tên đăng nhập:</label>
                            <div class="loginInput">
                                <input type="text" name="username" id="param_username" value="<?php echo set_value('username')?>" />
                            </div>
                            <div class="clear"></div>
                            <div class="error" id="username_error"><?php echo form_error('username') ?> </div>
                        </div>

                        <div class="formRow">
                            <label for="param_password">Mật khẩu:</label>
                            <div class="loginInput">
                                <input type="password" name="password" id="param_password" value="<?php echo set_value('password')?>"/></div>
                            <div class="clear"></div>
                            <div class="error" id="password_error"><?php echo form_error('password');?></div>
                        </div>
                        <div style="margin-left:15px;color:red"><?php echo form_error('login') ?></div>
                        <div class="loginControl">

                            <input type='hidden' name="submit" value='1'/>
                            <input type="submit"  value="Đăng nhập" class="dredB logMeIn" name="login" />
                            <div class="clear"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div id="footer">
            <?php $this->load->view('admin/shared/footer'); ?>
        </div>
    </body>
</html>
