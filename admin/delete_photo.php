<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()){
    header("Location: login.php");
}
 ?>

<?php 

if(empty($_GET['id'])){
    header("Location: photos.php");
}

$photo = Photo::find_by_id($_GET['id']);

if($photo){
    $photo->delete();
    header("Location: photos.php");
} else {
    header("Location: index.php");
}



 ?>