<?php $user = $this->session->userdata('login');
?>
<div class="topNav">
    <div class="wrapper">
        <div class="welcome">
            <span>Xin chào: <b><?php echo $user->Name?></b></span>
        </div>

        <div class="userNav">
            <ul>
                <li><a href="" target="_blank">
                        <img style="margin-top:7px;" src="public/admin/images/icons/light/home.png" />
                        <span>Trang chủ</span>
                    </a></li>

                <!-- Logout -->
                <li><a href="<?php echo admin_url('account/logout') ?>">
                        <img src="public/admin/images/icons/topnav/logout.png" alt="" />
                        <span>Đăng xuất</span>
                    </a></li>

            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>