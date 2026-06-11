# 🚀 CRUD LARAVEL 12 

## 🔌 INSTALACIÓN
1. Clonar y entrar:
   git clone https://github.com/enmanuelbarrios3005-code/CRUD-Productos.git
   cd CRUD-Productos

2. Bajar dependencias y clonar el .env:
   composer install
   copy .env.example .env  (En Windows)

3. Configurar la Base de datos en el .env:
   Ponle el nombre de tu base de datos, usuario (root) y clave.

4. El toque final:
   php artisan key:generate
   php artisan migrate
   php artisan serve

## 🛠️ EL BACKEND 

// 1. Comando para creacion de migracion.
php artisan make:model Producto -mcr

// 2. Migración (database/migrations/..._create_productos_table.php)
public function up(): void {
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 8, 2);
        $table->timestamps();
    });
}

// 3. Modelo (app/Models/Producto.php) -> Para que deje guardar los datos
protected $fillable = ['nombre', 'descripcion', 'precio'];

// 4. Ruta (routes/web.php) -> Una sola ruta para las 7 acciones
use App\Http\Controllers\ProductoController;
Route::resource('productos', ProductoController::class);

// 5. Controlador (app/Http/Controllers/ProductoController.php)
// Métodos clave: index (ver), create (formulario), store (guardar), edit (formulario editar), update (actualizar), destroy (borrar).
// Usar siempre: $request->validate(['nombre' => 'required', 'precio' => 'required|numeric']);

---

## 🎨 LAS VISTAS (resources/views/productos/)
(Todas llevan <script src="https://cdn.tailwindcss.com"></script> en el head para el estilo).

* index.blade.php: Muestra la tabla. Botón de borrar va en un <form> con @csrf y @method('DELETE').
* create.blade.php: Formulario limpio para guardar. Lleva @csrf en el formulario y @error('campo') para los mensajes en rojo si se les olvida rellenar algo.
* edit.blade.php: Igual al de crear pero carga los datos ($producto->nombre) y lleva @csrf junto a @method('PUT').
