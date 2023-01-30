<?php
require_once './Admin/db-install.php';
require_once './Admin/db.php';
require_once './Admin/function.php';
$id=$_GET['categoru'];
$id=good_param($id);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php
require_once 'header.php';
category_info();
?>
    <?php
    foreach ($cat as $it)
    {?>
    <title><?php echo $it['title'];?></title>
    <meta name="description" content="<?php echo $it['description'];?>"> <?php } ?>
</head>
<body>
<header class="header">
    <div class="container">
        <?php
        require_once 'navigate.php';
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="info-post">
                    <h1 class="post-header-title text-center"><?php echo $it['h1'];?></h1>
                    <p class="priview-header-title text-center"><?php echo $it['paragraph'];?></p>

                </div>
            </div>
            <?php
            require_once './Search/search.php';
            ?>
        </div>
    </div>

</header>


<section class="content-section">
    <div class="container text-center">
                <div class="row text-center">

                    <div class="row row-cols-1 row-cols-md-2 post-kards">
                        <?php
                        db_post();
                        foreach ($post as $item) {
                        ?>
                        <div class="col mb-4">

                            <div class="card">
                                <img src="./images/<?php echo $item ['image']?>" class="card-img-top index-image" alt="<?php echo $item ['image_alt']?>">
                                <div class="card-body">
                                <h3> <a class="card-title"><a href="/post.php?url=<?php echo $item ['url']?>"><?php echo $item ['title']?></a></h3>
                                    <p class="card-text"><?php echo mb_strimwidth($item ['description'],0,80,"...");?></p>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>

            </div>

    </div>
</section>
</body>
<?php
require_once 'footer.php';
?>

</html>
