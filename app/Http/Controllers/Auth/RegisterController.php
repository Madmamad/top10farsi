<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Userpic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Library\Services\FileService\MyFileHandlerInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class RegisterController extends Controller implements MyFileHandlerInterface
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $file_handler;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MyFileHandlerInterface $file_handler)
    {
        $this->middleware('guest');
        $this->file_handler = $file_handler;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    public function loadf()
    {

    }

    public function storef($file)
    {
      $mypath = $file->store('public/photos');
      return $mypath;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create (array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function registered(Request $request, $user)
    {
        if($request->file('image')){
          $path  = $this->file_handler->storef($request->file('image'));
        }
        else {
          $path=env('DEFAULT_PICTURE','default_value');
        }
        Userpic::create([
            'address' => $path,
            'user_id' => $user->id,
        ]);
    }
}
