<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => "judul Pertama",
            "slug" => "judul-pertama",
            "author" => "azizan",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            "
        ],
        [
            "title" => "judul kedua",
            "slug" => "judul-kedua",
            "author" => "azhar",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            "
        ],
        [
            "title" => "judul ketiga",
            "slug" => "judul-ketiga",
            "author" => "zeline",
            "body" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit laboriosam aperiam blanditiis quam inventore deserunt vel impedit distinctio nam corporis veritatis fuga, molestias et, magni delectus perferendis nostrum non recusandae.
            "
        ]
    ];

    public static function all(){
        // return self::$blog_posts; //digunakan untuk properti static, kalau $this-> digunakan properti biasa
        return collect(self::$blog_posts); //digunakan menggunakan data collection
    }

    public static function find($slug)
    {
        //ini menampilkan data secara manual
        // $data = self::$blog_posts;
        // $new_post = [];
        // foreach($data as $post){
        //     if($post['slug'] === $slug){
        //         $new_post = $post;
        //     }
        // }
        // return $new_post;

        //ini mengambil data secara collection
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

}
