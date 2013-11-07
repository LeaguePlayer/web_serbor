<?/*<?php $this->beginContent('//layouts/main'); ?>
<section class="center" style="min-height: 500px;">
	<?php echo $content; ?>
</section>
<?php $this->endContent(); ?>*/?>
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
           															<!--  -->			<!--  -->			
<div id="main" class="container">
    <div class="mod_article main-page intro row">
        <div class="ce_image grid_12 block">
            <figure class="image_container">
                <img class="max-img" src="/files/images/content/main-page/main-page_intro.jpg" width="1160" height="680" alt="">
            </figure>
        </div>
        <div class="ce_text" id="tagline">
            <p>Поселок «Серебряный бор» располагается в 12 километрах от Тюмени по Старому Тобольскому тракту (автодорога Тюмень<span>&nbsp;</span><span>–&nbsp;</span>Криводаново), в двух километрах от села Мальково. У границы земельных участков начинается великолепный сосновый бор, простирающийся до реки Дуван и озер Андреевской системы, два из которых находятся рядом с поселком.</p>
            <?=$content?>
        </div>
        <div class="ce_text wellcome">
            <ul>
                <li><a href="/place-info.htm">Узнать про поселок подробнее</a></li>
                <li><a href="/clients-info.htm">Ознакомиться с предложением о продаже</a></li>
                <li><a href="/map.htm">Посмотреть план поселка</a></li>
                <li><a href="/news.htm">Прочитать наши новости</a></li>
                <li><a href="/contact.htm">Связаться с нами</a></li>
            </ul>
        </div>
    </div>
    <div id="clear">
    </div>
</div>
<?php $this->endContent(); ?>