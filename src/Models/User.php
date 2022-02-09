<?php

namespace Insyghts\Authentication\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Insyghts\Authentication\Models\SessionToken;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Http\Request;


class User extends Model
{

    use HasFactory , AuthenticableTrait;

    protected $fillable = [
       'contact_id' , 'username', 'password', 'user_type', 'status' ,'created_by','last_modified_by','deleted_by'
    ];
    public function token()
    {
        return $this->hasOne(SessionToken::class, 'user_id');

    }

    public function login($data, &$response){

        if($data['username'] == ''){
            $response['data'] = "Username field is required";
        }
        elseif($data['password'] == ''){
            $response['data'] = "Password field is required";
        }
        elseif( $User = User::where('username', $data['username'])->first()){
                $credentials = array(
                    "username" => $data['username'],
                    "password" => $data['password'],
                );

                if(Auth::attempt($credentials)) {
                    $TokenExist = User::find($User->id)->token;
                    // This filter check token of user already existed , if old Token record found then delete the record and add new token record in SessionToken table
                    if($TokenExist){
                        $TokenExist->delete();
                        $Token = md5(uniqid(rand(), true));
                        $expiry = Carbon::now()->addDay();
                        $status = 'A';

                        $SessionToken = new SessionToken();
                        $SessionToken->user_id = $User->id;
                        $SessionToken->token = $Token;
                        $SessionToken->expiry = $expiry;
                        $SessionToken->status = $status;

                        //New Column
                        $SessionToken->created_by = $User->id;

                        $SessionToken->save();
                        // Session::put('auth', auth::user());

                        $response['data'] = "Token generated successfully";
                        $response['token'] = $Token;
                        $response['success'] = 1;

                    }else{

                        $Token = md5(uniqid(rand(), true));
                        $expiry = Carbon::now()->addDay();
                        $status = 'A';

                        $SessionToken = new SessionToken();
                        $SessionToken->user_id = $User->id;
                        $SessionToken->token = $Token;
                        $SessionToken->expiry = $expiry;
                        $SessionToken->status = $status;

                        //New Column
                        $SessionToken->created_by = $User->id;

                        $SessionToken->save();
                        // Session::put('auth', auth::user());

                        $response['data'] = "Token generated successfully";
                        $response['token'] = $Token;
                        $response['success'] = 1;

                    }

                }else{
                    $response['data'] = "Invalid Password";
                }

        }else{
            $response['data'] = "Invalid Username";
        }
    }















}
