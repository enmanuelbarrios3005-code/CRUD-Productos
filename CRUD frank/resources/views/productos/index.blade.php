<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 font-sans min-h-screen p-8">

    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-emerald-400">Panel de Productos</h1>
            <a href="{{ route('productos.create') }}" class="bg-emerald-500 hover:bg-emerald-600 text-gray-900 font-bold py-2 px-4 rounded transition duration-200">
                + Nuevo Producto
            </a>
        </div>

        <!-- Alerta de Éxito -->
        @if(session('success'))
            <div class="bg-emerald-500/20 border border-emerald-500 text-emerald-300 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla -->
        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-xl border border-gray-700">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700/50 text-emerald-400 uppercase text-sm border-b border-gray-700">
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Descripción</th>
                        <th class="p-4">Precio</th>
                        <th class="p-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($productos as $producto)
                        <tr class="hover:bg-gray-700/30 transition">
                            <td class="p-4 font-semibold">{{ $producto->nombre }}</td>
                            <td class="p-4 text-gray-400">{{ $producto->descripcion ?? 'Sin descripción' }}</td>
                            <td class="p-4 text-emerald-300 font-mono">${{ number_format($producto->precio, 2) }}</td>
                            <td class="p-4 flex justify-center gap-3">
                                <a href="{{ route('productos.edit', $producto->id) }}" class="bg-blue-500/20 text-blue-400 border border-blue-500/30 hover:bg-blue-500 hover:text-white py-1 px-3 rounded text-sm font-semibold transition">
                                    Editar
                                </a>
                                
                                <!-- Formulario para eliminar -->
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500/20 text-red-400 border border-red-500/30 hover:bg-red-500 hover:text-white py-1 px-3 rounded text-sm font-semibold transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500">No hay productos registrados aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>