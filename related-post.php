<?php

require_once './Admin/db-install.php';
require_once './Admin/db.php';
require_once './Admin/function.php';
?>
<div class="container">
    <div class="col-lg-12">
        <h3 class="text-center">Последние записи</h3>
    </div>
<div class="col-lg-12">
    <div class="row">
        <?php
        related_index_post();
        foreach ($related_posts as $rel){
        ?>
        <div class="col-lg-4 kards-telated">
            <img src="./images/<?php echo $rel ['image']?>" class="related-image" alt="<?php echo $rel ['image_alt']?>">
            <a href="/post.php?url=<?php echo $rel ['url']?>"><h4><?php echo $rel ['title']?></h4></a>
            <p><?php echo date("d.m.Y",strtotime($rel ['date']));?></p>
        </div>
        <?php }?>
    </div>
</div>
</div>