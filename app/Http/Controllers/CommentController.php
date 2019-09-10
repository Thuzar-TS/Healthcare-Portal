<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class CommentController extends Controller
{

    public function index()
    {
         $comment =Comment::all()->toArray();
         return array_reverse($comment);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {


        // $request->validate([
        //     'title' => 'required|unique:jobs',
        //     'comment' =>'required',
        //     'email' => 'required|email|unique:comments',
        //     'zipcode' => 'required',
        // ]);

        $zipcode =  $request->fields[0]['fzipcode'] . '-' . $request->fields[0]['lzipcode'];

        $comment = new Comment ([

            'title' => $request->input('title'),
            'comment' => $request->input('comment'),
            'email' => $request->input('email'),
            'name' =>  $request->input('name'),
            'year' => $request->input('year'),
            'gender' => $request->input('gender'),
            'zipcode' =>  $zipcode,
            'customer_id' => 1,
            'status' => 0,
            'recordstatus' => 2

        ]);
        $comment ->save();
        \Mail::to($request->email)->send(new SendMailable($request->comment));

        return response()->json(['success'=>'Done!']);

    }


    public function show($id)
    {
        //
    }

    public function edit(Comment $comment)
    {

    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy($id)
    {
        //

        $comment = Comment::find($id);
        $comment->delete();
        return response()->json('Comment successfully deleted');
    }
    public function confirm($id)
     {

            $comment =Comment::find($id);
            $comment->status =1;
            $comment->save();
            return response()->json('Comment successfully confirmed');
    }

}
