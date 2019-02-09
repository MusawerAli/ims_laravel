<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_code');
            $table->string('invoice_code');
            $table->integer('invoice_total');
            $table->text('invoice_description');
            $table->enum('invoice_status', ['active', 'inactive']);
          
           
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
        Schema::dropIfExists('po_invoices');
    }
}
