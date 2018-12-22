<?php

namespace App\Http\Middleware;

use Closure;

class checkNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // before middleware
        // $number = $request->number;
        // if($this->myCheckNumber($number)){
        //     return redirect()->route('notFound');
        // }
        // return $next($request);
        

        // after middleware
        $respone = $next($request);

        $number = $request->number;
        if($this->myCheckNumber($number)){
            return redirect()->route('notFound');
        }
        
        return $respone ;
    }

    private function myCheckNumber($num)
    {
        if($num % 2 == 0){
            return true;
        }
        return false;
    }
}
