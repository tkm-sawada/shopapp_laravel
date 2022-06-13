<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';
    protected $admin_route = 'admin.login';
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // 各権限の画面に未ログインでアクセスした場合の処理
            if(Route::is('owner.*')){
                // ownerログイン画面へリダイレクト
                return route($this->owner_route);
            }elseif(Route::is('admin.*')){
                // adminログイン画面へリダイレクト
                return route($this->admin_route);
            }else{
                // user画面へリダイレクト
                return route($this->user_route);
            }
        }
    }
}
