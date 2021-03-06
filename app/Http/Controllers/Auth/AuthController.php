<?php

namespace App\Http\Controllers\Auth;

use App\SocialAccountService;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $registerView = 'signup';

    private $accountService;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(SocialAccountService $accountService)
    {
        $this->accountService = $accountService;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'city' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'city'      => $data['city'],
            'address'   => $data['address'],
            'phone'     => $data['phone'],
            'password'  => bcrypt($data['password']),
        ]);

        if (isset($data['provider']) && $data['provider'] != '') {
            $socialData = [
                'provider_user_id'  => $data['provider_user_id'],
                'provider'          => $data['provider']
            ];

            $this->accountService->createSocialAccountByData($user, $socialData);
        }

        return $user;

    }

    /**
     * Override the register function on the trait
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        return redirect('success');
    }
}
