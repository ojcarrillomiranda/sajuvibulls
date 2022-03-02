<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'InicioController@inicio')->middleware('auth');
Route::resource('usuarios', 'UsuariosController')->middleware('auth');
Route::get('usuariosPDF', 'UsuariosController@usuariosPDF')->name('usuariospdf')->middleware('auth');
Route::resource('pacientes', 'PacientesController');
Route::get('pacientesPDF', 'PacientesController@pacientesPDF')->name('pacientespdf')->middleware('auth');
Route::get('pacienteidPDF/{id}', 'PacientesController@pacientesidPDF')->middleware('auth');
Route::resource('historias', 'HistoriasClinicasController')->middleware('auth');
Route::get('buscarPaciente', 'AjaxController@buscarPaciente')->name('buscarPaciente');
Route::get('historiasPDF', 'HistoriasClinicasController@historiasPDF')->name('historiaspdf')->middleware('auth');
Route::get('/historia-id-pdf/{id}', 'HistoriasClinicasController@historiaidPDF')->name('historia-id-pdf')->middleware('auth');
Route::get('/informes', 'HistoriasClinicasController@informeFecha')->middleware('auth');
Route::post('/informesfecha', 'HistoriasClinicasController@informeFechaPDF')->name('informepdf')->middleware('auth');
Route::post('/tipo-atencionPDF', 'HistoriasClinicasController@tipoAtencionPDF')->name('tipoatencionpdf')->middleware('auth');
Route::resource('hospitalizaciones','HospitalizacionController')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



