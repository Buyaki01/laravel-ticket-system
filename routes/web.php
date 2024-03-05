<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
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
    // $users = DB::table('users')->get();
    // $users = User::all();
    // dd($users);

    //fetch a specific user
    // $user = DB::select("select * from users where email=?", ['rittahbuyaki@gmail.com']);
    // $user = DB::table('users')->where('id', 1)->get();
    // $user = User::where('id', 1)->get();
    $user = User::where('id', 1)->first();
    dd($user->name);

    //Create a new user
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'Sweta',
    //     'sweta@gmail.com',
    //     'Password',
    // ]);
    // $user = DB::table('users')->insert([
    //     'name' => 'Laptop',
    //     'email' => 'laptopsweta@gmail.com',
    //     'password' => 'Password'
    // ]);
    // $user = User::create([
    //     'name' => 'Cat',
    //     'email' => 'cat@gmail.com',
    //     'password' => 'Password'
    // ]);
    // dd($user);

    // Update user
    // $updateUser = DB::update('UPDATE users SET email = ? WHERE id = ?', ['buyaki@gmail.com', 4]);
    // $updateUser = DB::table('users')->where('id', 5)->update([
    //     'email' => "buyaki@gmail.com"
    // ]);
    // $updateUser = User::where('id', 6)->update([
    //     'email' => 'leonne@gmail.com'
    // ]);
    // dd($updateUser);

    // Delete a user
    // $deletedUser = DB::table('users')->where('id', 5)->delete();
    // $deletedUser = User::where('id', 6)->delete();
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
