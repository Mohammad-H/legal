<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">دسته بندی ها</h3></div>
    <div class="panel-body">
        <?php if (isset($_GET['emp'])) echo "require title"; ?>
        <form action="admincategury/addcategury" method="post">
            <div class="form-inline">
                <div class="form-group">
                    <input type="text" id="" name="title" class="form-control" placeholder="نام دسته بندی">
                </div>&nbsp
                <div class="form-group">
                    <select name="parent" id="">
                        <option value="0">بعنوان سر دسته ثبت شود</option>
                        <?php
                            $cat = $data['categury'];
                            foreach ($cat as $row){
                        ?>
                        <option value="<?= $row['id']; ?>"><?= $row['title']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button id="" name="submit" class="btn btn-xs btn-success">افزودن</button>
            </div>
        </form>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td width="25%">نام دسته بندی</td>
                    <td width="25%">زیرمجموعه ی دسته بندی</td>
                    <td width="25%">حذف</td>
                </tr>
                <?php
                foreach ($cat as $rows){
                ?>
                <tr>
                    <td contenteditable><?= $rows['title']; ?></td>
                    <?php
                    $parent = $rows['parent'];
                    if($rows['parent'] != 0)
                    {
                    ?>
                    <td><?= $rows['title']; ?></td>
                    <?php }else{ ?>
                        <td>-</td>
                    <?php } ?>
                    <td><a class="btn btn-xs btn-danger">x</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div id="shows_message"></div>
        <div id="test_cat"></div>
    </div>
</div>