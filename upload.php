<?php
require "nav.php";
require "con.php";
if(isset($_POST['upload'])){
$img_name = $_FILES['image']['name'];
$img_temp = $_FILES['image']['tmp_name'];
$img_size = $_FILES['image']['size'];
$ext = explode(".",$img_name);
$end = end($ext);
$allowed_ext = array("jpg","png","jpeg","gif");
$name = time().".".$end;
$path = "upload_img/".$name;
if(in_array($end,$allowed_ext)){
    if($img_size>5000000){
        echo"<script> alert('Size is greater than 5 MB')</script>";
        echo "<script> window.location = 'index.php'</script>";
    }else{
    
    if (move_uploaded_file($img_temp,$path)){
        mysqli_query($con, "INSERT INTO `art gallery` VALUES ('','$name','$path')");

        echo"<script>alert('uploaded')</script>";
        echo"<script>window.location = 'upload.php'</script>";
    }
    }
}else{
    echo"<script> alert('Invalid format')</script>";
    echo "<script> window.location = 'index.php'</script>";

}
}
?>


<div class="container-fluid d-flex align-items-center">
<div class="col-md-3"></div>
<div class="col-md-6">


<form method="POST" action=""  enctype="multipart/form-data">
<h3 class="text-info"> to upload pic </h3>

<hr style="border-top:2px dotted #ccc ;"/>

<div class="form-inline">
<label>add pic</label>
<input type="file" name="image" class="form-control form-control-lg" required="required"/>
<br>
<button class="btn btn-outline-primary" name="upload">upload</button>
</div>
</form>

</div>
</div>