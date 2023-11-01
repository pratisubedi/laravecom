<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Validator;
Use constGuards;
Use constDefaults;
Use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
 public function loginHandler(Request $request){
        $fieldType=filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email':'username';
            if($fieldType== 'email'){
            $request->validate([
                'login_id'=> 'required|email|exists:admins,email',
                'password'=> 'required|min:5|max:10'
            ],[
                'login_id.required'=> 'Email or Username is required',
                'login_id.email'=>'Invalid email address',
                'login_id.exists'=> 'Email is not exits in system',
                'password.required'=> 'Password is required'
            ]);
            }else{
            $request->validate([
                'login_id'=> 'required|exists:admins,username',
                'password'=> 'required|min:5|max:10'
            ],[
                'login_id.required'=> 'Email or Username is required',
                // 'login_id.email'=>'Invalid email address',
                'login_id.exists'=> 'Username is not exits in system',
                'password.required'=> 'Password is required'
            ]);
            }
            $creds=array(
            $fieldType=>$request->login_id,
            'password'=> $request->password
            );
            if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
            }else{
            session()->flash('fail','Incorrect user/email or password');
                return redirect()->route('admin.login');
            }
    }
  
  public function logoutHandler(Request $request){
    Auth::guard('admin')->logout();
    session()->flash('fail','You are logged out');
    return redirect()->route('admin.login');
  }

  public function sendPasswordResetLink(Request $request) {
            // dd($request->all());
            $request->validate([
                'email' => 'required|email|exists:admins,email',
            ], [
                'email.required' => 'The :attribute is required',
                'email.email' => 'Invalid email address',
                'email.exists' => 'The :attribute does not exist in the system'
            ]);

            // Get admin details
            $admin = Admin::where('email', $request->email)->first();

            // Generate token
            $token = base64_encode(Str::random(64));

            // Check if there is an existing reset password token
            $oldToken = DB::table('password_reset_tokens')
                ->where([
                    ['email', '=', $request->email],
                    ['guard', '=', constGuards::ADMIN]
                ])
                ->first();

            if ($oldToken) {
                // Update token
                DB::table('password_reset_tokens')
                    ->where([
                        ['email', '=', $request->email],
                        ['guard', '=', constGuards::ADMIN]
                    ])
                    ->update([
                        'token' => $token,
                        'created_at' => Carbon::now()
                    ]);
            } else {
                DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'guard' => constGuards::ADMIN,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            }

            $actionLink = route('admin.reset-password', ['token' => $token, 'email' => $request->email]);
            $data = [
                'actionLink' => $actionLink,
                'admin' => $admin
            ];
            $mail_body = view('email-templates.admin-forgot-email-template', $data)->render();
            $mailConfig = [
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $admin->email,
                'mail_recipient_name' => $admin->name,
                'mail_subject' => 'Reset password',
                'mail_body' => $mail_body,
            ];

            if (sendEmail($mailConfig)) {
                session()->flash('success', 'We have emailed your password reset link.');
                return redirect()->route('admin.forgot-password');
            } else {
                session()->flash('fail', 'Something went wrong!!!');
                return redirect()->route('admin.forgot-password');
            }
        }
        public function profileView(Request $request){
            $admin=null;
            if(Auth::guard('admin')->check()){
                $admin = Admin::findOrfail(auth()->id());
            }
            return view('back.pages.admin.profile', compact('admin'));
        }

        public function changeProfilePicture(Request $request, $id){
            // dd($request->all());
            if(Auth::guard('admin')->check()){
                $admin = Admin::findOrfail(auth()->id());
            }
            $oldImage=$admin->image;
            if(File::exists(public_path('/images/admins'.$oldImage))){
                File::delete(public_path('/images/admins'.$oldImage));
                //File::delete(public_path('storage/' . $oldImagePath));
            }
            $newImage = time().'.'.$request->adminProfilePictureFile->extension();
            dd($newImage);
        }

}