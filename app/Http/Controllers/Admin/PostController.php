<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
  /**
   * Function to generate an unique slug
   *
   * @param string $title
   */
  private function generateSlug($title)
  {
    $slug = Str::slug($title);

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

    return $slug;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();

    return view('admin.posts.index', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();

    return view('admin.posts.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $newPost = new Post();

    $newPost->slug = $this->generateSlug($data['title']);

    $newPost->fill($data);
    $newPost->save();

    return redirect()->route('admin.posts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    $post = Post::where('slug', $slug)->first();
    return view('admin.posts.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($slug)
  {
    $post = Post::where('slug', $slug)->first();
    $categories = Category::all();

    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => $categories
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $slug)
  {
    $post = Post::where('slug', $slug)->first();
    $data = $request->all();
    $oldTitle = $post->title;
    $titleChanged = $oldTitle != $data['title'];
    $post->fill($data);

    // check if the title changed
    if($titleChanged){
      $post->slug = $this->generateSlug($data['title']);
    }
    
    $post->update($data);
    return redirect()->route('admin.posts.show', $post->slug);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($slug)
  {
    $post = Post::where('slug', $slug)->first();
    $post->delete();

    return redirect()->route('admin.posts.index');
  }
}
