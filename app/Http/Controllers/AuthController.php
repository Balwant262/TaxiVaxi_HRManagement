<?php

    namespace App\Http\Controllers;

    use App\Models\Event;
    use App\Models\Meeting;
    use App\Models\Role;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Contracts\Mail\Mailer;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Hash;
    use DB;
    use App\Models\GoodThoughts;
    use App\Models\Notification;
    use App\Models\Announcement;

    class AuthController extends Controller
    {
        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }

        public function showLogin()
        {
            return view('auth.login');
        }

        public function doLogin(Request $request)
        {
            $email    = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->first();
            if ($user) {

                if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                    $goodthoughts = GoodThoughts::orderBy('created_at', 'desc')->take(5)->get();
                    return view('auth.welcome', compact('goodthoughts'));
                } else {
                    \Session::flash('class', 'alert-danger');
                    \Session::flash('message', 'User id or password does not match!');
                }
            } else {
                \Session::flash('class', 'alert-danger');
                \Session::flash('message', 'User id or password does not match!');
            }

            return redirect()->to('/');
        }

        public function doLogout()
        {
            \Auth::logout();

            return redirect()->to('/');
        }

        public function dashboard()
        {
            $events   = $this->convertToArray(Event::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
            $meetings = $this->convertToArray(Meeting::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
            $goodthoughts = GoodThoughts::orderBy('created_at', 'desc')->take(5)->get();
            
            $date = \Carbon\Carbon::today()->addDays(1);
            $announcements = Announcement::orderBy('created_at', '')->where('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 2 DAY)'))->get();
            $notifications = Notification::orderBy('created_at', '')->where('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL 2 DAY)'))->get();
            return view('dashboard', compact('events', 'meetings','goodthoughts','announcements','notifications'));
        }

        public function welcome()
        {
            $goodthoughts = GoodThoughts::orderBy('created_at', 'desc')->take(5)->get();
            return view('auth.welcome', compact('goodthoughts'));
        }

        public function notFound()
        {
            return view('auth.not_found');
        }

        public function showRegister()
        {
            return view('auth.register');
        }

        public function doRegister(Request $request)
        {
            return view('auth.register');
        }

        public function calendar()
        {
            return view('auth.calendar');
        }

        public function changePassword()
        {
            return view('auth.change');
        }

        public function processPasswordChange(Request $request)
        {
            $password = $request->old;
            $user     = User::where('id', \Auth::user()->id)->first();


            if (Hash::check($password, $user->password)) {
                $user->password = bcrypt($request->new);
                $user->save();
                \Auth::logout();

                return redirect()->to('/')->with('message', 'Password updated! LOGIN again with updated password.');
            } else {
                \Session::flash('flash_message', 'The supplied password does not matches with the one we have in records');

                return redirect()->back();
            }
        }

        public function resetPassword()
        {
            return view('auth.reset');
        }

        public function processPasswordReset(Request $request)
        {
            $email = $request->email;
            $user  = User::where('email', $email)->first();

            if ($user) {
                $string = strtolower(str_random(6));


                $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                    $message->from('no-reply@dipi-ip.com', 'Digital IP Insights');
                    $message->to($user->email, $user->name)->subject('Your new password');
                });

                \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

                return redirect()->to('/')->with('message', 'Login with your new password received on your email');
            } else {
                return redirect()->to('/')->with('message', 'Your email is not registered');
            }

        }

        public function convertToArray($values)
        {
            $result = [];
            foreach ($values as $key => $value) {
                $result[$key] = $value;
            }

            return $result;
        }

    }
