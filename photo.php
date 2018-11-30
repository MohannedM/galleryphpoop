<?php require_once("admin/includes/init.php"); ?>
<?php 

$photo = Photo::find_by_id($_GET['id']);

if(empty($_GET['id'])){
    header("Location: index.php");
}

if(isset($_POST['submit'])){
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if($new_comment && $new_comment->save()){
        header("Location: photo.php?id={$photo->id}");
    } else {
        $message = "There was probably a poblem";
    }
} else {
    $author = "";
    $body = "";
}

$comments = Comment::find_the_comment($photo->id);


 ?>

<?php include("includes/header.php"); ?>



        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Mohanned Farahat</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->





                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>






                <hr>
                <?php foreach($comments as $comment): ?>
                <!-- Posted Comments -->

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment->author; ?>
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                <?php echo $comment->body; ?>
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    <?php endforeach; ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->
        <!-- <div class="col-md-4">
        
            
                 <?php //include("includes/sidebar.php"); ?>
        
        
        
        </div> -->
        <!-- /.row -->
    </div>

        <?php include("includes/footer.php"); ?>

     