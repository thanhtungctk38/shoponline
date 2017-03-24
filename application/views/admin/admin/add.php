<?php $this->load->view('admin/admin/head'); ?>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img src="public/admin/images/icons/dark/add.png" class="titleIcon" />
            <h6>Thêm mới tài khoản</h6>
        </div>
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên đăng nhập</label>
                    <div class="formRight">
                        <div class="oneTwo">
                            <input type="text"  id="param_name" name="TenDN">
                        </div>
                        <div name="image_list_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Mật khẩu</label>
                    <div class="formRight">
                        <div class="oneTwo">
                            <input type="text"  id="" name="MatKhau">
                        </div>
                        <div name="image_list_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label class="formLeft">Họ và tên</label>
                    <div class="formRight">
                        <div class="oneTwo">
                            <input type="text"  id="" name="HoTen" >
                        </div>
                        <div name="image_list_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
