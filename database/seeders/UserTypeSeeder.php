<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserType;
use Illuminate\Support\Facades\Schema;
class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        UserType::truncate();
        schema::enableForeignKeyConstraints();
        $types=[['type'=>'Admin','status'=>'1'],['type'=>'Editor','status'=>'1']];
        foreach($types as $type){
            UserType::create($type);
        }
    }
}
