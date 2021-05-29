<?php

use App\Http\Actions\AddPointAction;
use App\Http\Middleware\TeaPotMiddleware;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::put('/customers/add_point', AddPointAction::class);

Route::middleware(TeaPotMiddleware::class)->get(
    '/live',
    function () {
        return response()->json(['message' => 'working']);
    }
);

Route::post('/send-email', function (Request $request, Mailer $mailer) {
    // App\Mail\Sampleは、Mailableインタフェースを実装したクラス
    $mail = new App\Mail\Sample();

    // sendメソッドにMailableインタフェースを実装したクラスを指定
    $mailer->to($request->get('to'))->send($mail);
    return response()->json('ok');
});

Route::post('/send-email-facade', function (Request $request) {
    $mail = new App\Mail\Sample();
    Mail::to($request->get('to'))->send($mail);

    return response()->json('ok');
});

Route::middleware('auth:sanctum')->get(
    '/sanctum-user',
    function (Request $request) {
        return $request->user();
    }
);
