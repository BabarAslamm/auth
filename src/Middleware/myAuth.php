<?php

namespace Insyghts\Authentication\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Insyghts\Authentication\Models\SessionToken;



class myAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!isset($_SERVER['HTTP_TOKEN'])){
            return response()->json([
                'status' => 0,
                'message' => "Unauthenticated Token is Required"

            ]);
        }
        if(isset($_SERVER['HTTP_TOKEN'])){

            $Token = $_SERVER['HTTP_TOKEN'];
            
            // Checking User Session Existed or Not
            if(auth::user()){
                $user_id = auth::user()->id;
                $SessionToken = SessionToken::where('user_id' , $user_id)->first();
                if($SessionToken->token == $Token){

                    return $next($request);

                }else{
                    return response()->json([
                        'status' => 0,
                        'message' => "Unauthenticated Wrong Token"

                    ]);
                }

            }else{
                return response()->json([
                    'status' => 0,
                    'message' => "Login Session has been Ended please login first"

                ]);
            }




        }




    }

}
