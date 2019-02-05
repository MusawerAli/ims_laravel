<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsInStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_in_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('item_name',250);
            $table->string('item_code',250);
            $table->text('item_description');
            $table->string('po_code',250);
            $table->string('invoice_code',250);
            $table->integer('item_qty');
            $table->decimal('item_rate',8,2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_in_stocks');
    }
}
