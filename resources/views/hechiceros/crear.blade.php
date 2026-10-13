<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Hechicero | Jujutsu High</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { background: #11100f; color: #e7e3d8; font-family: 'Manrope', sans-serif; }
        .display { font-family: 'Bebas Neue', sans-serif; letter-spacing: .02em; }
        .mono { font-family: 'DM Mono', monospace; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-gradient-to-br from-[#11100f] to-[#1c1b18]">
    <div class="w-full max-w-lg border border-white/10 bg-[#1b1a18] p-8 md:p-10 rounded-2xl shadow-2xl relative overflow-hidden">
        <div class="absolute -top-12 -right-12 w-36 h-36 bg-[#d7f45b]/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="mb-8">
            <span class="mono text-[10px] uppercase tracking-[.3em] text-[#d7f45b]">Registro Operativo</span>
            <h1 class="display text-4xl md:text-5xl text-[#e7e3d8] mt-1">NUEVO <span class="text-[#d7f45b]">HECHICERO</span></h1>
            <p class="text-xs text-[#a4a094] mt-2">Los datos ingresados se insertarán directamente en la base de datos a través de Eloquent ORM.</p>
        </div>

        <form action="/hechiceros" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nombre" class="mono block text-[11px] uppercase tracking-[.15em] text-[#a4a094] mb-2">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej: Kento Nanami" required
                    class="w-full px-4 py-3 bg-[#11100f] border border-white/10 rounded-lg text-sm text-[#e7e3d8] focus:outline-none focus:border-[#d7f45b] transition">
            </div>

            <div>
                <label for="grado" class="mono block text-[11px] uppercase tracking-[.15em] text-[#a4a094] mb-2">Grado / Rango</label>
                <select id="grado" name="grado"
                    class="w-full px-4 py-3 bg-[#11100f] border border-white/10 rounded-lg text-sm text-[#e7e3d8] focus:outline-none focus:border-[#d7f45b] transition">
                    <option value="Especial">Grado Especial</option>
                    <option value="Grado 1">Grado 1</option>
                    <option value="Semi-Grado 1">Semi-Grado 1</option>
                    <option value="Grado 2">Grado 2</option>
                    <option value="Grado 3">Grado 3</option>
                    <option value="Grado 4">Grado 4</option>
                    <option value="Sin Grado">Sin Grado</option>
                </select>
            </div>

            <div>
                <label for="tecnica" class="mono block text-[11px] uppercase tracking-[.15em] text-[#a4a094] mb-2">Técnica Maldita</label>
                <input type="text" id="tecnica" name="tecnica" placeholder="Ej: Proporción 7:3" required
                    class="w-full px-4 py-3 bg-[#11100f] border border-white/10 rounded-lg text-sm text-[#e7e3d8] focus:outline-none focus:border-[#d7f45b] transition">
            </div>

            <div>
                <label for="imagen" class="mono block text-[11px] uppercase tracking-[.15em] text-[#a4a094] mb-2">URL de Imagen (Opcional)</label>
                <input type="url" id="imagen" name="imagen" placeholder="https://..."
                    class="w-full px-4 py-3 bg-[#11100f] border border-white/10 rounded-lg text-sm text-[#e7e3d8] focus:outline-none focus:border-[#d7f45b] transition">
            </div>

            <div class="pt-4 flex flex-col sm:flex-row gap-3">
                <button type="submit"
                    class="flex-1 bg-[#d7f45b] text-[#11100f] font-extrabold uppercase tracking-wider py-3.5 px-6 rounded-lg text-xs hover:bg-[#e7e3d8] transition">
                    Registrar en Base de Datos
                </button>
                <a href="/jujutsu"
                    class="mono text-center text-xs py-3.5 px-6 rounded-lg border border-white/10 text-[#a4a094] hover:text-white transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</body>
</html>
