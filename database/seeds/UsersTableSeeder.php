<?php

use Illuminate\Database\Seeder;
use Uatftrans\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->entity = "Ingeniero de Sistemas";
        $admin->name = "Ing. Jorge Denys Peralta M.";
        $admin->cedula = "12345678";
        $admin->phone= "75729198";
        $admin->ru= "56930";
		$admin->email= "peralta.jorge.uatf@gmail.com";
		$admin->password= bcrypt('123456');
        $admin->active = true;
        $admin->type = "Administrator"; 
		$admin->save();
    }
}
