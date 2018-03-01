<?php

$output = '';
Model::$conn->prepare();
$cat = new Cat();
$res = $cat->read();
$output .= '<div class="form-inline">
                <div class="form-group">
                    <input type="text" id="cat_name" class="form-control" placeholder="نام دسته بندی">
                </div>&nbsp;';
$output .= '<div class="form-group">
                    <select name="cat" id="cat">
                        <option value="0">بعنوان سر دسته ثبت شود</option>';
$slid = new Cat();
$res20 = $slid->read();
while ($rows = $res20->fetch(PDO::FETCH_ASSOC)) {
    $output .= '<option value="' . $rows['id'] . '">' . $rows['cat_name'] . '</option>';
}
$output .= '</select>
                </div>
                <button id="add_cat" class="btn btn-xs btn-success">افزودن</button>
            </div>
                &nbsp;
		<div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                        <td width="25%">نام دسته بندی</td>
                        <td width="25%">زیرمجموعه ی دسته بندی</td>';
// <td width="25%">لینک</td>
$output .= '<td width="25%">حذف</td>
                </tr>';
if ($res->rowCount() > 0) {
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $output .= '<tr>
                    <td class="cat_name" data-id1="' . $row['id'] . '" contenteditable>' . $row['cat_name'] . '</td>';
        $id = $row['parent'];
        $sl = new Cat();
        $result = $sl->read_by_id($id);
        $fetch = $result->fetch(PDO::FETCH_ASSOC);
        if ($row['parent'] != 0) {
            $output .= '<td>' . $fetch['cat_name'] . '</td>';
        } else {
            $output .= '<td> - </td>';
        }
        $output .= '<td><button class="delete_cat btn btn-xs btn-danger" data-id3="' . $row['id'] . '" >x</button></td>
                </tr>';
    }
} else {
    $output .= '<tr><td colspan=3>دسته بندی تاکنون ثبت نشده است.</td></tr>';
}
$output .= '</table></div>';
echo $output;
?>