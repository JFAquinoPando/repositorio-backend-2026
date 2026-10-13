<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jujutsu Kaisen - conoce a los hechiceros que enfrentan las maldiciones.">
    <title>Jujutsu Kaisen | Hechiceros</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #11100f;
            --paper: #e7e3d8;
            --acid: #d7f45b;
            --muted: #a4a094;
        }

        html { scroll-behavior: smooth; }
        body { background: var(--ink); color: var(--paper); font-family: "Manrope", sans-serif; }
        .display { font-family: "Bebas Neue", sans-serif; letter-spacing: .02em; }
        .mono { font-family: "DM Mono", monospace; }
        .grain::after {
            position: fixed; inset: 0; z-index: 50; pointer-events: none; opacity: .07; content: "";
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.7'/%3E%3C/svg%3E");
        }
        .hero-grid { background-image: linear-gradient(rgba(231,227,216,.07) 1px, transparent 1px), linear-gradient(90deg, rgba(231,227,216,.07) 1px, transparent 1px); background-size: 42px 42px; }
        .hero-glow { background: radial-gradient(circle, rgba(215,244,91,.17), transparent 63%); }
        .card-image { filter: grayscale(1) contrast(1.15); transition: filter .5s ease, transform .7s cubic-bezier(.2,.7,.2,1); }
        .character-card:hover .card-image { filter: grayscale(0) contrast(1.05); transform: scale(1.06); }
        .reveal { animation: reveal .8s both cubic-bezier(.2,.7,.2,1); }
        .float { animation: float 5s ease-in-out infinite; }
        @keyframes reveal { from { opacity: 0; transform: translateY(22px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(12deg); } 50% { transform: translateY(-12px) rotate(16deg); } }
    </style>
</head>
<body class="grain overflow-x-hidden">
    <main>
        <section class="hero-grid relative min-h-screen overflow-hidden border-b border-white/10">
            <div class="hero-glow absolute -right-40 top-20 h-[600px] w-[600px] rounded-full"></div>
            <nav class="relative z-10 mx-auto flex max-w-7xl items-center justify-between px-6 py-7 lg:px-10">
                <a href="#" class="display text-3xl tracking-wider text-[#d7f45b]">呪術廻戦<span class="text-[#e7e3d8]">.</span></a>
                <div class="hidden items-center gap-6 text-[11px] font-bold uppercase tracking-[.28em] text-[#a4a094] md:flex">
                    <a class="transition hover:text-[#d7f45b]" href="#personajes">Personajes</a>
                    <a class="transition hover:text-[#d7f45b]" href="#universo">Universo</a>
                    <a class="transition text-red-400 hover:text-red-300" href="/demo/login-vulnerable">🛡️ Lab Seguridad</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/hechiceros/crear" class="rounded-full bg-[#d7f45b] px-4 py-2 text-[10px] font-bold uppercase tracking-[.15em] text-[#11100f] transition hover:bg-[#e7e3d8]">+ Registrar</a>
                    <a href="#personajes" class="rounded-full border border-[#d7f45b]/60 px-4 py-2 text-[10px] font-bold uppercase tracking-[.15em] text-[#d7f45b] transition hover:bg-[#d7f45b] hover:text-[#11100f]">Explorar</a>
                </div>
            </nav>

            <div class="relative z-10 mx-auto grid max-w-7xl items-center gap-12 px-6 pb-20 pt-16 lg:grid-cols-[1fr_.72fr] lg:px-10 lg:pb-28 lg:pt-20">
                <div class="reveal max-w-3xl">
                    <p class="mono mb-7 text-[10px] uppercase tracking-[.38em] text-[#d7f45b]">Archivo // Tokyo Jujutsu High</p>
                    <h1 class="display text-[clamp(5.8rem,15vw,13rem)] leading-[.76] text-[#e7e3d8]">EL<br><span class="text-[#d7f45b]">LÍMITE</span></h1>
                    <p class="mt-9 max-w-md text-sm leading-7 text-[#a4a094]">Cuando el miedo toma forma, solo quienes dominan la energía maldita pueden plantarse frente a ella.</p>
                    <div class="mt-10 flex flex-wrap items-center gap-6">
                        <a href="#personajes" class="group inline-flex items-center gap-4 rounded-full bg-[#d7f45b] px-6 py-3 text-xs font-extrabold uppercase tracking-[.15em] text-[#11100f] transition hover:bg-[#e7e3d8]">Conocer hechiceros <span class="text-lg transition group-hover:translate-x-1">↗</span></a>
                        <span class="mono text-[10px] uppercase tracking-[.2em] text-[#a4a094]">Temporada 01 / 24 episodios</span>
                    </div>
                </div>
                <div class="relative mx-auto h-[390px] w-full max-w-[420px] lg:h-[520px]">
                    <div class="absolute left-5 top-9 h-[88%] w-[78%] rotate-[-7deg] border border-[#d7f45b]/70"></div>
                    <div class="absolute right-0 top-0 h-[88%] w-[78%] overflow-hidden bg-[#23231f]">
                        <img class="h-full w-full object-cover opacity-85" src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=900&q=85" alt="Figura en sombras con una energia intensa">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#11100f] via-transparent to-[#d7f45b]/10"></div>
                    </div>
                    <span class="float mono absolute -bottom-2 left-0 grid h-20 w-20 place-items-center rounded-full bg-[#d7f45b] text-center text-[9px] font-bold uppercase leading-4 text-[#11100f]">No hay<br>retorno</span>
                    <p class="mono absolute -right-2 bottom-5 rotate-90 text-[9px] uppercase tracking-[.35em] text-[#a4a094]">生き残れ</p>
                </div>
            </div>
            <div class="mono absolute bottom-5 left-6 text-[9px] tracking-[.25em] text-[#a4a094] lg:left-10">01 — 04 / MALDICIONES</div>
            <div class="absolute bottom-0 right-0 h-24 w-24 border-l border-t border-white/10"></div>
        </section>

        <section id="personajes" class="mx-auto max-w-7xl px-6 py-24 lg:px-10 lg:py-32">
            <div class="mb-14 flex flex-col justify-between gap-5 border-b border-white/10 pb-8 md:flex-row md:items-end">
                <div>
                    <p class="mono mb-4 text-[10px] uppercase tracking-[.35em] text-[#d7f45b]">01 / Los elegidos</p>
                    <h2 class="display text-6xl leading-none text-[#e7e3d8] md:text-8xl">FICHAS DE<br><span class="text-[#d7f45b]">HECHICEROS</span></h2>
                </div>
                <p class="max-w-xs text-xs leading-6 text-[#a4a094]">Cuatro destinos unidos por una guerra invisible. Conocé a quienes caminan entre la vida y la maldición.</p>
            </div>
            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @php
                    $characters = [
                        ['number' => '01', 'name' => 'Yuji Itadori', 'role' => 'El recipiente', 'image' => 'https://images.unsplash.com/photo-1531259683007-016a7b628fc3?auto=format&fit=crop&w=700&q=85', 'color' => '#d7f45b'],
                        ['number' => '02', 'name' => 'Megumi Fushiguro', 'role' => 'Diez sombras', 'image' => 'https://images.unsplash.com/photo-1541560052-77ec1bbc09f7?auto=format&fit=crop&w=700&q=85', 'color' => '#91a7c2'],
                        ['number' => '03', 'name' => 'Nobara Kugisaki', 'role' => 'La muñeca', 'image' => 'https://images.unsplash.com/photo-1551817958-d9d86fb29431?auto=format&fit=crop&w=700&q=85', 'color' => '#ec8da1'],
                        ['number' => '04', 'name' => 'Satoru Gojo', 'role' => 'El más fuerte', 'image' => 'https://images.unsplash.com/photo-1518709594023-6eab9bab7b23?auto=format&fit=crop&w=700&q=85', 'color' => '#b8a5e8'],
                    ];
                @endphp
                @forelse ($hechiceros as $character)
                    @php
                        $cNombre = is_array($character) ? $character['nombre'] : $character->nombre;
                        $cGrado = is_array($character) ? $character['grado'] : $character->grado;
                        $cTecnica = is_array($character) ? $character['tecnica'] : $character->tecnica;
                        $cActivo = is_array($character) ? $character['activo'] : $character->activo;
                        $cImagen = is_array($character) ? ($character['imagen'] ?? '') : ($character->imagen ?? '');
                        if (empty($cImagen)) {
                            $cImagen = 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=600';
                        }
                    @endphp
                    <article class="character-card group relative overflow-hidden border border-white/10 bg-[#1b1a18] transition duration-500 hover:-translate-y-2 hover:border-[#d7f45b]/50">
                        <div class="relative aspect-[.78] overflow-hidden">
                            <img class="card-image h-full w-full object-cover object-top" src="{{ $cImagen }}" alt="{{ $cNombre }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#11100f] via-transparent to-transparent opacity-90"></div>
                            <span class="mono absolute left-4 top-4 text-[10px] tracking-[.2em] bg-black/60 px-2 py-1 rounded">{{ $cGrado }}</span>
                            <span class="mono absolute right-4 top-4 text-[9px] uppercase tracking-[.2em] text-white {{ $cActivo ? 'bg-emerald-600' : 'bg-red-600' }} px-2.5 py-1 rounded-md font-bold">{{ $cActivo ? "Operativo" : "Baja" }}</span>
                            <div class="absolute bottom-5 left-5 right-5">
                                <p class="mono mb-2 text-[9px] uppercase tracking-[.22em] text-[#d7f45b]">{{ $cTecnica }}</p>
                                <h3 class="display text-4xl leading-none text-[#e7e3d8]">{{ $cNombre }}</h3>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border-t border-white/10 px-5 py-4">
                            <span class="mono text-[9px] uppercase tracking-[.18em] text-[#a4a094]">ID Registro DB: #{{ is_array($character) ? '0' : $character->id }}</span>
                            <span class="text-lg text-[#d7f45b] transition group-hover:translate-x-1">↗</span>
                        </div>
                        <div>
                            <form action="/hechiceros/{{ $character->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button>Eliminar</button>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center border border-dashed border-white/10 rounded-2xl">
                        <p class="mono text-xs text-[#a4a094] uppercase tracking-widest">Base de datos sin registros cargados</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section id="universo" class="border-y border-white/10 bg-[#d7f45b] px-6 py-20 text-[#11100f] lg:px-10 lg:py-28">
            <div class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[.8fr_1.2fr] lg:items-end">
                <div>
                    <p class="mono mb-5 text-[10px] uppercase tracking-[.35em]">02 / El universo</p>
                    <h2 class="display text-7xl leading-[.82] md:text-9xl">LA ENERGÍA<br>NO MIENTE.</h2>
                </div>
                <div class="max-w-lg border-l border-[#11100f]/30 pl-6">
                    <p class="text-lg font-semibold leading-8">Las emociones negativas de los humanos se convierten en maldiciones. Los hechiceros son la última línea entre ese caos y nosotros.</p>
                    <p class="mono mt-7 text-[10px] uppercase tracking-[.2em]">— Manual de campo / Capítulo 001</p>
                </div>
            </div>
        </section>
    </main>
    <footer class="flex flex-col justify-between gap-5 px-6 py-8 md:flex-row md:items-center lg:px-10">
        <span class="display text-2xl tracking-wider text-[#d7f45b]">呪術廻戦.</span>
        <span class="mono text-[9px] uppercase tracking-[.25em] text-[#a4a094]">Una guía no oficial para hechiceros</span>
        <span class="mono text-[9px] uppercase tracking-[.25em] text-[#a4a094]">© 2024</span>
    </footer>
</body>
</html>