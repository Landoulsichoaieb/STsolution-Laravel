<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileimgController;
use App\Http\Controllers\DestextController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AddCompanyController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SearchtagsController;
use App\Http\Controllers\UsertagController;
use App\Http\Controllers\PhonenbrController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\InterrestedController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TimelinefetchController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Post('register',[UserController::class,'register']);
Route::Post('login',[UserController::class,'login']);
Route::Post('updatepassword/{id}',[UserController::class,'updatepassword']);
Route::Post('editdesc/{id}',[DestextController::class,'editdesc']);
Route::Post('uploadimg/{id}',[ProfileimgController::class,'uploadimg']);
Route::GET('getimg/{id}',[ProfileimgController::class,'getimg']);
Route::Post('uploadcv/{id}',[CvController::class,'uploadcv']);
Route::Post('role/{id}/{role}',[RolesController::class,'role']);
Route::GET('getrole/{id}',[RolesController::class,'getrole']);
Route::Post('addcompany/{id}',[AddCompanyController::class,'addcompany']);
Route::GET('getcompany',[AddCompanyController::class,'getcompany']);
Route::GET('getdesc/{id}',[DestextController::class,'getdesc']);
Route::GET('getuser/{id}',[UserController::class,'getuser']);
Route::Post('followcomp/{id}',[FollowController::class,'followcomp']);
Route::Post('unfollowcomp/{id}',[FollowController::class,'unfollowcomp']);
Route::GET('getfollow/{id}/{companyid}',[FollowController::class,'getfollow']);
Route::GET('gettags/{id}',[SearchtagsController::class,'gettags']);
Route::Post('edittag/{tag}/{id}',[UsertagController::class,'edittag']);
Route::GET('getusertag/{id}',[UsertagController::class,'getusertag']);
Route::Post('editphone/{id}',[PhonenbrController::class,'editphone']);
Route::GET('getphone/{id}',[PhonenbrController::class,'getphone']);
Route::GET('searchzone/{key}',[UserController::class,'searchzone']);
Route::GET('getcompanysolo/{id}',[AddCompanyController::class,'getcompanysolo']);
Route::Post('addpost/{id}',[PostsController::class,'addpost']);
Route::GET('getmyposts/{id}',[PostsController::class,'getmyposts']);
Route::GET('getfollowedposts/{id}',[PostsController::class,'getfollowedposts']);
Route::GET('getbypost/{id}',[PostsController::class,'getbypost']);
Route::Post('interrested/{id}',[InterrestedController::class,'interrested']);
Route::GET('countinter/{id}',[InterrestedController::class,'countinter']);
Route::GET('countfollow/{id}',[InterrestedController::class,'countfollow']);
Route::GET('followerbyid/{id}',[FollowController::class,'followerbyid']);
Route::Post('delpost/{id}',[PostsController::class,'delpost']);
Route::GET('getinterrested/{id}',[InterrestedController::class,'getinterrested']);
Route::GET('getcv/{id}',[CvController::class,'getcv']);
Route::GET('getuserposttag/{id}/{post}',[PostsController::class,'getuserposttag']);
Route::POST('acceptreq',[InterrestedController::class,'acceptreq']);
Route::POST('declinereq',[InterrestedController::class,'declinereq']);
Route::GET('getuserinter/{id}',[InterrestedController::class,'getuserinter']);
Route::GET('getifaccepted/{id}/{post}',[InterrestedController::class,'getifaccepted']);
Route::POST('Addtimeline',[TimelineController::class,'Addtimeline']);
Route::GET('gettimeline/{id}/{post}',[TimelineController::class,'gettimeline']);
Route::GET('gettimelinebyid/{id}',[TimelineController::class,'gettimelinebyid']);
Route::POST('schedule',[TimelinefetchController::class,'schedule']);
Route::GET('feedback/{id}',[TimelinefetchController::class,'feedback']);
Route::POST('requestmeet',[TimelinefetchController::class,'requestmeet']);
Route::POST('sendmessage',[MessageController::class,'sendmessage']);
Route::GET('getmessage/{id}',[MessageController::class,'getmessage']);







