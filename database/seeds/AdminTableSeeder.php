<?php

use App\Model\Admin\admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
	        [
	            'name' =>'admin',
	            'email' =>'admin@gmail.com',
	            'password' => bcrypt('admin'),
	            'status'=>'1',
				'image'=>'noimage.jpg',
				'position'=>'Administor',
	        ],
	    ];

	    foreach ($admins as $key => $value) {

            admin::create($value);
      	}

    }
}
