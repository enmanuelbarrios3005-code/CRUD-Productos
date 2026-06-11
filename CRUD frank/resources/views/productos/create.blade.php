<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-sans min-h-screen flex items-center justify-center p-6">

    <div class="bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700 w-full max-w-md">
        <h2 class="text-2xl font-bold text-emerald-400 mb-6 text-center">Registrar Producto</h2>

        <form action="{{ route('productos.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Nombre del Producto</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-emerald-500">
                @error('nombre') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Descripción</label>
                <textarea name="descripcion" rows="3" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white focus:outline-none focus:border-emerald-500">{{ old('descripcion') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Precio ($)</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 text-white font-mono focus:outline-none focus:border-emerald-500">
                @error('precio') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-4 pt-2">
                <a href="{{ route('productos.index') }}" class="w-1/2 text-center bg-gray-700 hover:bg-gray-600 text-gray-300 font-semibold py-2 px-4 rounded transition">
                    Cancelar
                </a>
                <button type="submit" class="w-1/2 bg-emerald-500 hover:bg-emerald-600 text-gray-900 font-bold py-2 px-4 rounded transition shadow-lg shadow-emerald-500/20">
                    Guardar
                </button>
            </div>
        </form>
    </div>

</body>
</html>