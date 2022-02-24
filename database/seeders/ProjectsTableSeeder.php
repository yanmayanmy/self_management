<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(['title'=>'Learn Summer by Joe Hisaishi', 'detail'=>'', 'category'=>'Piano','deadline'=>'2022/01/28 03:04', 'priority'=>100]);
        Project::create(['title'=>'Deploy the Prototype', 'detail'=>'building self management app', 'category'=>'Programming','deadline'=>'2022/02/28 03:04', 'priority'=>1000]);
        Project::create(['title'=>'Finish reading Little Prince', 'detail'=>'', 'category'=>'Reading','deadline'=>'2022/03/28 03:04', 'priority'=>90]);
    }
}
