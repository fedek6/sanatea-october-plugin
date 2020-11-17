<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentArticles2 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->smallInteger('show_on_slider')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->dropColumn('show_on_slider');
        });
    }
}
