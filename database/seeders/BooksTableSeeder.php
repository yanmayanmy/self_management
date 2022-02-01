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
        Book::create(['title'=>'Drum', 'detail'=>'Top to C', 'category'=>'Music','due_date'=>'2022/02/01 03:04:05', 'priority'=>100, 'required_time'=>180]);
        Book::create(['title'=>'Piano', 'detail'=>'Hannon #1', 'category'=>'Music','due_date'=>'2022/02/02 03:04:05', 'priority'=>99, 'required_time'=>60]);
        Book::create(['title'=>'Build an web app', 'detail'=>'Commit sth', 'category'=>'Programming','due_date'=>'2022/02/03 03:04:05', 'priority'=>101, 'required_time'=>240]);
    }
}
