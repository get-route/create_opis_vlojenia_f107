<?php
require_once 'Admin/db-install.php';
require_once 'Admin/db.php';
require_once 'Admin/function.php';
$url_str="http://mailtest";

echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
?>
<?php
db_cat();
foreach ($cat as $row)
{

    echo "<pre>"."<url>"."\n";
    echo "<loc>".$url_str."/category.php?categoru=".$row['url']."</loc>"."\n";
    echo "<priority>1</priority>"."\n";
    echo "</url>"."\n";

}
?>
    <?php
    more_post();
    foreach ($table_posts as $item)
    {

    echo "<url>"."\n"."<pre>";
        echo "<loc>".$url_str."/post.php?url=".$item['url']."</loc>"."\n";
        echo "<changefreq>weekly</changefreq>"."\n";
        echo "<priority>0.7</priority>"."\n";
    echo "</url>"."\n";

    }
    ?>
<?php echo "</urlset>";?>