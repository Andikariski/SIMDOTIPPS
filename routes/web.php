<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\LWsubKegiatan\SubKegiatan;
use App\Livewire\Admin\LWopd\Opd;
use App\Livewire\Admin\LWoperator\Operator;
use App\Livewire\Admin\LWpagu\Pagu;
use App\Livewire\Admin\LWpagu\PaguIndukDefinitif;
use App\Livewire\Admin\LWrap\CreateRap;
use App\Livewire\Admin\LWrap\RapOpd;
use App\Livewire\Admin\LWrap\RapSuperAdmin;
use App\Livewire\Admin\SuperAdminAuth;
use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect('login');
})->name('login');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/sub-Kegiatan', SubKegiatan::class)->name('subKegiatan');

    Route::get('/rap-opd', RapOpd::class)->name('rap.index');
    Route::get('/rap-opd/create', CreateRap::class)->name('rap.create');
    
    // Route SuperAdmin
    Route::get('/rap-super-admin', RapSuperAdmin::class)->name('superadmin.rap');
    Route::get('/opd', Opd::class)->name('superadmin.opd');
    Route::get('/operator', Operator::class)->name('superadmin.operator');
    Route::get('/pagu', Pagu::class)->name('superadmin.pagu.opd');
    Route::get('/pagu-induk', PaguIndukDefinitif::class)->name('superadmin.pagu.induk');

    //Route untuk Akses Super Admin / Bukan
    Route::get('/not-acces', SuperAdminAuth::class)->name('not-acces');


    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

require __DIR__.'/auth.php';
