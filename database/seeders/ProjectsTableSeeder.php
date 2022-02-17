<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(['title'=>'Deploy the Prototype', 'detail'=>'building self management app', 'category'=>'Programming','deadline'=>'2022/02/28 03:04:05', 'priority'=>100]);
    }
}
