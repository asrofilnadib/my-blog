<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('dashboard.posts.index', [
          'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.posts.create', [
          'categories' => Category::all(),
        ]);
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return RedirectResponse
   */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required|max:255',
          'slug' => 'required|unique:posts',
          'image' => 'image|file|max:1024',
          'category_id' => 'required',
          'body' => 'required',
        ]);

        if ($request->file('image')) {
          $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('sukses', "New Post has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View|Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
          'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
      return view('dashboard.posts.edit', [
        'post' => $post,
        'categories' => Category::all(),
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
      $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required',
      ];

      if ($request->slug != $post->slug) {
        $rules['slug'] = 'required|unique:posts';
      }

      $validatedData = $request->validate($rules);

      if ($request->file('image')) {
        if ($request->oldImage) {
          Storage::delete($request->oldImage);
        }
        $validatedData['image'] = $request->file('image')->store('post-image');
      }

      $validatedData['user_id'] = auth()->user()->id;
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

      Post::where('id', $post->id)
        ->update($validatedData);

      return redirect('/dashboard/posts')->with('update', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Application|\Illuminate\Routing\Redirector|RedirectResponse
     */
    public function destroy(Post $post)
    {
      if ($post->image) {
        Storage::delete($post->image);
      }
      Post::destroy( $post->id);
      return redirect('/dashboard/posts')->with('delete', "Post has been deleted!");
    }

    public function checkSlug(Request $request)
    {
      $slug  = SlugService::createSlug(Post::class, 'slug', $request->title);
      return \response()->json(['slug' => $slug]);
    }
}
