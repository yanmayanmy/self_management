<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create(['title'=>'Chopout', 'detail'=>'roll exercise', 'category'=>'Music','deadline'=>'2022/02/01 03:04:05', 'priority'=>100, 'time_required'=>180]);
        Task::create(['title'=>'Hannon #1', 'detail'=>'', 'category'=>'Music','deadline'=>'2022/02/02 03:04:05',  'priority'=>99, 'time_required'=>60]);
        Task::create(['title'=>'Make category table', 'detail'=>'', 'category'=>'Programming','deadline'=>'2022/02/03 03:04:05', 'priority'=>101, 'time_required'=>240]);
        Task::create(['title'=>'Make butter chicken curry', 'detail'=>'I have to buy yogurt', 'category'=>'cooking','deadline'=>'2022/02/28 23:59:59', 'priority'=>101, 'time_required'=>120]);
    }
}
