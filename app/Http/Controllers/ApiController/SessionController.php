<?php

namespace app\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Event;
use App\Models\Meeting;
use App\Models\Role;
use App\User;

class SessionController extends Controller
{
    //
  public function __construct()
  {
    $user = Auth::user();
  }

  public function index()
  {
    $user = User::all();

    return json_encode($user);
  }

  public function user_login(Request $request){

    $email    = $request->email;
    $password = $request->password;

    $user = User::where('email', $email)->first();
    if ($user) {

        if (\Auth::attempt(['email' => $email, 'password' => $password])) {
          
          return json_encode([
            'message' => 'success',
            'api_token' => $user->api_token,
        ]);

        } else {
          return json_encode([
            'message' => 'fail',
            'error' => $exception->getMessage()
        ]);
        }
    } else {
      return json_encode([
        'message' => 'fail',
        'error' => $exception->getMessage()
    ]);
    }

            
  }

  

}