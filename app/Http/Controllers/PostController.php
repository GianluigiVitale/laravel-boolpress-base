<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function published()
    {
        $postsPublished = Post::where('published', '1')->get();
        return view('posts.published', compact('postsPublished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        $data['slug'] = Str::slug($data['title'], '-') . rand(1,100);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'body' => 'required|string',
            'published' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $post = new Post;
        $post->fill($data);
        $saved = $post->save();
        if (!$saved) {
            dd('errore di salvataggio');
        }

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort('404');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (empty($post)) {
            abort('404');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort('404');
        }

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-') . rand(1,100);

        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'body' => 'required|string',
            'published' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('posts/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $post->fill($data);
        $updated = $post->update();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort('404');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
