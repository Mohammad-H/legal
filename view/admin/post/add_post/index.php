<div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">افزودن پست</h3></div>
    <div class="panel-body">
        <?php //if (isset($_GET['empty'])) echo "require title and image <br>"; ?>
        <form id="fpost">
            <div class="form-group">
                <label>عنوان پست</label><br/>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <span>تصویر عنوان</span><br/><span class="format-pic">(jpg/jpeg/png/gif)</span>
                <input type="file" class="form-control" name="image" style="width: 205px;margin: 0 auto;"><br/>
            </div>
            <div class="form-group">
                <label>نام جایگزین تصویر(alt)</label>
                <input type="text" name="alt_image" class="form-control">
            </div>
            <div class="form-group">
                <label>دسته بندی</label>
                <?php
                $category = $data['category'];
                ?>
                <select name="categury" id="categury" class="form-control">
                    <option value="">یک دسته بندی انتخاب کنید</option>
                    <?php
                    foreach ($category as $row) {
                        ?>

                        <option value="<?= $row['id']; ?>">
                            <?= $row['title'] ?>
                        </option>

                    <?php } ?>
                </select>
            </div><br/>
            <div class="form-group">
                <label>محتوای پست</label><br>
                <textarea name="detail" class="ckeditor detail" id="editor"></textarea>
            </div>
            <div class="form-group">
                <label>برچسب</label>
                <input type="text" name="tags" id="tags" class="form-control" placeholder="برچسب ها را نوشته و enter بزنید" >
            </div>
            <div class="form-group">
                <label>وضعیت</label>
                <select name="approve" class="form-control" id="approve">
                    <option value="0">پیش نویس</option>
                    <option value="1">انتشار</option>
                </select>
            </div>
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="افزودن"><br/><br/>
        </form>
        <div class="insertok" style="display: none"></div>
        <div class="inserterr" style="display: none"></div>
    </div>
</div>