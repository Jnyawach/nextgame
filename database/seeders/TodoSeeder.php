<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Todo::truncate();
        $tasks=[
            ['name'=>'Do laundry','status'=>'active'],
            ['name'=>'Learn how to bake a cake','status'=>'active'],
            ['name'=>'Complete frontend task', 'status'=>'complete'],
            ['name'=>'Meditate for 10 minutes','status'=>'complete']
        ];

        foreach ($tasks as $key => $value) {
            Todo::create($value);
        }

    }
}
