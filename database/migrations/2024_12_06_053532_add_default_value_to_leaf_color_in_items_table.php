<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToLeafColorInItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('leaf_color')->default('green')->change(); // Cambia 'green' por el valor predeterminado que desees
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('leaf_color')->nullable()->change(); // O eliminas el valor predeterminado
        });
    }
}

