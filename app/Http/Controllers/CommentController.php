<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailComment;

class CommentController extends Controller
{
    protected $zipcode;
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

        $request->validate([
            'title' => 'required',
            'comment' =>'required',
            'email' => 'required|email',
            //  'fzipcode' => 'required',
            //  'lzipcode' => 'required',
        ]
        // ,[
        //     'fzipcode.required' => 'First zipcode is required and must be three !',
        //     'lzipcode.required' => 'Second zipcode is required and  must be four'
        // ]
    );

        // $request->validate([
        //     'title' => 'required',
        //     'comment' =>'required',
        //     'email' => 'required|email',

        // ]);

        $zipcode =  $request->fields[0]['fzipcode'] . '-' . $request->fields[0]['lzipcode'];


        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->comment = $request->input('comment');
        $comment->email = $request->input('email');
        $comment->name =  $request->input('name');
        $comment->year = $request->input('year');
        $comment->gender = $request->input('gender');
        $comment->zipcode = $zipcode;
        $comment->customer_id = 1;
        $comment->status = 0;
        $comment->recordstatus = 1;
        $comment ->save();

        $getComment = Comment::findOrFail($comment->id);

        if($getComment->gender == 0 )
        {
            $getComment->gender = "Male";
        }
        else{
            $getComment->gender = "Female";
        }
        // \Mail::to('mayphue17@management-part')->send(new SendMailComment($getComment));
        \Mail::to($getComment)->send(new SendMailComment($getComment));

        // return response()->json(['success'=>'Done!']);

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
            $comment =Comment::all()->toArray();
            $data = array("comments"=> $comment, "success", "Comment successfully confirmed");
            return response()->json($data);
    }

}
