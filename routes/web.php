<?php



use App\Http\Controllers\IndicesController;

Route::get('/tjsp', [IndicesController::class, 'indiceTjsp'])->name('tjsp');
Route::get('/ortn', [IndicesController::class, 'indiceOrtn'])->name('ortn');
Route::get('/ufir', [IndicesController::class, 'indiceUfir'])->name('ufir');

Route::get('/caderneta-poupanca', [IndicesController::class, 'indiceCadernetaPoupanca'])->name('caderneta-poupanca');
Route::get('/igpdi', [IndicesController::class, 'indiceIgpdi'])->name('igpdi');
Route::get('/igpm', [IndicesController::class, 'indiceIgpm'])->name('igpm');
Route::get('/inpc', [IndicesController::class, 'indiceInpc'])->name('inpc');
Route::get('/ipca', [IndicesController::class, 'indiceIpca'])->name('ipca');
Route::get('/selic', [IndicesController::class, 'indiceSelic'])->name('selic');
Route::get('/ipc-fipe', [IndicesController::class, 'indiceIpcFipe'])->name('ipc-fipe');
Route::get('/tr', [IndicesController::class, 'indiceTr'])->name('tr');
Route::get('/tjmg', [IndicesController::class, 'indiceTjmg'])->name('tjmg');

Route::get('/', function(){
    return view('welcome');
});
