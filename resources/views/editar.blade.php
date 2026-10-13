<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edicion</title>
</head>
<body>
    <form action="/hechiceros/1" method="post">
        @method("PUT")
        @csrf
        <div><input type="text"     name="nombre" placeholder="nombre" ></div>
        <div><input type="text"     name="grado" placeholder="grado" ></div>
        <div><input type="text"     name="tecnica" placeholder="tecnica"></div>
        <div><input type="text"     name="imagen" placeholder="url de imagen" ></div>
        <div>
            <label for="activo">¿Vivo?</label>
            <input type="checkbox" name="activo" checked id="activo">
        </div>
        <button>Actualizar</button>
    </form>
</body>
</html>