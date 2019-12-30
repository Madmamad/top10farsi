<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\Services\FileService\MyFileHandlerInterface;
use Illuminate\Support\Facades\Storage;
use App\UploadFile;
use App\Top10;
use App\Item;
use App\Userpic;
use App\vote;
use Log;

class ItemController extends Controller
{
    //
    public function create($id)
    {
        $list=Top10::find($id);
        $user=Auth::user();
        $userpic=Userpic::where('user_id',$user->id)->get();
        return view('pages.add-item',["list"=>$list,'userpic'=>$userpic,'username'=>$user->name]);
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
                  'user_id'=>$user->id,
                  'user_name'=>$user->name
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
      $list=$request->list;
      $withdraw=$request->withdraw;
      $user=Auth::user();
      $double=$request->double;
      Log::info('withdrawal is '. $withdraw . ' the vote is '.$action);
        switch ($action) {
            case 'vote':
                if($withdraw=='false'){
                  Item::where('id', $id)->increment('votes');
                  $vote = vote::create(['list' => $list,'item'=>$id,'user'=>$user->id]);
                  $vote->thevote='plus';
                  $vote->save();
                  Log::info('double is '.$double);
                  if($double==false){
                    Log::info('doubled');
                    Item::where('id', $id)->increment('votes');
                    vote::where('item', $id)->where('user',$user->id)->where('thevote','minus')->delete();
                  }
                }
                else{
                  Log::info('shit is where it shouldnt be');
                  Item::where('id', $id)->decrement('votes');
                  vote::where('item', $id)->where('user',$user->id)->delete();
                }
                break;
            case 'unvote':
                if($withdraw=='false'){
                  Item::where('id', $id)->decrement('votes');
                  $vote = vote::create(['list' => $list,'item'=>$id,'user'=>$user->id]);
                  $vote->thevote='minus';
                  $vote->save();
                  if($double==false){
                    Log::info('doubled');
                    Item::where('id', $id)->decrement('votes');
                    vote::where('item', $id)->where('user',$user->id)->where('thevote','plus')->delete();
                  }
                }
                else{
                  Item::where('id', $id)->increment('votes');
                  vote::where('item', $id)->where('user',$user->id)->delete();
                }
                break;
        }
    return response()->json(['success'=>"yes"]);
    }
}
