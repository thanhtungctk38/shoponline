<!-- Main content -->
<!-- Common view -->
<!--Load head-->
<?php $this->load->view('admin/account/head'); ?>

<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper">
    <div class="widget">

        <div class="title">
            <span class="titleIcon">
                <input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>Danh sách tài khoản</h6>
            <div class="num f12">Tổng số: <b><?php echo $total; ?></b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
                <tr>
                    <td style="width:10px;"><img src="public/admin/images/icons/tableArrows.png" /></td>
                    <td style="width:80px;">Mã số</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Điện thoại</td>
                    <td>Địa chỉ</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                                <span style='color:white;'>Xóa hết</span>
                            </a>
                        </div>

                        <div class='pagination'>
                        </div>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                <?php foreach ($list as $row):?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->MaTK?>" /></td>
                    <td class="textC"><?php echo $row->MaTK;?></td>
                    <td>
                        <span title="<?php echo $row->HoTen?>" class="tipS">
                            <?php echo $row->HoTen?>					
                        </span>
                    </td>


                    <td><span title="<?php echo $row->Email?>" class="tipS">
                            <?php echo $row->Email?>					
                        </span>
                    </td>

                    <td>
                       <?php echo $row->SoDienThoai?>						
                    </td>

                    <td>
                        <?php echo $row->DiaChi?>						
                    </td>


                    <td class="option">
                        <a href="user/edit/19.html" title="Chỉnh sửa" class="tipS ">
                            <img src="public/admin/images/icons/color/edit.png" />
                        </a>

                        <a href="user/del/19.html" title="Xóa" class="tipS verify_action" >
                            <img src="public/admin/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
        </tbody>
        </table>

    </div>
</div>
<div class="clear mt30"></div>