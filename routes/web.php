<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sanphamcontroller;
use App\Http\Controllers\nhanviencontroller;
use App\Http\Controllers\LoaiSPController;
use App\Http\Controllers\userscontroller;
use App\Http\Controllers\khocontroller;
use App\Http\Controllers\newscontroller;
use App\Http\Controllers\phan_hoicontroller;
use App\Http\Controllers\quang_caocontroller;
use App\Http\Controllers\slidecontroller;
use App\Http\Controllers\nhacungcapcontroller;
use App\Http\Controllers\bills_nhapcontroller;
use App\Http\Controllers\billsdetailnhapcontroller;
use App\Http\Controllers\bills_bancontroller;
use App\Http\Controllers\bill_detail_bancontroller;
use App\Http\Controllers\khach_hangcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return "<h1>Hello world!</h1>";
});

Route::get('/admin/nhanvien/add',[nhanviencontroller::class,'add']);
Route::post('/admin/nhanvien/create',[nhanviencontroller::class,'create']);
Route::get('/admin/nhanvien',[nhanviencontroller::class,'index']);
Route::get('/admin/nhanvien/{id}/show',[nhanviencontroller::class,'show']);
Route::get('/admin/nhanvien/{id}/delete',[nhanviencontroller::class,'destroy']);
Route::post('/admin/nhanvien/update',[nhanviencontroller::class,'update']);

Route::get('/admin/LoaiSP/add',[LoaiSPController::class,'add']);
Route::post('/admin/LoaiSP/create',[LoaiSPController::class,'create']);
Route::get('/admin/LoaiSP',[LoaiSPController::class,'index']);
Route::get('/admin/LoaiSP/{id}/show',[LoaiSPController::class,'show']);
Route::post('/admin/LoaiSP/update',[LoaiSPController::class,'update']);
Route::get('/admin/LoaiSP/{id}/destroy',[LoaiSPController::class,'destroy']);

Route::get('/admin/users/add',[userscontroller::class,'add']);
Route::post('/admin/users/create',[userscontroller::class,'create']);
Route::get('/admin/users',[userscontroller::class,'index']);
Route::get('/admin/users/{id}/show',[userscontroller::class,'show']);
Route::post('/admin/users/update',[userscontroller::class,'update']);
Route::get('/admin/users/{id}/destroy',[userscontroller::class,'destroy']);

Route::get('/admin/kho/add',[khocontroller::class,'add']);
Route::post('/admin/kho/create',[khocontroller::class,'create']);
Route::get('/admin/kho',[khocontroller::class,'index']);
Route::get('/admin/kho/{id}/show',[khocontroller::class,'show']);
Route::post('/admin/kho/update',[khocontroller::class,'update']);
Route::get('/admin/kho/{id}/destroy',[khocontroller::class,'destroy']);

Route::get('/admin/news/add',[newscontroller::class,'add']);
Route::post('/admin/news/create',[newscontroller::class,'create']);
Route::get('/admin/news',[newscontroller::class,'index']);
Route::get('/admin/news/{id}/show',[newscontroller::class,'show']);
Route::post('/admin/news/update',[newscontroller::class,'update']);
Route::get('/admin/news/{id}/destroy',[newscontroller::class,'destroy']);

Route::get('/admin/phan_hoi/add',[phan_hoicontroller::class,'add']);
Route::post('/admin/phan_hoi/create',[phan_hoicontroller::class,'create']);
Route::get('/admin/phan_hoi',[phan_hoicontroller::class,'index']);
Route::get('/admin/phan_hoi/{id}/show',[phan_hoicontroller::class,'show']);
Route::post('/admin/phan_hoi/update',[phan_hoicontroller::class,'update']);
Route::get('/admin/phan_hoi/{id}/destroy',[phan_hoicontroller::class,'destroy']);

Route::get('/admin/quang_cao/add',[quang_caocontroller::class,'add']);
Route::post('/admin/quang_cao/create',[quang_caocontroller::class,'create']);
Route::get('/admin/quang_cao',[quang_caocontroller::class,'index']);
Route::get('/admin/quang_cao/{id}/show',[quang_caocontroller::class,'show']);
Route::post('/admin/quang_cao/update',[quang_caocontroller::class,'update']);
Route::get('/admin/quang_cao/{id}/destroy',[quang_caocontroller::class,'destroy']);

Route::get('/admin/slide/add',[slidecontroller::class,'add']);
Route::post('/admin/slide/create',[slidecontroller::class,'create']);
Route::get('/admin/slide',[slidecontroller::class,'index']);
Route::get('/admin/slide/{id}/show',[slidecontroller::class,'show']);
Route::post('/admin/slide/update',[slidecontroller::class,'update']);
Route::get('/admin/slide/{id}/destroy',[slidecontroller::class,'destroy']);

