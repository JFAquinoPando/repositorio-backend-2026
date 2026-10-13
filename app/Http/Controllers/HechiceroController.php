<?php
namespace App\Http\Controllers;

use App\Models\Hechicero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HechiceroController extends Controller
{

    public function editar(){
        return view("editar");
    }

    public function actualizar(Request $peticion){
        $id = $peticion->input("id");
        $nombre = $peticion->input("nombre");
        $tecnica = $peticion->input("tecnica");
        $grado = $peticion->input("grado");
        $imagen = $peticion->input("imagen");
        $activo = $peticion->input("activo");

        $hechicero = Hechicero::find($id);
        $hechicero->nombre = $nombre;
        $hechicero->tecnica = $tecnica;
        $hechicero->grado = $grado;
        $hechicero->imagen = $imagen;
        $hechicero->activo = $activo === "true";

        $hechicero->save();


    }





    public function index()
    {
        $hechiceros = Hechicero::all();

        return view("jujutsu", compact("hechiceros"));
    }

    public function create()
    {
        return view("hechiceros.crear");
    }

    public function store(Request $request)
    {
        Hechicero::create([
            'nombre'  => $request->nombre,
            'grado'   => $request->grado,
            'tecnica' => $request->tecnica,
            'activo'  => true,
            'imagen'  => $request->imagen,
        ]);

        return redirect('/jujutsu');
    }


    public function destroy($id){
        $eliminarHechicero = Hechicero::find($id);
        $eliminarHechicero->delete();
        return redirect("/jujutsu");
    }








    // ---------------------------------------------------------------
    // DEMO SQL INJECTION — solo para la clase, eliminar después
    // ---------------------------------------------------------------

    /**
     * Muestra el login vulnerable (GET).
     */
    public function loginVulnerable()
    {
        return view('demo.login-vulnerable');
    }

    /**
     * Procesa el login con SQL CRUDO concatenado — VULNERABLE a propósito.
     */
    public function loginVulnerablePost(Request $request)
    {
        $usuario  = $request->input('usuario');
        $password = $request->input('password');

        // ⚠️ VULNERABLE: concatenación directa, sin prepared statements
        $sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$password'";

        try {
            // Pasamos el string crudo directamente a DB::select (o vía conexión PDO subyacente)
            $pdo = DB::connection()->getPdo();
            $stmt = $pdo->query($sql);
            $resultados = $stmt ? $stmt->fetchAll(\PDO::FETCH_OBJ) : [];
        } catch (\Throwable $e) {
            $resultados = [];
            $errorSql = $e->getMessage();
        }

        return view('demo.login-vulnerable', [
            'sql'        => $sql,
            'resultados' => $resultados,
            'errorSql'   => $errorSql ?? null,
            'intento'    => true,
        ]);
    }

    /**
     * Post-explotación: una vez dentro, el atacante crea su propio usuario.
     * ⚠️ VULNERABLE a propósito: INSERT crudo concatenado (misma falla del login).
     */
    public function crearUsuarioPost(Request $request)
    {
        $username = $request->input('new_username');
        $password = $request->input('new_password');
        $rol      = $request->input('new_rol', 'operador');

        // ⚠️ VULNERABLE: concatenación directa, sin prepared statements
        $sql = "INSERT INTO usuarios (username, password, rol, created_at, updated_at) VALUES ('$username', '$password', '$rol', datetime('now'), datetime('now'))";

        try {
            $pdo = DB::connection()->getPdo();
            $pdo->exec($sql);
            $creado = ['username' => $username, 'rol' => $rol];
        } catch (\Throwable $e) {
            $errorSql = $e->getMessage();
        }

        // Volcamos la tabla completa: se ve el usuario recién creado por el atacante
        $resultados = DB::table('usuarios')->get()->all();

        return view('demo.login-vulnerable', [
            'sql'        => $sql,
            'resultados' => $resultados,
            'errorSql'   => $errorSql ?? null,
            'creado'     => $creado ?? null,
            'intento'    => true,
        ]);
    }

    /**
     * Post-explotación: una vez dentro, el atacante opera el sistema como admin
     * y crea un hechicero en el catálogo Jujutsu.
     */
    public function crearHechiceroDemoPost(Request $request)
    {
        $hechicero = Hechicero::create([
            'nombre'  => $request->input('nombre'),
            'grado'   => $request->input('grado', 'Sin Grado'),
            'tecnica' => $request->input('tecnica', 'Desconocida'),
            'activo'  => true,
            'imagen'  => $request->input('imagen'),
        ]);

        // Mantenemos el contexto del panel comprometido: volcado de usuarios
        $resultados = DB::table('usuarios')->get()->all();

        return view('demo.login-vulnerable', [
            'sql'              => "Hechicero::create() → INSERT INTO hechiceros (Eloquent, panel ya comprometido)",
            'resultados'       => $resultados,
            'hechiceroCreado'  => $hechicero,
            'intento'          => true,
        ]);
    }

    /**
     * Muestra el login seguro (GET).
     */
    public function loginSeguro()
    {
        return view('demo.login-seguro');
    }

    /**
     * Procesa el login con Eloquent / prepared statements — SEGURO.
     */
    public function loginSeguroPost(Request $request)
    {
        $usuario  = $request->input('usuario');
        $password = $request->input('password');

        // ✅ SEGURO: prepared statements con bindings
        $resultados = DB::select(
            "SELECT * FROM usuarios WHERE username = ? AND password = ?",
            [$usuario, $password]
        );

        $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?  →  Bindings: ['$usuario', '$password']";

        return view('demo.login-seguro', [
            'sql'        => $sql,
            'resultados' => $resultados,
            'intento'    => true,
        ]);
    }
}
