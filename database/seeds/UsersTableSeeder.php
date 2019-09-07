<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name'      => 'Ahmed',
            'email'     => 'ahmed@gmail.com',
            'password'  => bcrypt('ahmed@gmail.com')
        ]);

        App\Profile::create([
            'avatar'    => 'uploads/avatars/1.png',
            'user_id'   => $user->id,
            'about'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni necessitatibus, eaque qui impedit alias dolorum deleniti cumque omnis nihil iure, distinctio fugit, ullam voluptate nemo obcaecati commodi quibusdam dolores! Ex?',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);

        $user1 = App\User::create([
            'name'      => 'Omer',
            'email'     => 'omer@gmail.com',
            'password'  => bcrypt('omer@gmail.com')
        ]);

        App\Profile::create([
            'avatar'    => 'uploads/avatars/3.png',
            'user_id'   => $user1->id,
            'about'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni necessitatibus, eaque qui impedit alias dolorum deleniti cumque omnis nihil iure, distinctio fugit, ullam voluptate nemo obcaecati commodi quibusdam dolores! Ex?',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);

        $user2 = App\User::create([
            'name'      => 'Mohammed',
            'email'     => 'mohammed@gmail.com',
            'password'  => bcrypt('mohammed@gmail.com')
        ]);

        App\Profile::create([
            'avatar'    => 'uploads/avatars/2.png',
            'user_id'   => $user2->id,
            'about'     => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni necessitatibus, eaque qui impedit alias dolorum deleniti cumque omnis nihil iure, distinctio fugit, ullam voluptate nemo obcaecati commodi quibusdam dolores! Ex?',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);
    }
}
