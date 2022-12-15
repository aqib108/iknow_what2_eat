<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // User::truncate();
        // schema::enableForeignKeyConstraints();
        $user=['name'=>'admin','email'=>'admin@arhamsoft.com','status'=>'1','password'=>'admin@123'];
        User::create($user);
    }
}
