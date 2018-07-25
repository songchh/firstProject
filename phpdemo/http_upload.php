<?php 
echo "<pre>";
print_r($_FILES);
echo "</pre>";
$path = "E:/Program Files (x86)/upload/";
$upFile = $_FILES['pic'];

if ($upFile['error'] > 0) {
    exit('upload error');
}

$fileName = $upFile['name'];

if(is_uploaded_file($upFile["tmp_name"])){
    if(move_uploaded_file($upFile["tmp_name"],$path.$fileName)){
        echo "文件上传成功!";
    }else{
        die("上传文件失败！");
    }
}else{
    die("不是一个上传文件!");
}