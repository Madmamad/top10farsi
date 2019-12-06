<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\Services\FileService\MyFileHandlerInterface;
use Illuminate\Support\Facades\Storage;
use App\UploadFile;
use App\Top10;
use App\Item;

class ItemController extends Controller
{
    //
    public function create($id)
    {
        $list=Top10::find($id);
        return view('pages.add-item',["list"=>$list]);
    }

    public function store(MyFileHandlerInterface $file_handler,Request $request,$id)
    {

        // $validatedData = $request->validate([
        //     'name' => 'required|unique:products',
        //     'amount' => 'required|numeric',
        //     'company' => 'required',
        //     'available' => 'required',
        //     'description' => 'required',
        // ]);
        $user=Auth::user();
        Item::create(['title'=>$request->title,
                  'description'=>$request->description,
                  'top10_id'=>$id,
                  'user_id'=>$user->id
          ]);
        $mypath=  $file_handler->storef($request->file('image'));
        $item_id=Item::latest()->value('id');
        UploadFile::create(['list_id'=>$id,
                            'item_id'=>$item_id,
                            'address' => $mypath]);
        // $file_handler->storef($request->file('image'),$request->file('image')->getClientOriginalName(),'photos');
        // $file=new UploadFile();
        // $file->address='photos/'.$request->file('image')->getClientOriginalName();
        // $file->list_id=$id;
        // $file->item_id=Item::latest()->value('id');
        // $file->save();
        return view('welcome');

    }

    public function actOnVote(Request $request){
      $action = $request->action;
      $id=$request->item;
    switch ($action) {
        case 'vote':
            Item::where('id', $id)->increment('votes');
            break;
        case 'unvote':
            Item::where('id', $id)->decrement('votes');
            break;
    }
    return response()->json(['success'=>"yes"]);
    }
}
