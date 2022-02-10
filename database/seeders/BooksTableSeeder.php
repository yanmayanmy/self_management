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
        Book::create(['title'=>'Drum', 'detail'=>'Top to C', 'category'=>'Music','deadline'=>'2022/02/01 03:04:05', 'priority'=>100, 'time_required'=>180]);
        Book::create(['title'=>'Piano', 'detail'=>'Hannon #1', 'category'=>'Music','deadline'=>'2022/02/02 03:04:05', 'priority'=>99, 'time_required'=>60]);
        Book::create(['title'=>'Build an web app', 'detail'=>'Commit sth', 'category'=>'Programming','deadline'=>'2022/02/03 03:04:05', 'priority'=>101, 'time_required'=>240]);
        Book::create(['title'=>'Finish making prototype', 'detail'=>'', 'category'=>'Programming','deadline'=>'2022/02/28 23:59:59', 'priority'=>101, 'time_required'=>600]);
    }
}
