<?php include("includes/header.php"); ?>
<?php 
if(!$session->is_signed_in()){
    header("Location: login.php");
}
?>
<?php 
$photos = Photo::find_all(); 
 ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Top Menu Items -->
                
                <?php include("includes/top_nav.php"); ?>
                 

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <?php include("includes/side_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Photos
                            <small></small>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Photo Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Comments Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($photos as $photo) : ?>
                                    <tr>
                                        <td>
                                            <img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">
                                            <div class="action_links">
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                            </div>
                                        </td>

                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->description; ?></td>
                                        <td><?php echo $photo->type; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                        <td class="text-center"><a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                                            <?php
                                             $comments = Comment::find_the_comment($photo->id);
                                             echo count($comments);

                                              ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>