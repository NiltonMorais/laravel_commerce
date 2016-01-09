<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class OrderPaymentTypeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_payment_types')->truncate();

        \CodeCommerce\OrderPaymentType::create([
            'id' => 1,
            'name' => "Cartão de crédito",
        ]);

        \CodeCommerce\OrderPaymentType::create([
            'id' => 2,
            'name' => "Boleto",
        ]);

        \CodeCommerce\OrderPaymentType::create([
            'id' => 3,
            'name' => "Débito online (TEF)",
        ]);

        \CodeCommerce\OrderPaymentType::create([
            'id' => 4,
            'name' => "Saldo PagSeguro",
        ]);

        \CodeCommerce\OrderPaymentType::create([
            'id' => 5,
            'name' => "Oi Paggo",
        ]);

        \CodeCommerce\OrderPaymentType::create([
            'id' => 7,
            'name' => "Depósito em conta",
        ]);
    }
}