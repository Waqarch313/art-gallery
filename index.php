<?php
require 'nav.php';
require 'con.php';

$query = mysqli_query($con,"SELECT * FROM `art gallery`") or die(mysqli_error());
while($row = mysqli_fetch_array($query)){
?>
<div class="gallery">
<div class="container marketing">
<div class="row">
<div class="col-lg-4">
<a href="<?php echo $row['location']?>"><img src="<?php echo $row['location']?>"
width="200" height="200"/></a>
</div>
</div>
</div>
</div>
<?php 
}
?>
}
