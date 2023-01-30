<?php
require_once 'db-install.php';
require_once 'db.php';
//Выводит посты в зависимости от категории
function db_post()
{
    global $dbh;
    global $id;
    global $post;
    $post=$dbh->prepare("SELECT * FROM post WHERE category_id=:id AND public='yes'");
    $post->execute(array('id'=>$id));
    return $post;
}
//Выводит инфу о основной информации внутри поста
function post_info()
{
    global $dbh;
    global $id;
    global $posty;
    $posty=$dbh->prepare("SELECT * FROM post WHERE url=:id");
    $posty->execute(array('id'=>$id));
    return $posty;
}
//Список категорий и их урлы в меню

function db_cat()
{
    $zapros = "SELECT * FROM category ";
    global $dbh;
    global $cat;
    $cat = $dbh->query($zapros);
    return $cat;
}
//Выводит информацию на странице категории
function category_info()
{
    global $dbh;
    global $id;
    global $cat;
    $id=$_GET['categoru'];
    $id=htmlspecialchars($id);
    $id=urldecode($id);
    $id=trim($id);
    $cat = $dbh->prepare("SELECT * FROM category WHERE url=:id");
    $cat->execute(array('id'=>$id));
    return $cat;
}
//Функция поиска
function search_post()
{
    global $dbh;
    global $search;
    global $search_name;
    global $num_res;
    $search=$dbh->prepare("SELECT * FROM post WHERE MATCH (text) AGAINST (? IN BOOLEAN MODE)");
    $search->execute (array($search_name));
    $num_res=$search->rowCount();
    return $search;
}
//Функция отправки комментария
function post_comment ()
{
    global $dbh;
    global $komment;
    global $id;
    global $comment_text;
    global $comment_name;
    $komment=$dbh->prepare("INSERT INTO comments SET avtor=?,text=?,id_post=?")->execute([$comment_name,$comment_text,$id]);
    return $komment;
}
//Функция для безопасности гет и пост запросов
function good_param($proverka)
{
    $proverka=htmlspecialchars($proverka);
    $proverka=urldecode($proverka);
    $proverka=trim($proverka);
    $proverka=stripcslashes($proverka);
    return $proverka;
}
//Функция вывода списка одобренных комментариев
function comments_good()
{
    global $dbh;
    global $goodkom;
    global $id;
    $goodkom=$dbh->prepare("SELECT * FROM comments WHERE id_post=:id AND public='yes'");
    $goodkom->execute(array('id'=>$id));
    return $goodkom;
}
//Функция получения значения логин-пароль
function in_admin ()
{
    global $dbh;
    global $passlog;
    $passlog=$dbh->query("SELECT * FROM admin");
    return $passlog;
}
//Получаем все комментарии
function more_comment()
{
    global $dbh;
    global $table_comments;
    $use_comment="SELECT * FROM comments";
    $table_comments=$dbh->query($use_comment);
    return $table_comments;
}
//Удаление комментария
function delete_comment()
{
    global $dbh;
    global $delcomment;
    global $delkom;
    $delcomment=$dbh->prepare("DELETE FROM comments WHERE id=?");
    $delcomment->execute([$delkom]);
    return $delkom;
}
//одобрение комментариев
function public_comment()
{
    global $dbh;
    global $public_comments;
    global $publcom;
    $publcom = good_param($_GET['public']);
    $publ='yes';
    $public_comment="UPDATE comments SET public=? WHERE id=?";
    $public_comments=$dbh->prepare($public_comment);
    $public_comments->execute([$publ,$publcom]);
    return $public_comments;
}
//Все статьи
function more_post()
{
    global $dbh;
    global $table_posts;
    $use_post="SELECT * FROM post";
    $table_posts=$dbh->query($use_post);
    return $table_posts;
}
//Удаление поста
function delete_post()
{
    global $dbh;
    global $delposts;
    global $delpost;
    $delposts=$dbh->prepare("DELETE FROM post WHERE id=?");
    $delposts->execute([$delpost]);
    return $delposts;
}
//одобрение поста
function public_post()
{
    global $dbh;
    global $public_post;
    $public_post=$dbh->prepare("UPDATE post SET public=:on");
    $public_post->execute(array('on'=>'yes'));
    return $public_post;
}
//Отправка поста в БД
function public_post_bd()
{
    global $dbh;
    global $public_bd;
    global $text_post;
    global $title_post;
    global $description_post;
    global $h1_post;
    global $url_post;
    global $cat_post;
    global $name_img;
    global $alt_img;
    $public_bd=$dbh->prepare("INSERT INTO post SET text=?,title=?,description=?,h1=?,url=?,category_id=?,image=?,image_alt=?");
    $public_bd->execute([$text_post,$title_post,$description_post,$h1_post,$url_post,$cat_post,$name_img,$alt_img]);
}
//Получение постов на главной
function two_index_post()
{
    global $dbh;
    global $index_two_posts;
    $use_post="SELECT * FROM `post` ORDER BY `date` DESC LIMIT 2";
    $index_two_posts=$dbh->query($use_post);
    return $index_two_posts;
}
//последние записи
function related_index_post()
{
    global $dbh;
    global $related_posts;
    $use_post="SELECT * FROM `post` ORDER BY `date` LIMIT 6";
    $related_posts=$dbh->query($use_post);
    return $related_posts;
}
