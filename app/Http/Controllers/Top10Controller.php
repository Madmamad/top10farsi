<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\Services\FileService\MyFileHandlerInterface;
use Illuminate\Support\Facades\Storage;
use App\UploadFile;
use App\Top10;
use App\Item;
use App\Comment;
use App\User;
use App\like;
use App\Userpic;
use App\vote;

class Top10Controller extends Controller
{
    //
    public function create(){
        $user=Auth::user();
        $userpic=Userpic::where('user_id',$user->id)->get();
        return View('pages.add-top10',['userpic'=>$userpic,'username'=>$user->name]);
    }

    public function store(MyFileHandlerInterface $file_handler,Request $request){
//validate
        // $validatedData = $request->validate([
        //     'title'=>'bail|required',
        //     'description' => 'required',
        // ]);
//create model
        $user=Auth::user();
        Top10::create(['title'=>$request->title,'user_id'=>$user->id,'description'=>$request->description]);
        $list_id=Top10::latest()->value('id');
        $mypath=$file_handler->storef($request->file('image'));
        UploadFile::create(['list_id'=>$list_id,
                            'type'=>'list_image',
                            'address' => $mypath]);
        // $file_handler->storef($request->file('image'),$request->file('image')->getClientOriginalName(),'photos');
        return View('welcome');

    }

    public function show($id){
      //get items and item images and list image
        $list=Top10::find($id);
        $items = Item::with('author')
        ->orderBy('votes', 'desc')
        ->where('top10_id',$id)
        ->get();
        $images = UploadFile::where('list_id', $id)->where('type','item_image')->get();
        $pic=UploadFile::where('list_id', $id)->where('type','list_image')->get();
        $hooplas=Top10::orderBy('updated_at', 'desc')->take(8)->get();
        $comments=$list->comments;
        $top10=$list->title;
        $date=$list->created_at;
        $desc=$list->description;
        if($user=Auth::user()){
          $likes=like::where('user', $user->id)->get();
          $guest=false;
          $usercomments=$comments->where('user_id',$user->id);
          $userpic=Userpic::where('user_id',$user->id)->get();
          $votes=vote::where('user',$user->id)->where('list',$id)->get();
          return view('pages.top10', ['usercomments'=>$usercomments,'userpic'=>$userpic,'username'=>$user->name,'hooplas'=>$hooplas,'list'=>$id,'items' => $items,'images'=>$images ,'picture'=>$pic ,'id'=>$id , 'comments'=>$comments,'top10'=>$top10,'user'=>$user->name,
          'date'=>$date ,'desc'=>$desc , 'likes'=>$likes,'guest'=>$guest,'votes'=>$votes]);
        }
        else{
          $user = User::find(1000);
          $likes=like::where('user', $user->id)->get();
          $guest=true;
          $userpic=Userpic::where('user_id',$user->id)->get();
          return view('pages.top10', ['userpic'=>$userpic,'username'=>$user->name,'hooplas'=>$hooplas,'list'=>$id,'items' => $items,'images'=>$images ,'picture'=>$pic ,'id'=>$id , 'comments'=>$comments,'top10'=>$top10,'user'=>$user->name,
          'date'=>$date ,'desc'=>$desc , 'likes'=>$likes ,'guest'=>$guest]);
        }
        //view
    }
}
