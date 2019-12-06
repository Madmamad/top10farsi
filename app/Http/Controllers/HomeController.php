<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\UploadFile;
use App\Top10;
use JavaScript;
use View;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      $top10s=[];
      $top10s=Top10::orderBy('id', 'desc')->take(10)->get();
      $images=[];
      $images=UploadFile::where('list_id', $top10s[0]->id)
                          ->orWhere('list_id',$top10s[1]->id)
                          ->orWhere('list_id',$top10s[2]->id)
                          ->orWhere('list_id',$top10s[3]->id)
                          ->orWhere('list_id',$top10s[4]->id)
                          ->orWhere('list_id',$top10s[5]->id)
                          ->orWhere('list_id',$top10s[6]->id)
                          ->orWhere('list_id',$top10s[7]->id)
                          ->orWhere('list_id',$top10s[8]->id)
                          ->orWhere('list_id',$top10s[9]->id)
                          ->get();
      $hooplas=Top10::orderBy('updated_at', 'desc')->take(5)->get();
      $hoopla_images=UploadFile::where('list_id', $hooplas[0]->id)
                          ->orWhere('list_id',$hooplas[1]->id)
                          ->orWhere('list_id',$hooplas[2]->id)
                          ->orWhere('list_id',$hooplas[3]->id)
                          ->orWhere('list_id',$hooplas[4]->id)
                          ->get();
      JavaScript::put(['js10titles'=>[$hooplas[0]->title,
                          $hooplas[1]->title,
                          $hooplas[2]->title,
                          $hooplas[3]->title,
                          $hooplas[4]->title
                        ],
                        'js10descs'=>[
                          $hooplas[0]->description,
                          $hooplas[1]->description,
                          $hooplas[2]->description,
                          $hooplas[3]->description,
                          $hooplas[4]->description,
                        ]
                      ]);
      return View::make('pages.home',['top10s'=>$top10s,
      'images'=>$images,
      'hooplas'=>$hooplas,
      'hoopla_images'=>$hoopla_images,
      'js10titles'=>[$hooplas[0]->title,
                          $hooplas[1]->title,
                          $hooplas[2]->title,
                          $hooplas[3]->title,
                          $hooplas[4]->title
                        ],
                        'js10descs'=>[
                          $hooplas[0]->description,
                          $hooplas[1]->description,
                          $hooplas[2]->description,
                          $hooplas[3]->description,
                          $hooplas[4]->description,
                        ]
      ]);
  }
}
