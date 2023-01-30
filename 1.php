<?php
var_dump($_FILES['image-post']);
$donwld='./images/';
$upload=$donwld.basename($_FILES['image-post']['name']);
if ((isset($_FILES))&& move_uploaded_file($_FILES['image-post']['tmp_name'],$upload)){
    echo "файл загружен";
} else echo "Не загружен";

?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="image-post">
    <input type="submit" value="отправить">
</form>
