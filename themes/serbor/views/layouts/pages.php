<?php $this->beginContent('//layouts/main'); ?>
<header id="header" class="container">
    <div class="row">
        <div class="grid_3 logo">
            <a href="/">
            <img alt="Лого" src="/files/images/site/logo.png"></a>
        </div>
        <div class="grid_9 primary">
            <div class="row">
                <div class="grid_9 main-info">
                    <span class="phone-area">+7 3452</span>
                    <span class="phone-main">60-33-82, 71-78-75</span>
                    <?php $this->renderPartial('//page/social_links')?>
                </div>
                <div class="grid_9 main-menu">
                    <nav id="navigation" class="mod_navigation">
                        <a href="clients-info/#skipNavigation9" class="invisible">Пропустить навигацию</a>
                        <ul class="nav group level_1">
                            <li class="root">
                                <a href="/">Главная</a>
                            </li>
                            <li class="sibling first">
                                <a href="/place-info/" title="О поселке &quot;Серебряный Бор&quot;" class="sibling first">Поселок</a>
                            </li>
                            <li class="selected">
                                <a href="/clients-info/" class="selected">Покупателям</a>
                            </li>
                            <li class="sibling">
                                <a href="/map/" title="План поселка &quot;Серебряный бор&quot;" class="sibling">План поселка</a>
                            </li>
                            <li class="sibling">
                                <a href="/news/" title="Новости" class="sibling">Новости</a>
                            </li>
                            <li class="sibling">
                                <a href="/photos/" title="Фотографии поселка &quot;Серебряный Бор&quot;" class="sibling">Фотогалерея</a>
                            </li>
                            <li class="sibling last">
                                <a href="/contact/" title="Контактная информация" class="sibling last">Контакты</a>
                            </li>
                        </ul>
                        <a id="skipNavigation9" class="invisible">&nbsp;</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="main" class="container">
    <?php echo $content;?>
    <div id="clear"></div>
</div>									

<footer id="footer" class="container">
    <div id="footer_bottom">
        <div class="row">
            <div class="copyright grid_9">© 2011 ДНТ «Серебряный бор». Земельные участки.<br>Все права защищены. Перепечатка материалов только с согласия администрации сайта.</div>
            <div class="footer-logo grid_3"><a href="/"><img src="/files/images/site/logo_footer.png" alt="Лого"></a></div>
        </div>
    </div>
</footer>

<?php $this->endContent(); ?>