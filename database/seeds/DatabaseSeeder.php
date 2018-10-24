<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);

        Model::reguard();
        $this->call(CountriesTableSeeder::class);
        $this->call(AccountTypesTableSeeder::class);
        $this->call(BussinessRegistartionDocsTableSeeder::class);
        $this->call(DeliveryMethodsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
