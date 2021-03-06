<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\PasswordReseting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\UserRegisterResource;
use App\Http\Resources\UserLoginResource;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\File;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;

class UserAuthController extends Controller
{


    //----------------- [ Register user ] -------------------
    public function registerUser(UserRegisterRequest $request)
    {

        // check if email already registered
        $user  = User::where('email', $request->email)->first();
        if (!is_null($user)) {
            return response([
                'error' => true,
                'message' => 'Sorry! this email is already registered!',
            ], Response::HTTP_OK);
        } else {
            $user = new User();
            $user->password =  Hash::make($request->password);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($user->save()) {
                return response([
                    'error' => false,
                    'message' => 'You have registered successfully',
                    'user' => new UserRegisterResource($user)
                ], Response::HTTP_CREATED);
            }
        }
    }



    // -------------- [ User Login ] ------------------

    public function userLogin(UserLoginRequest $request)
    {

        $user_status = User::where('email', $request->email)->count();
        if ($user_status > 0) {

            Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            //was any of those correct ?
            if (Auth::check()) {

                // getting auth user after auth login
                $user = Auth::user();
                return response([
                    'error' => false,
                    'message' => 'Success! you are logged in successfully',
                    'user' => new UserLoginResource($user)
                ], Response::HTTP_OK);
            } else {
                return response([
                    'error' => true,
                    'message' => 'Wrong email or password!',
                ], Response::HTTP_OK);
            }
        } else {
            return response([
                'error' => true,
                'message' => 'User with this email not found!',
            ], Response::HTTP_OK);
        }
    }


