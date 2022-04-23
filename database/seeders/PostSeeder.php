<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'body' => Str::random(500),
                'title' => Str::random(10),
                'created_at' =>  Carbon::create(),
                'updated_at' =>  Carbon::create(),
            ];
        }
        
        DB::table('posts')->insert($data);
    }
}
