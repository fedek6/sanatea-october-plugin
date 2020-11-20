<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentAdverts extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_adverts', function($table)
        {
            $table->renameColumn('type', 'orientation');
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_adverts', function($table)
        {
            $table->renameColumn('orientation', 'type');
        });
    }
}
