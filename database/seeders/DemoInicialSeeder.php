<?php

namespace Database\Seeders;

use App\Models\Hechicero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DemoInicialSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Poblamos hechiceros iniciales si está vacía
        if (Hechicero::count() === 0) {
            Hechicero::create([
                'nombre'  => 'Satoru Gojo',
                'grado'   => 'Especial',
                'tecnica' => 'Ilimitado & Seis Ojos',
                'activo'  => true,
                'imagen'  => 'https://static.wikia.nocookie.net/jujutsu-kaisen/images/e/ef/Satoru_Gojo_%28Anime_2%29.png',
            ]);

            Hechicero::create([
                'nombre'  => 'Megumi Fushiguro',
                'grado'   => 'Grado 2',
                'tecnica' => 'Técnica de las Diez Sombras',
                'activo'  => true,
                'imagen'  => 'https://static.wikia.nocookie.net/jujutsu-kaisen/images/d/dd/Megumi_Fushiguro_%28Anime_2%29.png',
            ]);

            Hechicero::create([
                'nombre'  => 'Yuji Itadori',
                'grado'   => 'Sin Grado',
                'tecnica' => 'Puño Divergente / Destello Negro',
                'activo'  => true,
                'imagen'  => 'https://static.wikia.nocookie.net/jujutsu-kaisen/images/5/5d/Yuji_swears_not_to_lose_again_%28Anime%29.png',
            ]);

            Hechicero::create([
                'nombre'  => 'Nobara Kugisaki',
                'grado'   => 'Grado 3',
                'tecnica' => 'Resonancia (Muñeco de Paja)',
                'activo'  => false,
                'imagen'  => 'https://static.wikia.nocookie.net/jujutsu-kaisen/images/d/dd/Nobara_Kugisaki_%28Anime_2%29.png',
            ]);
        }

        // 2. Creamos y poblamos la tabla demo 'usuarios' para el laboratorio de SQL Injection
        Schema::dropIfExists('usuarios');
        Schema::create('usuarios', function ($table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('rol');
            $table->timestamps();
        });

        DB::table('usuarios')->insert([
            [
                'username'   => 'admin',
                'password'   => 'BCP2026_UltraSeguro!#',
                'rol'        => 'superadmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'operador1',
                'password'   => 'bcp_cajero_01',
                'rol'        => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username'   => 'auditor_externo',
                'password'   => 'auditoria_bcp_99',
                'rol'        => 'auditor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
