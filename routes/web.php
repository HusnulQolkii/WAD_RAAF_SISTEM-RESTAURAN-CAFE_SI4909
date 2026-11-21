
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;

Route::get('/', function () {
    return redirect()->route('meja.index');
});

Route::resource('meja', MejaController::class);
