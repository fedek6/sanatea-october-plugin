<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentArticles7 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->string('cover_alt', 255);
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->dropColumn('cover_alt');
        });
    }
}
