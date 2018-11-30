<?php include("includes/init.php"); ?>
<?php 
if(!$session->is_signed_in()){
    header("Location: login.php");
}
 ?>

<?php 

if(empty($_GET['id'])){
    header("Location: users.php");
}

$user = User::find_by_id($_GET['id']);

if($user){
    $user->delete();
    header("Location: users.php");
} else {
    header("Location: index.php");
}



 ?>