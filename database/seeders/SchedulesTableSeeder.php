<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create(['title'=>'Drum', 'detail'=>'Top to C', 'category'=>'Music','start_time'=>'2022/02/01 03:04', 'end_time'=>'2022/02/01 03:04', 'priority'=>100]);
        Schedule::create(['title'=>'Gym', 'detail'=>'Pull day', 'category'=>'Workout','start_time'=>'2022/02/02 17:00', 'end_time'=>'2022/02/02 19:00', 'priority'=>99]);
        Schedule::create(['title'=>'Gym', 'detail'=>'Push day', 'category'=>'Workout','start_time'=>'2022/02/03 17:00', 'end_time'=>'2022/02/02 19:00', 'priority'=>99]);
        Schedule::create(['title'=>'Gym', 'detail'=>'Leg day', 'category'=>'Workout','start_time'=>'2022/02/04 17:00', 'end_time'=>'2022/02/02 19:00', 'priority'=>99]);
        Schedule::create(['title'=>'Gym', 'detail'=>'Core day', 'category'=>'Workout','start_time'=>'2022/02/05 17:00', 'end_time'=>'2022/02/02 19:00', 'priority'=>99]);
        Schedule::create(['title'=>'Rehearsal', 'detail'=>'MCM', 'category'=>'Marching','start_time'=>'2022/02/03 19:00', 'end_time'=>'2022/02/06 14:00', 'priority'=>1000]);
        Schedule::create(['title'=>'Rehearsal', 'detail'=>'MCM', 'category'=>'Marching','start_time'=>'2022/03/04 19:00', 'end_time'=>'2022/03/07 14:00', 'priority'=>1000]);
        Schedule::create(['title'=>'Rehearsal', 'detail'=>'MCM', 'category'=>'Marching','start_time'=>'2022/03/11 19:00', 'end_time'=>'2022/03/13 14:00', 'priority'=>1000]);
    }
}
