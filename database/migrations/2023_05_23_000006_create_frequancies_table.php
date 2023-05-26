<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequanciesTable extends Migration
{
    public function up()
    {
        Schema::create('frequancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('frequency', 6, 3)->unique();
            $table->string('frequency_type');
            $table->longText('description')->nullable();
            $table->string('tag_1');
            $table->string('tag_2')->nullable();
            $table->string('tag_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
