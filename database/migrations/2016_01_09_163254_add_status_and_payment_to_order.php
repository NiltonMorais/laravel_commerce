<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndPaymentToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('transaction_code')->nullable();  // código da transação
            $table->integer('payment_type_id')->nullable(); // tipo de pagamento
            $table->foreign('payment_type_id')->references('id')->on('order_payment_types');
            $table->integer('netAmount')->nullable(); // valor líquido da transação
            $table->foreign('status_id')->references('id')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_payment_type_id_foreign');
            $table->dropColumn('payment_type_id');
            $table->dropForeign('orders_statuses_id_foreign');
            $table->dropColumn('netAmount');
            $table->dropColumn('transaction_code');
        });
    }
}
