<?php

use App\Models\{
    User,
    Tenant
};
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Simon Furtado Costa',
            'email' => 'saimom_costa@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
