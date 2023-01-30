<?php
require_once './Admin/db-install.php';
require_once './Admin/db.php';
require_once './Admin/function.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php
require_once 'header.php';
$id=$_GET['url'];
$id=good_param($id);
$public_comment=$_POST['comment-on'];
$public_comment=good_param($public_comment);
$comment_name=$_POST['name-comment'];
$comment_name=good_param($comment_name);
$comment_text=$_POST['text-comment'];
$comment_text=good_param($comment_text);
post_info();
foreach ($posty as $info_post)
{
?>
    <meta name="description" content="<?php echo $info_post['description']?>">
    <title><?php echo $info_post['title']?></title>
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
                    <h1 class="post-header-title text-center"><?php echo $info_post['h1']?></h1>
                </div>
            </div>
        <?php
        require_once './Search/search.php';
        ?>
        </div>
    </div>
</header>
<section class="content-section">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 content-section-text">
                Дата публикации: <?php echo date("d.m.Y",strtotime($info_post['date']))?>
            </div>
            <div class="col-lg-6 content-section-text">
                Категория: <a href="/category.php?categoru=<?php echo $info_post['category_id']?>">Блог</a>
            </div>
            <div class="content-section-post col-lg-12">

            <div class="col-lg-12">
                <p class="text-justify"> <?php echo $info_post['text']?></p>
            </div>
            <div class="col-lg-12 text-center">
                <?php
                require_once 'social.php';
                require_once 'related-post.php';
                ?>
                <h3>Комментарии:</h3>
                <hr class="hr-line">
            </div>
                <?php
                comments_good();
                foreach ($goodkom as $items)
                {
                ?>
                <div class="row">

                    <div class="col-lg-3 text-center">
                <h4><?php echo $items['avtor']?></h4>
                <p><?php echo $items['date']?></p>
            </div>
            <div class="col-lg-6 text-center">
                <p>"<?php echo $items['text']?>"</p>
            </div>
                </div>
            <hr class="hr-line">
                <?php
                }
                ?>
                <div class="col-lg-12 text-center">
                <form method="post" name="comments-form" class="comment-form">
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">Имя</label>
                        <input type="text" name="name-comment" class="form-control" id="exampleFormControlInput1" placeholder="Введите имя:" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Текст комментария</label>
                        <textarea class="form-control" name="text-comment" id="exampleFormControlTextarea1" rows="3" placeholder="Текст комментария:" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="comment-on" class="btn btn-primary comment-start">
                    </div>
                </form>
                <?php

                if ($public_comment==true)
                {   post_comment();
                    echo "*Ваш комментарий отправлен на модерацию. После проверки он появится на сайте";
                }
                ?>
            </div>
            </div>

        </div>
    </div>
</section> <?php }?>
</body>
<?php
require_once 'footer.php';
?>

</html>
