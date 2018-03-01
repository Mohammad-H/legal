<?php
$postinfo = $data['postinfo'];
?>
<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">افزودن پست</h3></div>
    <div class="panel-body">
        <?php if (isset($_GET['empty'])) echo "require title <br>"; ?>
        <form action="adminpost/editpost/<?= $postinfo['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>عنوان پست</label><br/>
                <input type="text" class="form-control" name="title" value="<?= $postinfo['title']; ?>">
            </div>
            <div class="form-group">
                <span>تصویر عنوان</span><br/><span class="format-pic">(jpg/jpeg/png/gif)</span>
                <input type="file" class="form-control" name="image" style="width: 205px;margin: 0 auto;"><br/>
                <img src="public/img/post/<?= $postinfo['image'] ?>" alt="">
                <input type="hidden" name="oldimg" value="<?= $postinfo['image']; ?>" id="">
            </div>
            <div class="form-group">
                <label>نام جایگزین تصویر(alt)</label>
                <input type="text" name="alt_image" class="form-control" value="<?= $postinfo['alt_image']; ?>">
            </div>
            <div class="form-group">
                <label>دسته بندی</label>
                <?php
                $category = $data['categury'];
                $iscat = $postinfo['categury'];
                ?>
                <select name="categury" id="" class="form-control">
                    <option value="">یک دسته بندی انتخاب کنید</option>
                    <?php
                    foreach ($category as $row) {
                        if($row['id'] == $iscat)
                        {
                            $selected = 'selected';
                        }else{
                            $selected = '';
                        }
                        ?>

                        <option value="<?= $row['id']; ?>" <?= $selected; ?>>
                            <?= $row['title']; ?>
                        </option>

                    <?php } ?>
                </select>
            </div><br/>
            <div class="form-group">
                <label>محتوای پست</label><br>
                <textarea name="detail" class="ckeditor" id="editor"><?= $postinfo['detail']; ?></textarea>
            </div>
            <div class="form-group">
                <label>برچسب</label>
                <input type="text" name="tags" id="tags" value="<?= $postinfo['tags']; ?>" class="form-control" placeholder="برچسب ها را نوشته و enter بزنید" >
            </div>
            <div class="form-group">
                <label>وضعیت</label>
                <select name="approve" class="form-control">
                    <option value="0" <?php if($postinfo['approve'] ==0) echo "selected";  ?>>پیش نویس</option>
                    <option value="1" <?php if($postinfo['approve'] ==1) echo "selected";  ?>>انتشار</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-info" value="افزودن"><br/><br/>
        </form>
    </div>
</div>