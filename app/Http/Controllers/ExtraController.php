<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Tag;

class ExtraController extends Controller
{

    public function removeTagFromPost($idp, $idt) {

      $post = Post::findOrFail($idp);
      $tag = Tag::findOrFail($idt);

      $post -> tags() -> detach($tag);

      return redirect() -> route('post.index');
    }

    public function setUserImage(Request $request) {

      // $data = $request -> all();
      // dd($data);

      $file = $request -> file('image');
      $filename = $file -> getClientOriginalName();

      $file -> move('images', $filename);

      $newUserData = [

        'image' => $filename

      ];

      Auth::user() -> update($newUserData);

      return redirect() -> route('post.index');
    }
}
