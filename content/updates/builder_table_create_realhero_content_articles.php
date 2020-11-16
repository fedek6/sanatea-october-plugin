<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRealheroContentArticles extends Migration
{
    public function up()
    {
        Schema::create('realhero_content_articles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('title');
            $table->text('text');
            $table->integer('sort_order')->default(0);
            $table->string('cover', 255);
            $table->string('slug', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('category');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('realhero_content_articles');
    }
}
