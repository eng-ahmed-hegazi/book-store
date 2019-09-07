<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SettingsTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(BooksTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(SubcategoriesTableSeeder::class);
         $this->call(CommentsTableSeeder::class);
    }
}
