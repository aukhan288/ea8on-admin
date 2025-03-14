<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Wallet;
use App\Models\FavoriteProduct;
use App\Models\OtpVerification;
use App\Http\Requests\UserSignUpRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{


    /**
     * Handle user sign-up.
     *
     * @param  UserSignUpRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */

    function index() {
        $title='Users';
        return view('users',compact('title'));
    }
    public function signup(Request $request)
    {
    
        try {

  

            $account_sid = getenv("TWILIO_SID");

            $auth_token = getenv("TWILIO_TOKEN");

            $twilio_number = getenv("TWILIO_FROM");

            $otp = '123456';//random_int(100000, 999999); 

            // $client = new Client($account_sid, $auth_token);

            // $client->messages->create('+923002969860', [

            //     'from' => $twilio_number, 

            //     'body' => 'Yor otp is '. $otp]);

                $otpVerification=OtpVerification::create([
                    'mobile'=>$request->mobile,
                    'otp'=>$otp
                ]);

                return response()->json([
                    'message' => 'OTP has been sent to '.$request->mobile,
                    'success' => true
                ], 200);

         

  

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], 400);

        }
        
        // try{
        //     // DB::beginTransaction();   
        //     $user = User::create([
        //         'name' => $request->name,
        //         'plate_form' => $request->plate_form??'web',
        //         'contact' => $request->mobile,
        //         'password' => Hash::make($request->password),
        //         'ref_code' => $request->ref_code??null
        //     ]);
        //     // if($user){
        //     //    $wallet=Wallet::create(['user_id'=>$user?->id, 'balance'=>0.00]);
        //     // }
        //     // DB::commit();
        //     // Return a success response
        //     return response()->json([
        //         'message' => 'Account created successfully.',
        //          'user'=>$user,
        //         'success' => true
        //     ], 201);
        // }catch(Exception $e) {
        //     // DB::rollback();
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->message()
        //     ], 400);
        // }
        
    }

    //login
    
    public function VerifySignupOtp(Request $request)
    {
         try{

            $otpVerification=OtpVerification::where('mobile', $request->mobile)->first();
            if($otpVerification->otp==$request->otp){

                $user = User::create([
                        'name' => $request->name,
                        'plate_form' => $request->plate_form??'web',
                        'contact' => $request->mobile,
                        'app_key' => $request->fcmToken,
                        'password' => Hash::make($request->password),
                        'ref_code' => $request->ref_code??null
                    ]);
                $favourite= FavoriteProduct::where('user_id', $user?->id)->get('id');

                return response()->json([
                    'message' => 'OTP Varified.',
                    'user'=> $user,
                    'favourite'=>$favourite,
                    'success' => true
                ], 201);
            }else{
                return response()->json([
                    'message' => 'Invalid OTP.',
                    'success' => false
                ], 401);
            }
            // DB::beginTransaction();   
            // $user = User::create([
            //     'name' => $request->name,
            //     'plate_form' => $request->plate_form??'web',
            //     'contact' => $request->mobile,
            //     'password' => Hash::make($request->password),
            //     'ref_code' => $request->ref_code??null
            // ]);
            // if($user){
            //    $wallet=Wallet::create(['user_id'=>$user?->id, 'balance'=>0.00]);
            // }
            // DB::commit();
            // Return a success response
         
        }catch(Exception $e) {
            // DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->message()
            ], 401);
        }
    }
    public function login(Request $request)
    {
        // Log the incoming request data
        Log::debug('Request data:', $request->all());
    
        // Attempt to authenticate the user using mobile and password
        if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password], $request->remember)) {
            $user = Auth::user();
            Log::debug('Authenticated user:', $user->toArray());
    
            // Manually trigger the session login (this updates remember_token)
            Auth::login($user, true); // This sets the remember_token if needed.
    
            // Update the FCM token (app_key)
            if ($request->has('fcmToken')) {
                $user->update(['app_key' => $request->fcmToken]);
                Log::debug('FCM token updated for user', ['fcmToken' => $request->fcmToken]);
            }
    
            // Create a personal access token
            $user->token = $user->createToken('Personal Access Token')->plainTextToken;
    
            // Get the user's favorite products
            $favourite = FavoriteProduct::where('user_id', $user->id)->get(['product_id']); 
    
            return response()->json([
                'code' => 200,
                'message' => 'Login successfully',
                'data' => [
                    'user' => $user,
                    'favourite' => $favourite,
                    'token' => $user->token, // Include the generated token
                ]
            ], 200);
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Unauthorized',
                'error' => 'Invalid mobile number or password.',
            ], 401);
        }
    }
    
    
    

    public function fileUpload(ImageUploadRequest $request){

        if ($request->hasFile('attachment')) {
            $folder='';

            $attachment = $request->file('attachment');
            if(in_array($request->attachment->getClientOriginalExtension(),['jpg', 'jpeg', 'png'])){
                $folder='images';
            }else{
                $folder='attachments';
            }
            
            $filename = time() . '.' . $attachment->getClientOriginalExtension();
            
            $attachment->move(public_path($folder), $filename);
    
            return response()->json([
                'success' => true,
                'message' => 'File uploaded successfully',
                'file_path' =>  $folder.'/' . $filename
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No file found in request'
            ], 400);
        }

    }
    public function getWallet(Request $request){

        try {
            $wallet = Wallet::with('transactions')->where('user_id', $request->user()->id)->first();
            return response()->json([
                'success' => true,
                'wallet' => $wallet
            ]);
        } catch(Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'No image file found in request'
            ], 400);
        }

    }



    function userList(Request $request)
    {
        $users = User::where('role_id',2)->paginate($request->input('length', 10)); // Default is 10 records per page
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $users->total(),
            'recordsFiltered' => $users->total(),
            'data' => $users->items(),
        ]);
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => true, 'message' => 'User deleted successfully']);
    }

    public function profileUpdate(Request $request, User $user) {
 
        try{

            if ($request->has('name')) {
                $user['name'] = $request->name;
            }
            if ($request->has('country_code')) {
                $user['country_code'] = $request->country_code;
            }
            if ($request->has('contact')) {
                $user['contact'] = $request->contact;
            }
            if ($request->hasFile('image')) {
                $user['image'] = $request->file('image')->store('images', 'public'); // Adjust the path as needed
            }

            $user->save();

              return response()->json([
                'code' => 200,
                'message' => 'Login successfully',
                'data' => [
                    'user' => $user
                ]
            ], 200);
 
        } 
        catch(Exception $e) {
         
        }

    }
    public function changePassword(ChangePasswordRequest $request, User $user) {
        try{

            $user=User::update([
                'password' => Hash::make($request->newPassword)
            ]);
            return response()->json(['success'=>true, 'message' => 'Password changed successfully!'], 200);
        } 
        catch(Exception $e) {
            return response()->json(['success'=>false, 'message' => 'Someting went wrong. Please try later'], 400);
        }

    }
    
   
    public function show($id) {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    public function logout(Request $request)
    {
        // Revoke the user's current token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'Logged out successfully.']);
    }

    public function userProfile(Request $request)
    {
        return response()->json($request->user());
    }
}
