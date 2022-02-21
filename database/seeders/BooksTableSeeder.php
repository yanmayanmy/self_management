<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(['title'=>'Drum', 'detail'=>'Top to C', 'category'=>'Music','start_time'=>'2022/02/01 03:04', 'end_time'=>'2022/02/01 03:04', 'priority'=>100]);
        Book::create(['title'=>'Piano', 'detail'=>'Hannon #1', 'category'=>'Music','start_time'=>'2022/02/02 03:04', 'end_time'=>'2022/02/05 03:04', 'priority'=>99]);
        Book::create(['title'=>'Build an web app', 'detail'=>'Commit sth', 'category'=>'Programming','start_time'=>'2022/02/03 03:04', 'end_time'=>'2022/02/05 03:04', 'priority'=>101]);
        Book::create(['title'=>'Finish making prototype', 'detail'=>'', 'category'=>'Programming','start_time'=>'2022/02/28 23:59', 'end_time'=>'2022/03/01 03:04', 'priority'=>101]);
        Book::create(['title'=>'Rehearsal', 'detail'=>'MCM', 'category'=>'Marching','start_time'=>'2022/02/4 19:00', 'end_time'=>'2022/02/06 14:00', 'priority'=>1000]);
    }
}
