<?php
$getpost = $data['post'];
if (isset($_POST['delItem'])) print_r($_POST['delItem']);
?>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">پست</h3></div>
    <div class="panel-body">
        <a class="btn btn-info" href="adminpost/addpost" role="button">افزودن پست جدید</a>
        <br/><br/>
        <div class="table-responsive">
            <form action="adminpost/deleteGrouppost" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td width="10%">ردیف</td>
                        <td width="70%">نام پست</td>
                        <td width="10%">ویرایش</td>
                        <td width="10%">
                            <input type="submit" name="groupdelete"
                               id="groupdelete" value="حذف"
                                class="btn btn-danger btn-sm">
                        </td>
                    </tr>
                    <?php foreach ($getpost as $row){ ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><a href="adminpost/editpost/<?= $row['id']; ?>">ویرایش</a></td>
                        <td><input type="checkbox" name="delItem[]" value="<?= $row['id']; ?>"></td>
                    </tr>
                    <?php } ?>
                </table>
            </form>
        </div>
    </div>
</div>