<?php

use Illuminate\Database\Seeder;
use App\User;
class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user')->delete();
        $admin = new User;
        $admin->userid = '1';
        $admin->name = 'admin';
        $admin->email = 'admin';
        $admin->password = 'admin';
        $admin->password = bcrypt($admin->password);
        $admin->save();
    }
}
