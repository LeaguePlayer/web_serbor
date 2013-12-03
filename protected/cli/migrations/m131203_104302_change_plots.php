<?php
/**
 * Миграция m131203_104302_change_plots
 *
 * @property string $prefix
 */
 
class m131203_104302_change_plots extends CDbMigration
{
    public function safeUp()
    {
        $this->dropColumn('{{plots}}', 'area_id');
        $this->addColumn('{{plots}}', 'image_map_id', 'int COMMENT "Карта"');
        $this->addColumn('{{plots}}', 'coords', "text COMMENT 'Координаты'");

        $this->dropTable('{{areas}}');
    }
 
    public function safeDown()
    {
        $this->dropColumn('{{plots}}', 'image_map_id');
        $this->dropColumn('{{plots}}', 'coords');
        $this->addColumn('{{plots}}', 'area_id', "int COMMENT 'Область'");

        $this->createTable('{{areas}}', array(
            'id' => 'pk', // auto increment
            'name' => "string COMMENT 'Название области'",
            'image_map_id' => "int COMMENT 'Карта'",
            'coords' => "text COMMENT 'Координаты'",
        ),
        'ENGINE=MyISAM DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
    }
}