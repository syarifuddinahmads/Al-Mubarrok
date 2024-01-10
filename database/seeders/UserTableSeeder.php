<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name'=>'Jeda Ngoding','email'=>'jedangoding@gmail.com','username'=>'jedangoding','password'=>Hash::make('1'),'active'=>1,'bio'=>'Jeda Ngoding'],
            ['name'=>'Ahmad Syarifuddin','email'=>'syarifuddinahmads.me@gmail.com','username'=>'syarifuddinahmads','password'=>Hash::make('1'),'active'=>1,'bio'=>'Ahmad Syarifuddin']
        ];
        User::truncate();
        User::insert($data);
    }
}