Route::get('/admin/sanpham',[sanphamcontroller::class,'index']);
Route::get('/admin/sanpham/{id}/show',[sanphamcontroller::class,'show']);
Route::get('/admin/sanpham/add',[sanphamcontroller::class,'add']);
Route::post('/admin/sanpham/create',[sanphamcontroller::class,'create']);
Route::get('/admin/sanpham/{id}/delete',[sanphamcontroller::class,'destroy']);
Route::post('/admin/sanpham/update',[sanphamcontroller::class,'update']);

Route::get('/admin/nhacungcap',[nhacungcapcontroller::class,'index']);
Route::get('/admin/nhacungcap/{id}/show',[nhacungcapcontroller::class,'show']);
Route::get('/admin/nhacungcap/add',[nhacungcapcontroller::class,'add']);
Route::post('/admin/nhacungcap/create',[nhacungcapcontroller::class,'create']);
Route::get('/admin/nhacungcap/{id}/delete',[nhacungcapcontroller::class,'destroy']);
Route::post('/admin/nhacungcap/update',[nhacungcapcontroller::class,'update']);

Route::get('/admin/billnhap',[bills_nhapcontroller::class,'index']);
Route::get('/admin/billnhap/{id}/show',[bills_nhapcontroller::class,'show']);
Route::get('/admin/billnhap/add',[bills_nhapcontroller::class,'add']);
Route::post('/admin/billnhap/create',[bills_nhapcontroller::class,'create']);
Route::get('/admin/billnhap/{id}/delete',[bills_nhapcontroller::class,'destroy']);
Route::post('/admin/billnhap/update',[bills_nhapcontroller::class,'update']);

Route::get('/admin/billnhapdetail',[billsdetailnhapcontroller::class,'index']);
Route::get('/admin/billnhapdetail/{id}/show',[billsdetailnhapcontroller::class,'show']);
Route::get('/admin/billnhapdetail/add',[billsdetailnhapcontroller::class,'add']);
Route::post('/admin/billnhapdetail/create',[billsdetailnhapcontroller::class,'create']);
Route::get('/admin/billnhapdetail/{id}/delete',[billsdetailnhapcontroller::class,'destroy']);
Route::post('/admin/billnhapdetail/update',[billsdetailnhapcontroller::class,'update']);

Route::get('/admin/billban',[bills_bancontroller::class,'index']);
Route::get('/admin/billban/{id}/show',[bills_bancontroller::class,'show']);
Route::get('/admin/billban/add',[bills_bancontroller::class,'add']);
Route::post('/admin/billban/create',[bills_bancontroller::class,'create']);
Route::get('/admin/billban/{id}/delete',[bills_bancontroller::class,'destroy']);
Route::post('/admin/billban/update',[bills_bancontroller::class,'update']);

Route::get('/admin/billbandetail',[bill_detail_bancontroller::class,'index']);
Route::get('/admin/billbandetail/{id}/show',[bill_detail_bancontroller::class,'show']);
Route::get('/admin/billbandetail/add',[bill_detail_bancontroller::class,'add']);
Route::post('/admin/billbandetail/create',[bill_detail_bancontroller::class,'create']);
Route::get('/admin/billbandetail/{id}/delete',[bill_detail_bancontroller::class,'destroy']);
Route::post('/admin/billbandetail/update',[bill_detail_bancontroller::class,'update']);

Route::get('/admin/khachhang',[khach_hangcontroller::class,'index']);
Route::get('/admin/khachhang/{id}/show',[khach_hangcontroller::class,'show']);
Route::get('/admin/khachhang/add',[khach_hangcontroller::class,'add']);
Route::post('/admin/khachhang/create',[khach_hangcontroller::class,'create']);
Route::get('/admin/khachhang/{id}/delete',[khach_hangcontroller::class,'destroy']);
Route::post('/admin/khachhang/update',[khach_hangcontroller::class,'update']);

Route::get('/',function(){
    return view('index');
});

Route::get('/admin/product',function(){
    return view('admin.sanpham');
});

Route::get('/adminangular/loaisp',function(){
    return view('adminangular.loaisp');
});
Route::get('/adminangular/news',function(){
    return view('adminangular.news');
});

Route::get('/adminangular/billban',function(){
    return view('adminangular.billban');
});

Route::get('/adminangular/phanhoi',function(){
    return view('adminangular.phanhoi');
});
Route::get('/adminangular/users',function(){
    return view('adminangular.users');
});
Route::get('/adminangular/slide',function(){
    return view('adminangular.slide');
});
Route::get('/adminangular/quangcao',function(){
    return view('adminangular.quangcao');
});

