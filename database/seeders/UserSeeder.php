<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
//use Spatie\Permission\Traits\HasRoles;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= User::create([
            'name'=> 'admin',
            'email'=>'Admin111@gmail.com',
            'password'=> Hash::make('admin'),
        ]
    );
   $token =$user->createToken('AdminToken')->plainTextToken;

  $user->assignRole('admin');
    $user= User::create([
        'name'=> 'mais',
        'email'=>'mais111@gmail.com',
        'password'=> Hash::make('member'),
    ]
);
 $token =$user->createToken('UserToken')->plainTextToken;
   $user->assignRole('member');
    }
}
