<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Mehtod 1
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;

        // $post->save();


        // Method 2
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        return response('Data is added succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.archieve',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $posts = Post::findorFail($id);
       
       return view('posts.edit', compact('posts'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findorFail($id);
        
        $post->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect()->route('posts.index');
    }

    public function forceDelete(string $id)
    {
        Post::withTrashed()->where('id', $id)->forceDelete();

        return redirect()->back();
    }

    public function restore($id){

        Post::withTrashed()->where('id', $id)->restore(); 
        return redirect()->back() ;

    }


}
