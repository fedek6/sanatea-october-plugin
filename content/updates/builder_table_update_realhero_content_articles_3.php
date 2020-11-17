<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentArticles3 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->text('excerpt');
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->dropColumn('excerpt');
        });
    }
}
