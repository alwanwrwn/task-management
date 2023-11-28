<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['to do', 'in progress', 'done'];

        for ($i=0; $i < 12; $i++) { 
            DB::table('tasks')->insert([
                'title' => Str::random(10),
                'description' => Str::random(20),
                'status' => $status[rand(0,2)]
            ]);
        }
    }
}
