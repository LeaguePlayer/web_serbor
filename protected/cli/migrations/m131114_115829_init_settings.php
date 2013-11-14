<?php
/**
 * Миграция m131114_115829_init_settings
 *
 * @property string $prefix
 */
 
class m131114_115829_init_settings extends CDbMigration
{

    public function safeUp()
    {
        $this->execute("
            INSERT INTO `tbl_settings` (`option`, `value`, `label`, `type`, `ranges`) VALUES
                ('email', 'android@amobile-studio.ru', 'E-mail', NULL, NULL),
                ('title', 'Site', 'Title', NULL, NULL),
                ('meta_keys', 'Ключи', 'Meta keys', 'text', NULL),
                ('meta_description', 'Описание', 'Meta description', 'text', NULL);
        ");
    }
 
    public function safeDown()
    {
        $this->execute('TRUNCATE TABLE `tbl_settings`;');
    }
}