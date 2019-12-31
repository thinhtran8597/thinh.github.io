<?php include  "includes/db.php"; ?>
<?php include  "includes/navigation.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <?php
                $query = " SELECT * FROM posts";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr( $row['post_content'], 0, 100);
                    $points = $row['points'];
                    $post_status = $row['post_status'];

                 ?>


                <h1 class="page-header">
                    Best Songs,
                    <small> recommend</small>
                </h1>

                <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id ;?>"><?php echo $post_title?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author?></a>
                    </p>
                    <p class="date"><span class="glyphicon glyphicon-time "></span> <?php echo $post_date?></p>
                    <hr>
                    <div id="wrap_img">
                    <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                    </div>
                    <hr>
                    <p><?php echo $post_content?></p>
                    <div class="click">
                        <p class="points"><span><?php echo $points?></span> points</p>
                        <a class="button-like" data-post-id="<?php echo $post_id?>">
                            <i class=" fas fa-arrow-alt-circle-up icon-arrowup"></i>
                        </a>
                        <a class="button-unlike" data-post-id="<?php echo $post_id?>">
                            <i class=" fas fa-arrow-alt-circle-down icon-arrowdown"></i>
                        </a>
                    </div>

                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>

                <?php  } ?>
                <!-- Third Blog Post -->


                <!-- Pager -->
<!--                <ul class="pager">-->
<!--                    <li class="previous">-->
<!--                        <a href="#">&larr; Older</a>-->
<!--                    </li>-->
<!--                    <li class="next">-->
<!--                        <a href="#">Newer &rarr;</a>-->
<!--                    </li>-->
<!--                </ul>-->

            </div>

            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>



        <script language="javascript">
            // $.ajax({
            //     url: 'http://localhost:8888/cms/admin/includes/text.php',
            //     success: function(result) {
            //         var data = JSON.parse(result);
            //         console.log(data.success);
            //         console.log(data.data);
            //     }
            // });

            $(".button-like").click(function() {
                var postId = $(this).attr('data-post-id');
                var point = $(this).closest('.click').find('.points > span').html();
                $(this).closest('.click').find('.points > span').html(parseInt(point) + 1);
                $(this).css('pointer-events','none');
                console.log(postId);
                $.ajax({
                    url: 'http://localhost:8888/cms/admin/includes/test.php',
                    success: function(result) {
                        // var data = JSON.parse(result);
                        // console.log(data.success);
                        // console.log(data.data);
                        console.log(result);
                    },
                    data:{
                        post_id: postId,
                        count: 1
                    },
                    type: "post"
                })
            });

            $(".button-unlike").click(function() {
                var postId = $(this).attr('data-post-id');
                var point = $(this).closest('.click').find('.points > span').html();
                $(this).closest('.click').find('.points > span').html(parseInt(point) - 1);
                $(this).css('pointer-events','none');
                console.log(postId);
                 $.ajax({
                    url: 'http://localhost:8888/cms/admin/includes/test.php',
                    success: function(result) {
                        // var data = JSON.parse(result);
                        // console.log(data.success);
                        // console.log(data.data);

                        console.log(result);

                    },
                    data:{
                        post_id: postId,
                        count: -1
                    },
                    type: "post"

                })
            });
        </script>



<style>
    #wrap_img {
        max-width: 400px;
        display: block;
        margin: auto;
    }

    .icon-arrowup {
        position: inherit;
        margin-bottom: 10px;
        margin-right: 5px;
        font-size: 40px;
        top: 10px;
        color: #2e6da4;
    }

    .icon-arrowup:hover{
    color: #286090;
    }

    .icon-arrowdown {
        position: inherit;
        margin-bottom: 10px;
        margin-right: 5px;
        font-size: 40px;
        top: 10px;
        color: #2e6da4;
    }

    .icon-arrowdown:hover{
        color: #286090;
    }

    .points {
        color: #7F7F7F;
    }
    .click .points:hover {
        color: #222222;
    }

    a:hover {
        text-decoration: none;
    }

    .date {
    color: #7F7F7F;
    }

    .date:hover {
    color: #222222;
    }

</style>