    public function updateProfile(Request $request)
    {
        $rules = [
            'username'    =>  'unique:users,username',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response([
                'error' => true,
                'message' => 'The username has already been taken.',
            ], Response::HTTP_CREATED);
        } else {

            $user = Auth::user();
            if ($request->username != null) {

                $user->username =  $request->username;
            }
            if ($request->phone != null) {

                $user->phone = $request->phone;
            }
            if ($request->DOB != null) {

                $user->DOB = $request->DOB;
            }
            if ($request->gender != null) {

                $user->gender =  $request->gender;
            }
            if ($request->about != null) {

                $user->about = $request->about;
            }
            if ($request->firstname != null) {

                $user->firstname = $request->firstname;
            }
            if ($request->lastname != null) {

                $user->lastname = $request->lastname;
            }

            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }

            if ($request->profile_pic_path != null && $request->profile_pic_path != '') {
                if ($this->validateString($request->profile_pic_path)) {  // return $request->profile_pic_path ;

                    $user->profile_pic_path = $this->moveUploadedFile($request->profile_pic_path, "UserProfilePics");
                } else {
                    return response([
                        'error' => true,
                        'message' => 'invalid base64 image string!',
                    ], Response::HTTP_CREATED);
                }
            }
            if ($user->update()) {

                return response([
                    'error' => false,
                    'message' => 'Profile updated successfully',
                    'user' => new UserLoginResoure($user)
                ], Response::HTTP_CREATED);
            }else {
                return response([
                    'error' => true,
                    'message' => 'Failed to update profile',
                ], Response::HTTP_CREATED);            }
        }
    }

    public function forgot_password(Request $request)
    {
        $rules = [
            'phone'    =>  'required|phone',
        ];
        // $error = Validator::make($request->all(), $rules);
        $password = str_random(4);


        $phoneexist = User::where('phone', $request->phone)->count();
        // if ($phoneexist <= 0) {
        //     return response([
        //         'error' => true,
        //         'message' => 'User not found',
        //     ], Response::HTTP_OK);
        // } else {
        $digits = 4;
        $token = random_int(10 ** ($digits - 1), (10 ** $digits) - 1);

        $status = PasswordReseting::where('phone', $request->phone)->count();
        if ($status > 0) {
            $pass =  PasswordReseting::where('phone', $request->phone)->first();
            $pass->phone = $request->phone;
            $pass->token = $token;
            $data = [
                'token'      =>  $token,
            ];
            if ($pass->update()) {

                $password_update = User::where('phone', $request->phone)->update([
                    'password' => Hash::make($password),
                ]);
                $phone_number1 = $request->phone;
                // dd($password_update);
                if ($password_update) {


                    $phone_number1 = preg_replace('/^0/', '254', $phone_number1);
                    $phone_number1 = preg_replace('/^7/', '2547', $phone_number1);
                    $phone_number1 = preg_replace('/^1/', '2541', $phone_number1);
                    $curl = curl_init();

                    //$tophone=$pno1;
                    //$message="A client is requesting your product (order no. $ordername). Please login to MyGas app to accept the order";

                    //$CallBackURL = 'https://tumefika.co.ke/admin/callback_url.php';
                    $curl_post_data = array('username' => 'yoosinpaddy', 'api_key' => 'h8f3OgwEVI1t7365C7p55nTJttuEkFDyQNydRMlSG9CBQ8ZF1Q', 'sender' => 'SMARTLINK', 'to' => $phone_number1, 'message' => 'Your Password reset is ' . $password, 'msgtype' => '5', 'dlr' => 'success');
                    $data_string = json_encode($curl_post_data);

                    curl_setopt($curl, CURLOPT_URL, 'https://sms.movesms.co.ke/api/compose');

                    curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-type: application/json", "ApiKey:109dfaa303aa452092a65361e9b4e8d6"]);

                    // curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

                    //$curl_response = curl_exec($curl);
                    echo '{"result":"';
                    curl_exec($curl);
                    // if ($result == 'Message Sent: 1701') {

                    echo '",
                        "error" : false,
                        "message" : "Password reset message sent"
                    }';
                    //  }else{

                    // return response([
                    //     'error' => true,
                    //     'message' => 'Failed to send message!',
                    // ], Response::HTTP_OK);
                    //  }

                }
            } else {
                return response([
                    'error' => true,
                    'message' => 'Failed to send message!',
                ], Response::HTTP_OK);
            }
        } else {

            $pass = new PasswordReseting();
            $pass->phone = $request->phone;
            $pass->token = $token;
            $data = [
                'token'      =>  $token,
            ];
            if ($pass->save()) {
                $password_update = User::where('phone', $request->phone)->update([
                    'password' => Hash::make($password),
                ]);
                if ($password_update) {
                    $curl = curl_init();

                    //$tophone=$pno1;
                    //$message="A client is requesting your product (order no. $ordername). Please login to MyGas app to accept the order";

                    //$CallBackURL = 'https://tumefika.co.ke/admin/callback_url.php';
                    $curl_post_data = array('username' => 'yoosinpaddy', 'api_key' => 'h8f3OgwEVI1t7365C7p55nTJttuEkFDyQNydRMlSG9CBQ8ZF1Q', 'sender' => 'SMARTLINK', 'to' => $request->phone, 'message' => 'Your Password reset is ' . $password, 'msgtype' => '5', 'dlr' => 'success');
                    $data_string = json_encode($curl_post_data);

                    curl_setopt($curl, CURLOPT_URL, 'https://sms.movesms.co.ke/api/compose');

                    curl_setopt($curl, CURLOPT_HTTPHEADER, ["Content-type: application/json", "ApiKey:109dfaa303aa452092a65361e9b4e8d6"]);

                    // curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

                    //$curl_response = curl_exec($curl);
                    //echo 'exercuting curl';
                    curl_exec($curl);
                }
                return response([
                    'error' => false,
                    'message' => 'Password reset message bsent',

                ], Response::HTTP_OK);
            } else {
                return response([
                    'error' => true,
                    'message' => 'Failed to send message!',
                ], Response::HTTP_OK);
            }
        }
        // }

    }
    public function token_connfrm(Request $request)
    {
        $rules = [
            'email'    =>  'required|email',
            'token'    =>  'required',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response(['errors' => $error->errors()->all()], Response::HTTP_OK);
        } else {
            $status = PasswordReseting::where('email', $request->email)->where('token', $request->token)->count();
            if ($status > 0) {
                return response([
                    'error' => false,
                    'message' => 'Password reset token validated',
                ], Response::HTTP_OK);
            } else {
                return response([
                    'error' => true,
                    'message' => 'Password reset token invalid!',
                ], Response::HTTP_OK);
            }
        }
    }
    public function changePassword(Request $request)
    {
        $rules = [
            'email'    =>  'required|email',
            'password'    =>  'required',
        ];
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response(['errors' => $error->errors()->all()], Response::HTTP_OK);
        } else {
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            if ($user->update()) {
                return response([
                    'error' => false,
                    'message' => 'Password updated successfuly!',
                ], Response::HTTP_OK);
            } else {
                return response([
                    'error' => true,
                    'message' => 'Password failed to update!',
                ], Response::HTTP_OK);
            }
        }
    }


    public function moveUploadedFile($param, $folder)
    {
        $image = str_replace('data:image/png;base64,', '', $param);
        $image = str_replace(' ', '+', $image);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $imageName = sprintf('%s.%0.8s', $basename, "png");

        $filePath = $folder . "/" . $imageName;
        // return Storage::disk('local')->put($filePath, $uploadedFile_base64) ? $filePath : false;
        //check if the directory exists
        if (!File::isDirectory($folder)) {
            //make the directory because it doesn't exists
            File::makeDirectory($folder);
        }
        if (\File::put(public_path() . '/' . $filePath, base64_decode($image))) {
            return $imageName;
        } else {
            return null;
        }
    }

    //function to validate base64 string

    public function validateString($s)
    {
        if (preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s) && base64_decode($s, true)) {
            return true;
        } else {
            return false;
        }
    }
}
