<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demostración: SQL Injection (Vulnerable)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@500;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .mono { font-family: 'DM Mono', monospace; }
    </style>
</head>
<body class="bg-[#0b0f19] text-[#c9d1d9] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl">
        <!-- Badge institucional / Contexto -->
        <div class="text-center mb-8">
            <span class="mono inline-block text-[11px] font-bold tracking-widest uppercase bg-red-500/10 text-red-400 border border-red-500/20 px-4 py-1.5 rounded-full mb-3">
                ⚠️ Laboratorio de Ciberseguridad // Red Local
            </span>
            <h1 class="text-2xl font-black text-white">Sistema Autenticación (Vulnerable)</h1>
            <p class="text-xs text-[#8b949e] mt-1">Este endpoint ejecuta concatenación directa de strings en SQL sin parametrizar.</p>
        </div>

        <div class="bg-[#161b22] border border-[#30363d] rounded-2xl p-8 shadow-2xl">
            <form method="POST" action="/demo/login-vulnerable" class="space-y-4">
                @csrf
                <div>
                    <label class="mono text-xs text-[#8b949e] block mb-1.5 uppercase">Usuario</label>
                    <input type="text" name="usuario" value="{{ request('usuario', 'admin') }}" required
                        class="w-full bg-[#0d1117] border border-[#30363d] rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-red-500 font-mono">
                </div>

                <div>
                    <label class="mono text-xs text-[#8b949e] block mb-1.5 uppercase">Contraseña (Payload SQL Injection)</label>
                    <input type="text" name="password" placeholder="Ej: ' OR '1'='1" required
                        class="w-full bg-[#0d1117] border border-[#30363d] rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-red-500 font-mono">
                </div>

                <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg text-sm uppercase tracking-wider transition">
                    Probar Inyección SQL
                </button>
            </form>

            @if(isset($intento))
                <div class="mt-6 pt-6 border-t border-[#30363d] space-y-4">
                    <div class="bg-[#0d1117] border border-[#30363d] p-4 rounded-xl">
                        <span class="mono text-[10px] text-red-400 uppercase tracking-widest block mb-1">Query SQL Ejecutada en el Servidor:</span>
                        <code class="text-xs text-yellow-300 font-mono break-all">{{ $sql }}</code>
                    </div>

                    @if(!empty($errorSql))
                        <div class="bg-amber-950/40 border border-amber-500/50 p-4 rounded-xl text-amber-300 text-xs font-mono">
                            ⚠️ Error de sintaxis en el motor SQL:<br>
                            <code>{{ $errorSql }}</code>
                        </div>
                    @elseif(count($resultados) > 0)
                        @if(!empty($creado))
                            <div class="bg-purple-950/40 border border-purple-500/50 p-4 rounded-xl text-purple-300 text-xs font-mono">
                                🏴 PERSISTENCIA LOGRADA: el atacante creó el usuario
                                <strong class="text-white">{{ $creado['username'] }}</strong> con rol
                                <strong class="text-white">{{ $creado['rol'] }}</strong>.
                                Aunque cambien la contraseña de admin, el atacante ya tiene SU propia cuenta para volver cuando quiera.
                            </div>
                        @endif
                        @if(!empty($hechiceroCreado))
                            <div class="bg-indigo-950/40 border border-indigo-500/50 p-4 rounded-xl text-indigo-300 text-xs font-mono">
                                ⚡ OPERACIÓN COMPLETA: el atacante registró a
                                <strong class="text-white">{{ $hechiceroCreado->nombre }}</strong> en el catálogo de hechiceros.
                                <a href="/jujutsu" class="text-indigo-200 underline hover:text-white">Ver el catálogo /jujutsu →</a>
                            </div>
                        @endif
                        <div class="bg-red-950/40 border border-red-500/50 p-4 rounded-xl">
                            <div class="flex items-center gap-2 text-red-400 font-bold text-sm mb-2">
                                <span>🚨 EXPLOIT EXITOSO: Acceso concedido sin credenciales válidas</span>
                            </div>
                            <span class="mono text-[10px] text-[#8b949e] block mb-2">Registros volcados desde la base de datos:</span>
                            <div class="space-y-1.5">
                                @foreach($resultados as $r)
                                    <div class="bg-[#0d1117] p-2.5 rounded text-xs font-mono text-[#7ee787] flex justify-between">
                                        <span>User: <strong>{{ $r->username ?? $r->name ?? 'Usuario' }}</strong></span>
                                        <span>Pass: <strong class="text-red-300">{{ $r->password ?? '***' }}</strong></span>
                                        <span>Rol: <strong class="text-blue-300">{{ $r->rol ?? 'admin' }}</strong></span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Post-explotación: panel comprometido -->
                        <div class="bg-[#150a1e] border border-purple-500/40 p-4 rounded-xl space-y-5">
                            <span class="mono text-[10px] text-purple-400 uppercase tracking-widest block">
                                🏴 Fase 2 — Post-Explotación: operar el sistema como atacante
                            </span>

                            <!-- Acción A: crear usuario atacante (persistencia) -->
                            <form method="POST" action="/demo/crear-usuario" class="space-y-3">
                                @csrf
                                <span class="mono text-[10px] text-[#8b949e] uppercase block">A. Persistencia — crear usuario atacante:</span>
                                <div class="grid grid-cols-3 gap-2">
                                    <input type="text" name="new_username" placeholder="usuario atacante" required
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-purple-500 font-mono">
                                    <input type="text" name="new_password" placeholder="contraseña" required
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-purple-500 font-mono">
                                    <select name="new_rol"
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-purple-500 font-mono">
                                        <option value="operador">operador</option>
                                        <option value="auditor">auditor</option>
                                        <option value="superadmin">superadmin</option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full bg-purple-700 hover:bg-purple-600 text-white font-bold py-2.5 px-4 rounded-lg text-xs uppercase tracking-wider transition">
                                    Crear usuario atacante en la BD
                                </button>
                            </form>

                            <div class="border-t border-[#30363d]/60"></div>

                            <!-- Acción B: crear hechicero (usar el sistema comprometido) -->
                            <form method="POST" action="/demo/crear-hechicero" class="space-y-3">
                                @csrf
                                <span class="mono text-[10px] text-[#8b949e] uppercase block">B. Operar el sistema — registrar hechicero en el catálogo:</span>
                                <div class="grid grid-cols-3 gap-2">
                                    <input type="text" name="nombre" placeholder="Nombre del hechicero" required
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-indigo-500 font-mono">
                                    <input type="text" name="grado" placeholder="Grado (ej: Especial)"
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-indigo-500 font-mono">
                                    <input type="text" name="tecnica" placeholder="Técnica maldita"
                                        class="col-span-1 bg-[#0d1117] border border-[#30363d] rounded-lg px-3 py-2 text-xs text-white focus:outline-none focus:border-indigo-500 font-mono">
                                </div>
                                <button type="submit"
                                    class="w-full bg-indigo-700 hover:bg-indigo-600 text-white font-bold py-2.5 px-4 rounded-lg text-xs uppercase tracking-wider transition">
                                    Registrar hechicero en /jujutsu
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="bg-emerald-950/30 border border-emerald-500/30 p-4 rounded-xl text-emerald-400 text-xs font-mono">
                            ❌ Acceso denegado: El payload no alteró la consulta booleana.
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-6 flex justify-between items-center text-xs">
                <a href="/jujutsu" class="text-[#8b949e] hover:text-white transition">← Volver al Sistema Jujutsu</a>
                <a href="/demo/login-seguro" class="text-emerald-400 hover:underline">Ver Solución Segura en Laravel →</a>
            </div>
        </div>
    </div>
</body>
</html>
