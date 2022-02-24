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
        Task::create(['title'=>'Chopout', 'detail'=>'roll exercise', 'category'=>'Music','deadline'=>'2022/02/01 03:04', 'priority'=>100, 'time_required'=>180]);
        Task::create(['title'=>'Learn Hannon #1','project_id'=>1, 'detail'=>'', 'category'=>'Piano','deadline'=>'2022/01/7 03:04',  'priority'=>99, 'time_required'=>60]);
        Task::create(['title'=>'Learn Hannon #2','project_id'=>1, 'detail'=>'', 'category'=>'Piano','deadline'=>'2022/01/14 03:04',  'priority'=>99, 'time_required'=>60]);
        Task::create(['title'=>'Code Html','project_id'=>2, 'detail'=>'', 'category'=>'Programing','deadline'=>'2022/02/02 03:04',  'priority'=>99, 'time_required'=>60]);
        Task::create(['title'=>'Code CSS','project_id'=>2, 'detail'=>'', 'category'=>'Programing','deadline'=>'2022/02/03 03:08',  'priority'=>99, 'time_required'=>60]);
        Task::create(['title'=>'Learn Javascript','project_id'=>2, 'detail'=>'', 'category'=>'Programing','deadline'=>'2022/02/04 03:12',  'priority'=>99, 'time_required'=>480]);
        Task::create(['title'=>'Make category table','project_id'=>2, 'detail'=>'', 'category'=>'Programing','deadline'=>'2022/02/11 03:12',  'priority'=>101, 'time_required'=>240]);
        Task::create(['title'=>'Make butter chicken curry', 'detail'=>'I have to buy yogurt', 'category'=>'cooking','deadline'=>'2022/02/15 23:59', 'priority'=>101, 'time_required'=>120]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/01 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/02 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/03 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/04 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/08 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/09 03:12',  'priority'=>80, 'time_required'=>20]);
        Task::create(['title'=>'Read 5 pages','project_id'=>3, 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/10 03:12',  'priority'=>80, 'time_required'=>20]);

    }
}
