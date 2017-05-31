<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- tabs left -->
            <div class="tabbable">
                <ul class="nav nav-pills nav-stacked col-md-2">
                    <li class="active"><a href="#private-information" data-toggle="tab">Thông tin cá nhân</a></li>
                    <li><a href="#orders" data-toggle="tab">Danh sách đơn hàng</a></li>
                </ul>
                <div class="tab-content col-md-10">
                    <?php $this->load->view('site/message'); ?>
                    <div class="tab-pane active" id="private-information">
                        <div class="col-sm-6">
                            <form id="sky-form1" class="log-reg-block sky-form account" action="customer/account" method="post">
                                <h2 style="text-align: left">Thông tin cá nhân</h2>

                                <div class="row">
                                    <label class="col-lg-4" for="param_name">Họ và tên</label>
                                    <div class="input login-input col-lg-8">
                                        <input id="param_name" type="text" name="name" class="form-control" value="<?php echo $customer->CustomerName; ?>">
                                        <div class="clear error" name="name_error"><?php echo form_error('name') ?></div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_email">Email</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_email" type="email"  name="email" class="form-control" value="<?php echo $customer->Email; ?>">
                                        <div class="clear error" name="email_error"><?php echo form_error('email') ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_birthday">Ngày sinh</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_birthday" type="text" id="datepicker"  name="birthday" class="form-control" value="<?php echo date('d-m-Y', strtotime($customer->Birthday)); ?>">
                                        <div class="clear error" name="birthday_error"><?php echo form_error('birthday') ?></div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_gender">Giới tính</label>
                                    <div class=" col-lg-8">
                                        <div class="radio-inline">
                                            <label><input type="radio" name="gender" value="male"<?php echo ($customer->Gender == 1) ? 'checked' : '' ?>>Nam</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="gender" value="female" <?php echo ($customer->Gender == 0) ? 'checked' : '' ?>>Nữ</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_address">Địa chỉ</label>
                                    <div class="input login-input col-lg-8">
                                        <textarea  id ="param_address" name="address" class="form-control" cols="5" value=""><?php echo $customer->Address ?></textarea>
                                        <div class="clear error" name="address_error"><?php echo form_error('address') ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_phone">Số điện thoại</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_phone" type="text"  name="phone" class="form-control" value="<?php echo $customer->Phone; ?>">
                                        <div class="clear error" name="phone_error"><?php echo form_error('phone') ?></div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-lg-4"></label>
                                    <div class="col-lg-6">
                                        <button class="btn btn-danger" style="background: #BD0103" type="submit" name="submit" value="update">Cập nhật</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form id="sky-form1" class="log-reg-block sky-form account" action="customer/account" method="post">
                                <h2 style="text-align: left">Thay đổi mật khẩu</h2>
                                <div class="row">
                                    <label class="col-lg-4" for="param_password">Nhập mật khẩu cũ</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_password" type="password"  name="oldpassword" class="form-control" value="<?php echo set_value('password') ?>">
                                        <div class="clear error" name="password_error"><?php echo form_error('oldpassword') ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_repassword">Nhập mật khẩu mới</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_repassword" type="password"  name="newpassword" class="form-control" value="<?php echo set_value('repassword') ?>">
                                        <div class="clear error" name="repassword_error"><?php echo form_error('newpassword') ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-4" for="param_repassword">Nhập lại mật khẩu mới</label>
                                    <div class="input login-input col-lg-8">
                                        <input id ="param_repassword" type="password"  name="renewpassword" class="form-control" value="<?php echo set_value('repassword') ?>">
                                        <div class="clear error" name="repassword_error"><?php echo form_error('renewpassword') ?></div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-lg-4"></label>
                                    <div class="col-lg-6">
                                        <button class="btn btn-danger" style="background: #BD0103" type="submit" name="submit" value="update-password">Cập nhật</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="tab-pane" id="orders">
                        <h2>Danh sách đơn hàng đã đặt</h2>
                        <table width="100%" border="1">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Sản phẩm</th>
                            </tr>


                            <?php foreach ($orders as $row): ?>
                                <tr>
                                    <td><?php echo $row->OrderID ?></td>
                                    <td>
                                        <?php
                                        foreach ($row->Details as $value) {
                                            echo $value->ProductName .' SL:'.$value->Quantity.'<br>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </table>
                    </div>
                </div>
            </div>
            <!-- /tabs -->
        </div>



    </div>
    <!-- /row -->
</div>
