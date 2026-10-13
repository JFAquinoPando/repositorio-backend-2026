<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demostración: Protección Laravel (Prepared Statements)</title>
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
            <span class="mono inline-block text-[11px] font-bold tracking-widest uppercase bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-4 py-1.5 rounded-full mb-3">
                🛡️ Defensa Activa // Prepared Statements (PDO)
            </span>
            <h1 class="text-2xl font-black text-white">Sistema Autenticación (Protegido)</h1>
            <p class="text-xs text-[#8b949e] mt-1">Laravel separa la estructura SQL del valor ingresado mediante parámetros enlazados (Bindings).</p>
        </div>

        <div class="bg-[#161b22] border border-[#30363d] rounded-2xl p-8 shadow-2xl">
            <form method="POST" action="/demo/login-seguro" class="space-y-4">
                @csrf
                <div>
                    <label class="mono text-xs text-[#8b949e] block mb-1.5 uppercase">Usuario</label>
                    <input type="text" name="usuario" value="{{ request('usuario', 'admin') }}" required
                        class="w-full bg-[#0d1117] border border-[#30363d] rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500 font-mono">
                </div>

                <div>
                    <label class="mono text-xs text-[#8b949e] block mb-1.5 uppercase">Mismo Payload Malicioso</label>
                    <input type="text" name="password" value="{{ request('password', "' OR '1'='1") }}" required
                        class="w-full bg-[#0d1117] border border-[#30363d] rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-500 font-mono">
                </div>

                <button type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-4 rounded-lg text-sm uppercase tracking-wider transition">
                    Verificar Mitigación de Vulnerabilidad
                </button>
            </form>

            @if(isset($intento))
                <div class="mt-6 pt-6 border-t border-[#30363d] space-y-4">
                    <div class="bg-[#0d1117] border border-[#30363d] p-4 rounded-xl">
                        <span class="mono text-[10px] text-emerald-400 uppercase tracking-widest block mb-1">Estructura SQL vs Parámetros:</span>
                        <code class="text-xs text-emerald-300 font-mono break-all">{{ $sql }}</code>
                    </div>

                    @if(count($resultados) > 0)
                        <div class="bg-blue-950/40 border border-blue-500/50 p-4 rounded-xl text-blue-300 text-xs font-mono">
                            Credenciales encontradas legítimamente.
                        </div>
                    @else
                        <div class="bg-emerald-950/40 border border-emerald-500/50 p-4 rounded-xl">
                            <div class="flex items-center gap-2 text-emerald-400 font-bold text-sm mb-1">
                                <span>🛡️ ATAQUE NEUTRALIZADO EXITOSAMENTE</span>
                            </div>
                            <p class="text-xs text-[#c9d1d9] leading-relaxed mt-2">
                                El motor de base de datos trató a 
                                <code class="bg-[#0d1117] px-2 py-0.5 rounded text-amber-300 font-mono text-[11px]">' OR '1'='1</code> 
                                como texto plano literal y no como código SQL ejecutable. No existe ningún usuario cuya contraseña literal sea esa frase.
                            </p>
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-6 flex justify-between items-center text-xs">
                <a href="/demo/login-vulnerable" class="text-red-400 hover:underline">← Probar en Login Vulnerable</a>
                <a href="/jujutsu" class="text-[#8b949e] hover:text-white transition">Ir a Hechiceros →</a>
            </div>
        </div>
    </div>
</body>
</html>
