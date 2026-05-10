# README breve — Proyecto Laravel MVC de Películas

Aplicación básica en **Laravel + MySQL** para registrar y visualizar **directores** y **películas**, con vistas MVC y endpoints JSON tipo API.

---

## 1. Requisitos

- PHP compatible con el proyecto.
- Composer.
- MySQL/XAMPP.
- Git.

---

## 2. Clonar e instalar

```bash
git clone URL_DEL_REPOSITORIO
cd nombre_del_proyecto
composer install
```

Crear el archivo `.env`:

```bash
copy .env.example .env
```

En PowerShell también se puede usar:

```powershell
Copy-Item .env.example .env
```

Generar la key:

```bash
php artisan key:generate
```

---

## 3. Configurar base de datos

Crear en MySQL/phpMyAdmin una base llamada:

```txt
peliculas_laravel
```

Configurar el `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=peliculas_laravel
DB_USERNAME=root
DB_PASSWORD=
```

---

## 4. Ejecutar migraciones

```bash
php artisan migrate
```

Esto crea las tablas necesarias para directores y películas.

---

## 5. Levantar la aplicación

```bash
php artisan serve
```

Abrir en el navegador:

```txt
http://127.0.0.1:8000
```

---

# Funcionalidades a probar

## 1. Registrar director

URL:

```txt
http://127.0.0.1:8000/directores/crear
```

Campos:

- Nombre del director.
- URL de imagen del director.

Ejemplo de imagen:

```txt
https://cdn.britannica.com/37/255737-050-9BB3FEDA/Christopher-Nolan-Movie-film-director-Oppenheimer-UK-premiere-2023.jpg
```

Ver directores cargados:

```txt
http://127.0.0.1:8000/directores
```

---

## 2. Registrar película

URL:

```txt
http://127.0.0.1:8000/peliculas/crear
```

Campos:

- Nombre.
- Director.
- Género.
- Fecha de estreno.
- Duración.
- Calificación.
- Idioma.
- URL del poster.

Ver películas cargadas:

```txt
http://127.0.0.1:8000/peliculas
```

---

# Rutas principales

## Vistas MVC

```txt
GET  /
GET  /peliculas
GET  /peliculas/crear
POST /peliculas
GET  /directores
GET  /directores/crear
POST /directores
```

---

## API JSON

La aplicación también expone los datos guardados como JSON.

```txt
GET /api/peliculas
GET /api/peliculas/{id}
GET /api/directores
GET /api/directores/{id}
```

Ejemplos:

```txt
http://127.0.0.1:8000/api/peliculas
http://127.0.0.1:8000/api/directores
```

---

# Validación final

Para confirmar que todo funciona correctamente:

1. Crear un director.
2. Crear una película asociada a ese director.
3. Verificar que ambos aparezcan en sus vistas.
4. Abrir `/api/directores` y `/api/peliculas` para confirmar que los datos también se devuelven como JSON.
5. Revisar en phpMyAdmin que los registros estén guardados en las tablas `directores` y `peliculas`.

---

# Nota para Windows + XAMPP

Si `php` no se reconoce como comando, en PowerShell ejecutar:

```powershell
$env:Path = "C:\xampp\php;$env:Path"
```

Luego volver a probar:

```powershell
php -v
php artisan serve
```
