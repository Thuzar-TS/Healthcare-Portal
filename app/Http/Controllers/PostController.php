<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $news_list = Post::all()->toArray();        
       return response()->json(array_reverse($news_list));
=======
        $news_list = Post::all()->toArray();
        return response()->json(array_reverse($news_list));
    //     $data = array("news_list" => $news_list);
    //    return response()->json($data);
>>>>>>> 9f9ba695b534ad97745a66823f71503c1e8d4c8f
    }
    // add news
    public function add(Request $request)
    {
        $post = new Post([
            'title' => $request->input('title'),
            'main_point' => $request->input('main_point'),
            'body' => $request->input('body'),
            'category_id' =>1,
            'user_id' => 1,
            'recordstatus' => 1
        ]);
        $post->save();
            return $post;
        return response()->json('The New successfully added');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return response()->json($posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json('The book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('The news post successfully deleted');
    }
}
