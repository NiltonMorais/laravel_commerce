<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class OrderStatusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_statuses')->truncate();

        \CodeCommerce\OrderStatus::create([
            'id' => 1,
            'name' => "Aguardando pagamento",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 2,
            'name' => "Em análise",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 3,
            'name' => "Paga",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 4,
            'name' => "Disponível",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 5,
            'name' => "Em disputa",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 6,
            'name' => "Devolvida",
        ]);

        \CodeCommerce\OrderStatus::create([
            'id' => 7,
            'name' => "Cancelada",
        ]);
    }
}