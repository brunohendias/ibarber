<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PendenteController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::get('user', function() {
            return auth('sanctum')->user()->name;
        });
        Route::controller(AgendamentoController::class)->group(function () {
            Route::prefix('agendamento')->group(function () {
                Route::get('/', 'index');
            });
        });
        Route::controller(BarbeiroController::class)->group(function () {
            Route::prefix('barbeiro')->group(function () {
                Route::get('/', 'index');
            });
        });
        Route::controller(ClienteController::class)->group(function () {
            Route::prefix('cliente')->group(function () {
                Route::get('/me', 'me');
                Route::post('/', 'store');
            });
        });
        Route::controller(EnderecoController::class)->group(function () {
            Route::prefix('endereco')->group(function () {
                Route::get('/me', 'me');
                Route::put('/', 'update');
            });
        });
        Route::controller(PendenteController::class)->group(function () {
            Route::prefix('pendente')->group(function () {
                Route::get('/me', 'me');
                Route::post('/', 'store');
            });
        });
    });
});