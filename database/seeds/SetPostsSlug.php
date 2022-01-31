<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SetPostsSlug extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $posts = Post::all();

    foreach ($posts as $post) {
      $slug = Str::slug($post->title);
      
      // Check if already exist a post with same slug
      $alreadyExists = Post::where('slug', $slug)->first();
      $counter = 1;

      // If exist do a while till finds an unique slug
      while ($alreadyExists) {

        // create a new slug
        $newSlug = $slug . "-" . $counter;
        $counter++;

        // check if the new slug is unique and if so save it as slug
        $alreadyExists = Post::where('slug', $slug)->first();
        if (!$alreadyExists) {
          $slug = $newSlug;
        }
      }

      $post->slug = $slug;
      $post->save();
    }
  }
}
