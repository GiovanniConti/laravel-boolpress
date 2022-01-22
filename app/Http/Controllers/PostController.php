<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  function index()
  {
    $postsListEx = [
      [

        'userId' => 1,
        'id' => 1,
        'title' => 'Primo Post di BoolPress',
        'body' => 'Contenuto del primo post di boolpress'
      ],
      [
        'userId' => 2,
        'id' => 2,
        'title' => 'Secondo Post di BoolPress',
        'body' => 'Contenuto del secondo post di boolpress'
      ],
      [
        'userId' => 1,
        'id' => 3,
        'title' => 'Terzo Post di BoolPress',
        'body' => 'Contenuto del terzo post di boolpress'
      ],
    ];

    return $postsListEx;
  }
}
