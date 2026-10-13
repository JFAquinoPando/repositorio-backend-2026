<?php

use App\Http\Controllers\HechiceroController;
use App\Models\Hechicero;
use Illuminate\Support\Facades\Route;

// Vista principal de Hechiceros (Lectura desde BD con Eloquent)
Route::get("/jujutsu", [HechiceroController::class, "index"]);

// Formulario de registro y guardado
Route::get("/hechiceros/crear", [HechiceroController::class, "create"]);
Route::post("/hechiceros", [HechiceroController::class, "store"]);
Route::delete("/hechiceros/{id}", [HechiceroController::class, "destroy"]);
Route::put("/hechiceros", [HechiceroController::class, "actualizar"]);
Route::get("/hechiceros/{id}", [HechiceroController::class, "editar"]); //Formulario


Route::get("/hechieros/creando", function(){
    return Hechicero::create([
        'nombre' => "Satorou Gojo",
        'grado' => "Especialista",
        'tecnica' => "Vacío infino",
        'activo' => false,
        'imagen' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTxGByTr3FzJALjvLyVAmESWjOcT3odwuMAd0QdW1oMGIFrbXg6XiNj8Ux&s=10",
    ]);
});





















// DEMO CIBERSEGURIDAD EN VIVO (Red Local)
// 1. Laboratorio Vulnerable (SQL Injection demostrable)
Route::get("/demo/login-vulnerable", [HechiceroController::class, "loginVulnerable"]);
Route::post("/demo/login-vulnerable", [HechiceroController::class, "loginVulnerablePost"]);

// 1b. Post-explotación: crear usuarios tras el hackeo (panel comprometido)
Route::post("/demo/crear-usuario", [HechiceroController::class, "crearUsuarioPost"]);
Route::post("/demo/crear-hechicero", [HechiceroController::class, "crearHechiceroDemoPost"]);

// 2. Demostración Segura (Prepared Statements / Eloquent)
Route::get("/demo/login-seguro", [HechiceroController::class, "loginSeguro"]);
Route::post("/demo/login-seguro", [HechiceroController::class, "loginSeguroPost"]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/trabajo', function () {
    return view('pagina');
});
