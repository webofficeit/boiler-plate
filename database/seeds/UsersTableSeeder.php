<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'uuid' => '55a89f92-dcd4-408d-9a16-f7ae05f83bf3',
                'first_name' => 'Admin',
                'last_name' => 'Istrator',
                'email' => 'admin@admin.com',
                'avatar_type' => 'gravatar',
                'avatar_location' => NULL,
                'website' => NULL,
                'address' => NULL,
                'city' => NULL,
                'country_id' => NULL,
                'phoneno' => NULL,
                'account_type' => NULL,
                'bussiness_kyc' => NULL,
                'bussiness_description' => NULL,
                'latitude' => NULL,
                'longitude' => NULL,
                'password' => '$2y$10$JmZhWYVYngsbSzwZDj7l7uXKmp5l4znZOcWwbgsEKK0SdogPhIupW',
                'password_changed_at' => NULL,
                'active' => 1,
                'confirmation_code' => '36161f2c3a91a604be66b13f92fd59f5',
                'confirmed' => 1,
                'timezone' => NULL,
                'last_login_at' => NULL,
                'last_login_ip' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-10-18 13:05:18',
                'updated_at' => '2018-10-18 13:05:18',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'uuid' => '85319f1b-699b-43c1-a235-a924e7048d63',
                'first_name' => 'Backend',
                'last_name' => 'User',
                'email' => 'executive@executive.com',
                'avatar_type' => 'gravatar',
                'avatar_location' => NULL,
                'website' => NULL,
                'address' => NULL,
                'city' => NULL,
                'country_id' => NULL,
                'phoneno' => NULL,
                'account_type' => NULL,
                'bussiness_kyc' => NULL,
                'bussiness_description' => NULL,
                'latitude' => NULL,
                'longitude' => NULL,
                'password' => '$2y$10$Tebbenw1RgDJ8XZ2CCMpbubWojjgf3SqJUEtmoJWlTm6G//iBbvVe',
                'password_changed_at' => NULL,
                'active' => 1,
                'confirmation_code' => '7f14f0d23ae96f012b8766e846de1f25',
                'confirmed' => 1,
                'timezone' => NULL,
                'last_login_at' => NULL,
                'last_login_ip' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-10-18 13:05:18',
                'updated_at' => '2018-10-18 13:05:18',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'uuid' => '5b52333e-b3dc-486c-b64a-d17ee6f38a7b',
                'first_name' => 'Default',
                'last_name' => 'User',
                'email' => 'user@user.com',
                'avatar_type' => 'gravatar',
                'avatar_location' => NULL,
                'website' => NULL,
                'address' => NULL,
                'city' => NULL,
                'country_id' => NULL,
                'phoneno' => NULL,
                'account_type' => NULL,
                'bussiness_kyc' => NULL,
                'bussiness_description' => NULL,
                'latitude' => NULL,
                'longitude' => NULL,
                'password' => '$2y$10$9C7S7Hw8fMApTTG/haGqfedkemrJRLtsTW29NRDwoco6HY1/1HJ.S',
                'password_changed_at' => NULL,
                'active' => 1,
                'confirmation_code' => '05c098ebac9448bbf62fa5ef3eef9e53',
                'confirmed' => 1,
                'timezone' => NULL,
                'last_login_at' => NULL,
                'last_login_ip' => NULL,
                'remember_token' => NULL,
                'created_at' => '2018-10-18 13:05:19',
                'updated_at' => '2018-10-18 13:05:19',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}