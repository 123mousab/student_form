<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentDB extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $add = new Student();        // way to run model
        $add->firstName = 'mousab';
        $add->lastName = 'majed';
        $add->email = 'mousab#outlook.com';
        $add->sex = 'male';
        $add->note = 'I Love you programing';
        $add->save();
    }
}
