<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\UploadFile;
use App\Top10;
use App\Item;
use App\like;

class CommentController extends Controller
{
    //
    public function create($id)
    {
        $list=Top10::find($id);
        return view('pages.add-item',["list"=>$list]);
    }

    public function store(Request $request)
    {
        $user=Auth::user();
        // Comment::create(['content'=>$request->content,
        //           'item_id'=>$request->item,
        //           'user_id'=>$user->id
        //   ]);
          $data = new Comment;
          $data->content = $request->content;
          $data->item_id = $request->item;
          $data->user_id = $user->id;

          if ($data->save()) {
              return response()->json(['success'=>"yes",'cmid'=>$data->id]);
          }
          // return response()->json(['success'=>"yes",'cmid'=>1111]);
    }
    public function actonlike(Request $request){
      $user=Auth::user();
      switch ($request->action) {
          case 'like':
          $like=new like;
          $like->user=$user->id;
          $like->comment=$request->comment;
          Comment::where('id',$request->comment)->increment('likes');
          if($like->save()){
            return response()->json(['success'=>"yes"]);
          }
              break;
          case 'unlike':
              Comment::where('id',$request->comment)->decrement('likes');
              if(like::where('user', $user->id)->where('comment',$request->comment)->delete()){
                return response()->json(['success'=>"yes"]);
              }
              break;
      }
    }

    public function delete(Request $request){
      if(Comment::where('id', $request->comment)->delete()){
        return response()->json(['success'=>"yes"]);
      }
    }
}
