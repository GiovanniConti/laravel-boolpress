<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(Request $request) {
    $postsList = Post::with("category")->paginate(3);

    foreach ($postsList as $post) {
      $content = strip_tags($post->content);
      $post['content'] = strlen($content) > 200 ? substr($content, 0, 200) . '...' : $content;
    }

    return $postsList;
  }
}
