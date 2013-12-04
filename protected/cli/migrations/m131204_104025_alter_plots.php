<?php
/**
 * Миграция m131204_104025_alter_plots
 *
 * @property string $prefix
 */
 
class m131204_104025_alter_plots extends CDbMigration
{
    public function up()
    {
        $this->alterColumn('{{plots}}', 'num', 'varchar(20)');
    }
 
    public function down()
    {
        $this->alterColumn('{{plots}}', 'num', 'int');
    }
}