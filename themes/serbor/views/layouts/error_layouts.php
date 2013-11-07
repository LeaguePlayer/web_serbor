<?php $this->beginContent('//layouts/main'); ?>
<header id="header" class="container">
    <div class="row">
        <div class="row">
            <div class="root-icons">
                <div class="grid_12">
                    <?php $this->renderPartial('//page/social_links')?>
                </div>
            </div>
        </div>
    </div>
</header>     
<div id="main" class="container">
    <?php echo $content;?>
</div>
<?php $this->endContent(); ?>