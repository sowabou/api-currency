<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Currency name (e.g., Euro)
            $table->string('code')->unique(); // Currency code (e.g., EUR)
            $table->decimal('rate', 10, 2); // Reference rate with 2 decimal places
            $table->integer('quantity')->default(1); // Quantity (default is 1)
            $table->timestamps(); // Created_at and Updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}

