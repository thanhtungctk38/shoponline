<?php $this->load->view('admin/category/head'); ?>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <img src="public/admin/images/icons/dark/add.png" class="titleIcon" />
            <h6>Chỉnh sửa danh mục sản phẩm</h6>
        </div>
        <form class="form" id="form" action="admin/category/edit/<?php echo $info->CategoryID;?>" method="post"  >
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên danh mục </label>
                    <div class="formRight">
                        <div class="oneTwo">
                            <input type="text"   id="param_name" name="categoryname" value="<?php echo $info->CategoryName; ?>">
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Chọn danh mục cha:</label>
                    <div class="formRight">
                        <select name="parent" id="myselect">
                            <option value="">Là danh mục cha</option>
                            <?php foreach ($list as $row): ?>
                                <option value="<?php echo $row->CategoryID ?>" 
                                <?php
                                if ($row->CategoryID == $info->ParentID) {
                                    echo 'selected="true"';
                                };
                                ?>>
                                            <?php echo $row->CategoryName ?>
                                </option>
                            <?php endforeach; ?>
                        </select>  
                    </div>             
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Mô tả</label>
                    <div class="formRight">
                        <div class="oneTwo">
                            <textarea rows="5" cols="2" name="description" style="overflow: hidden;"></textarea>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input value="Chỉnh sửa" class="redB" type="submit">
                    <input value="Hủy bỏ"  class="basic" type="reset">
                </div>

            </fieldset>
        </form>
    </div>
</div>
