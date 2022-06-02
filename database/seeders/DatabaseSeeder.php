<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name'=>'azizan nur rohman',
        //     'email'=>'azizan@gmail.com',
        //     'slug'=>'azizan-nur-rohman',
        //     'password'=>bcrypt('12345')
        // ]);

        User::create([
            'name'=>'azhar azizan al-fattaah',
            'email'=>'azhar@gmail.com',
            'slug'=>'azhar-azizan-al-fattaah',
            'password'=>bcrypt('12345'),
            'username'=>'azhar',
            'is_admin'=>1,
        ]);
        
        
        // Post::create([
        // 'title' => 'Judul Pertama',
        // 'category_id' => 1,
        // 'user_id' => 1,
        // 'excerpt' => 'ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error',
        // 'slug' => 'judul-pertama',
        // 'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error doloremque sapiente pariatur nobis vitae ullam quidem assumenda reprehenderit libero, officiis velit minus consequatur perspiciatis explicabo repudiandae! Sit maiores distinctio recusandae</p><p>veritatis consequuntur nulla itaque animi voluptates necessitatibus quos, corrupti saepe! Facilis eligendi suscipit, odio temporibus quas culpa voluptates vitae, hic numquam quia veniam harum vel! Ipsa sit odit molestias, iste asperiores voluptatibus officia suscipit id exercitationem. Eius deleniti fuga, repellat officia sequi, itaque facilis rerum temporibus ipsum natus sunt totam praesentium tempore unde laudantium quas beatae at ducimus. Eos iste ipsum quas vitae dolore ab, qui illo maxime quod dolor officiis voluptas similique necessitatibus. Recusandae nam sed cum alias omnis dolore tenetur, distinctio nesciunt iusto eius?</p>'
        // ]);

        // Post::create([
        // 'title' => 'Judul Kedua',
        // 'category_id' => 1,
        // 'user_id' => 2,
        // 'excerpt' => 'ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error',
        // 'slug' => 'judul-kedua',
        // 'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error doloremque sapiente pariatur nobis vitae ullam quidem assumenda reprehenderit libero, officiis velit minus consequatur perspiciatis explicabo repudiandae! Sit maiores distinctio recusandae</p><p>veritatis consequuntur nulla itaque animi voluptates necessitatibus quos, corrupti saepe! Facilis eligendi suscipit, odio temporibus quas culpa voluptates vitae, hic numquam quia veniam harum vel! Ipsa sit odit molestias, iste asperiores voluptatibus officia suscipit id exercitationem. Eius deleniti fuga, repellat officia sequi, itaque facilis rerum temporibus ipsum natus sunt totam praesentium tempore unde laudantium quas beatae at ducimus. Eos iste ipsum quas vitae dolore ab, qui illo maxime quod dolor officiis voluptas similique necessitatibus. Recusandae nam sed cum alias omnis dolore tenetur, distinctio nesciunt iusto eius?</p>'
        // ]);

        // Post::create([
        // 'title' => 'Judul Ketiga',
        // 'category_id' => 2,
        // 'user_id' => 2,
        // 'excerpt' => 'ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error',
        // 'slug' => 'judul-ketiga',
        // 'body' => '<p> ipsum dolor sit amet consectetur adipisicing elit. Quod deserunt, quibusdam amet error doloremque sapiente pariatur nobis vitae ullam quidem assumenda reprehenderit libero, officiis velit minus consequatur perspiciatis explicabo repudiandae! Sit maiores distinctio recusandae</p><p>veritatis consequuntur nulla itaque animi voluptates necessitatibus quos, corrupti saepe! Facilis eligendi suscipit, odio temporibus quas culpa voluptates vitae, hic numquam quia veniam harum vel! Ipsa sit odit molestias, iste asperiores voluptatibus officia suscipit id exercitationem. Eius deleniti fuga, repellat officia sequi, itaque facilis rerum temporibus ipsum natus sunt totam praesentium tempore unde laudantium quas beatae at ducimus. Eos iste ipsum quas vitae dolore ab, qui illo maxime quod dolor officiis voluptas similique necessitatibus. Recusandae nam sed cum alias omnis dolore tenetur, distinctio nesciunt iusto eius?</p>'
        // ]);
        
        User::factory(3)->create();
        Post::factory(20)->create();

        Category::create([
        'name' => 'Web Programing',
        'slug' => 'web-programming'
        ]);

        Category::create([
        'name' => 'Design Web',
        'slug' => 'desing-web'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
            ]);
    }
}
