<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('users')->truncate();

    	factory(App\User::class)->create([

        	'name' 		=> 'noname',
        	'email' 	=> 'matias.moglia@noname-it.com.ar',
        	'password' 	=> bcrypt('noname')
        ]);
        
        factory(App\User::class)->create([

            'name'      => 'noname',
            'email'     => 'ricardo.olery@noname-it.com.ar',
            'password'  => bcrypt('noname')
        ]);
        factory(App\User::class, 50)->create();
        
    }
}
