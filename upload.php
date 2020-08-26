
<?php
$target_dir = "/";
$target_file = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$uploadOk = 1;
}
?>
