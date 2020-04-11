<?php

use App\Models\{
    Plan,
    Tenant
}; 
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '238827060000120',
            'name' => 'Simon Costa',
            'url' => 'simoncosta',
            'email' => 'saimom_costa@hotmail.com',
        ]);
    }
}
