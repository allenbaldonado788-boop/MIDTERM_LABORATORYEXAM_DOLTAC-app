
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\StudentController;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CalendarController;

Route::get('/calendar', [CalendarController::class, 'index']);
Route::post('/calendar', [CalendarController::class, 'store']);
Route::put('/calendar/{id}', [CalendarController::class, 'update']);
Route::delete('/calendar/{id}', [CalendarController::class, 'destroy']);


// ==========================================
// SIGNUP PAGE
// ==========================================

Route::get('/', function () {
    return view('auth.SIGN_UP');
})->name('signup.show');


// ==========================================
// SIGNUP PROCESS
// ==========================================

Route::post('/signup', function (Request $request) {

    $validated = $request->validate([
        'fullname' => ['required', 'string', 'min:2', 'max:100'],
        'address' => ['required', 'string', 'min:2', 'max:255'],
        'age' => ['required', 'integer', 'min:1', 'max:120'],
        'username' => ['required', 'string', 'min:3', 'max:30', 'alpha_dash', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6'],
    ]);

    DB::table('users')->insert([
        'name' => $validated['fullname'],
        'email' => $validated['username'],
        'address' => $validated['address'],
        'age' => $validated['age'],
        'password' => Hash::make($validated['password']),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()
        ->route('login.show')
        ->with('success', 'Sign up successful! Please login.');

})->name('signup.process');


// ==========================================
// LOGIN PAGE
// ==========================================

Route::get('/login', function () {
    return view('auth.LOGIN');
})->name('login.show');


// ==========================================
// LOGIN PROCESS
// ==========================================

Route::post('/login', function (Request $request) {

    $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $student = DB::table('users')
        ->where('email', $request->username)
        ->first();

    if (!$student || !Hash::check($request->password, $student->password)) {
        return back()
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'Username or password is incorrect.'
            ]);
    }

    $request->session()->regenerate();

    $request->session()->put('student', [
        'id' => $student->id,
        'fullname' => $student->name,
        'username' => $student->email,
    ]);

    return redirect('/homepage');

})->name('login.process');


// ==========================================
// STUDENT CRUD ROUTES
// ==========================================

// View own profile
Route::get('/my-profile', [StudentController::class, 'index'])
    ->name('student.profile');

// Display edit form
Route::get('/my-profile/edit', [StudentController::class, 'edit'])
    ->name('student.edit');

// Save profile changes
Route::put('/my-profile/update', [StudentController::class, 'update'])
    ->name('student.update');

// Delete own account
Route::delete('/my-profile/delete', [StudentController::class, 'destroy'])
    ->name('student.delete');


// ==========================================
// HOMEPAGE
// ==========================================

Route::get('/homepage', function () {
    return view('dashboard_layout.homepage');
});


// ==========================================
// CHAT
// ==========================================

Route::get('/chat', function () {
    return view('dashboard_layout.chat', [
        'messages' => session('chat_messages', []),
    ]);
});

Route::post('/chat/messages', function (Request $request) {

    $validated = $request->validate([
        'message' => ['required', 'string', 'max:1000'],
    ]);

    $messages = $request->session()->get('chat_messages', []);

    $messages[] = [
        'id' => (string) Str::uuid(),
        'author' => $request->session()->get('student.fullname', 'Student'),
        'body' => $validated['message'],
        'time' => now()->format('g:i A'),
        'sender' => 'student',
    ];

    $request->session()->put('chat_messages', $messages);

    return redirect('/chat#latest-message');

})->name('chat.messages.store');


Route::delete('/chat/messages/{messageId}', function (Request $request, string $messageId) {

    $messages = $request->session()->get('chat_messages', []);
    $messageIndex = null;

    foreach ($messages as $index => $message) {
        if (
            ($message['id'] ?? null) === $messageId &&
            ($message['sender'] ?? null) === 'student'
        ) {
            $messageIndex = $index;
            break;
        }
    }

    if ($messageIndex === null) {
        abort(404);
    }

    unset($messages[$messageIndex]);

    $request->session()->put('chat_messages', array_values($messages));

    return redirect('/chat#latest-message');

})->name('chat.messages.destroy');


// ==========================================
// CALENDAR
// ==========================================

Route::get('/calendar', function () {
    return view('dashboard_layout.calendar');
});


// ==========================================
// ONLINE CLASSES
// ==========================================

Route::get('/online-classes', function () {
    return view('dashboard_layout.online_classes');
});


// ==========================================
// LOGOUT
// ==========================================

Route::get('/logout', function () {
    return view('dashboard_layout.logout');
})->name('logout.show');

Route::post('/logout', function (Request $request) {

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('login.show')
        ->with('success', 'You have successfully logged out.');

})->name('logout');