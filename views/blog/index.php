<?php   include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="wrapper">
                    <?php foreach ($articlesList as $article): ?>
                    <div class="post">
                        <div class="postheader">
                            <h4><?=$article['title']?></h4>
                        </div>

                        <div class="post_body">
                            <p><?=mb_substr($article['text'], 0, 500)?></p>
                        </div>

                    </div>
                    <?php endforeach; ?>
                </div>


            </div>


        </div>
    </div>
</section>









<?php  include ROOT. '/views/layouts/footer.php'; ?>
