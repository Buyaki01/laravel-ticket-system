<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //fetch all users
    // $users = DB::select("select * from users");
    $users = DB::table('users')->get();
    dd($users);

    //fetch a specific user
    // $user = DB::select("select * from users where email=?", ['rittahbuyaki@gmail.com']);
    $user = DB::table('users')->where('id', 1)->get();
    // dd($user);

    //Create a new user
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'Sweta',
    //     'sweta@gmail.com',
    //     'Password',
    // ]);
    $user = DB::table('users')->insert([
        'name' => 'Buyaki',
        'email' => 'buyakisweta@gmail.com',
        'password' => 'Password'
    ]);
    // dd($user);

    // Update user
    // $updateUser = DB::update('UPDATE users SET email = ? WHERE id = ?', ['buyaki@gmail.com', 4]);
    $updateUser = DB::table('users')->where('id', 5)->update([
        'email' => "buyaki@gmail.com"
    ]);
    // dd($updateUser);

    // Delete a user
    // $deletedUser = DB::delete("delete from users where id = ?", [4]);
    // dd($deletedUser);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
