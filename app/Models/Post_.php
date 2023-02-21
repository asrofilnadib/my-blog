<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_
{
    private static $blog_posts =  [
      [
        "title" => 'Judul Pertama',
        "author" => 'Mohammad Asrofil Nadib',
        "slug" => 'mohammad_asrofil_nadib',
        "body" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores atque aut cumque deleniti dolor dolore eligendi excepturi itaque magnam minus nihil nulla obcaecati, quas quis reprehenderit vero! Deserunt dolorum eaque eum excepturi fuga illum iste labore sed sunt. Ab dolorem illum maiores nihil pariatur quaerat, veritatis voluptatem. Amet consectetur dolor eligendi quo saepe sapiente, sequi? Asperiores hic laudantium voluptatibus! Adipisci, cumque cupiditate deleniti doloremque enim eos, exercitationem in incidunt quae quia rem, rerum sequi sint tenetur totam vel voluptates!'
      ],
      [
        "title" => 'Judul Ke Dua',
        "author" => 'Asrofil Nadib',
        "slug" => 'asrofil_nadib',
        "body" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam aspernatur blanditiis cum, dolor ea eligendi enim error et eveniet excepturi explicabo fugit harum id impedit in ipsum iure labore minima modi molestias, necessitatibus, neque nisi omnis perspiciatis placeat quam qui quidem ratione sapiente sequi soluta suscipit temporibus ut voluptate voluptatem voluptates. Aliquam blanditiis dolorem ea inventore maxime officiis omnis perspiciatis quaerat qui veniam! Aliquam deleniti enim error ex exercitationem illum impedit, in incidunt itaque magnam magni molestias non obcaecati officia quia quibusdam reiciendis repellendus sint tempora tenetur velit vitae voluptatem. Aliquam autem fugiat libero mollitia necessitatibus pariatur praesentium qui sapiente tempora ullam. Ad, aut consequatur earum esse eveniet impedit labore nostrum quam quasi quia quo sequi sunt, ullam voluptas!'
      ]
    ];

    public static function all() {
      return collect(self::$blog_posts);
    }

    public static function find($slug) {
      $posts = static::all();
      /*$post = [];
      foreach ($posts as $p) {
        if ($p['slug'] === $slug) {
          $post = $p;
        }
      }*/
      return $posts->firstWhere('slug', $slug);
    }
}
