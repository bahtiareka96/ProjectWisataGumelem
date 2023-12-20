<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courier;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['code'=>'jne', 'title'=>'JNE'],
            ['code'=>'pos', 'title'=>'POS'],
            ['code'=>'tiki', 'title'=>'TIKI']
        ];
        Courier::insert($data);
    }
}
