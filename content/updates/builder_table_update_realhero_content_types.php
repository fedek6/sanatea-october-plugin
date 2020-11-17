<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentTypes extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_types', function($table)
        {
            $table->smallInteger('show_in_menu')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_types', function($table)
        {
            $table->dropColumn('show_in_menu');
        });
    }
}
