<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id') ;
            $table->unsignedBigInteger('project_id');
            $table->string('task_title');
            $table->text('task') ;
            $table->integer('priority')->default(0) ;
            $table->boolean('completed')->default(0) ;          
            $table->timestamps();
            $table->dateTime('duedate')->nullable();  
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade') ;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
