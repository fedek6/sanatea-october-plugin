<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentArticles4 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->dropColumn('cover');
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->string('cover', 255);
        });
    }
}
