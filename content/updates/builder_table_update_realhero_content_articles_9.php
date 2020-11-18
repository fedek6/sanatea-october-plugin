<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRealheroContentArticles9 extends Migration
{
    public function up()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->string('type')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('realhero_content_articles', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
