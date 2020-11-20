<?php namespace RealHero\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRealheroContentAdverts extends Migration
{
    public function up()
    {
        Schema::create('realhero_content_adverts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('type');
            $table->string('placement');
            $table->string('desktop_img');
            $table->string('mobile_img');
            $table->string('url');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('realhero_content_adverts');
    }
}
