<div class="mod_article news intro row">
    <div class="ce_text grid_3">
        <h1>
            <span>Новости</span>
        </h1>
    </div>
    <h1 class="ce_headline grid_6">2013</h1>
    <h2 class="ce_headline grid_3">Публикации в СМИ</h2>
</div>
<div class="mod_article row">
    <!-- indexer::stop -->
    <div class="mod_newsarchive news all grid_9 block">
    	<?foreach ($news as $n) :?>
    	<div class="layout_full block first even row">
            <div class="grid_3"></div>
            <div class="offset_3 grid_6">
                <div class="post-meta">
                    <time datetime="<?=CHtml::encode($n->dt_date)?>"><?=CHtml::encode(date('d.m.Y', strtotime($n->dt_date)))?></time>
                </div>
                <h2><?=CHtml::encode($n->title)?></h2>
                <div class="ce_text">
                    <?=$n->wswg_news_body?>
                </div>
            </div>
        </div>
    	<?endforeach;?>
    </div>
    <!-- indexer::continue -->
    <!-- indexer::stop -->
    <div class="mod_newsarchive news pub grid_3 block">
    	<?foreach ($smi as $n) :?>
    	<div class="layout_short block first even">
            <div class="post-meta">
                <time datetime="<?=CHtml::encode($n->dt_date)?>"><?=CHtml::encode(date('d.m.Y', strtotime($n->dt_date)))?></time>
            </div>
            <h2><?=CHtml::encode($n->title)?></h2>
            <div class="teaser"></div>
            <p class="subhead"><?=strip_tags($n->wswg_news_body)?></p>
    	</div>
    	<?endforeach;?>
	</div>
</div>