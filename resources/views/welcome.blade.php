<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calificaciones</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="relative bg-white overflow-hidden">
            <x-alert />

            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                        <div class="text-center lg:text-left">
                            <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block xl:inline">Escuela Secundaria Federal</span>
                                <span class="block text-indigo-600 xl:inline">"Moisés Sáenz"</span>
                                {{--<span class="block xl:inline">Tingambato, Michoacán</span>
                                <span class="block xl:inline">Prof. Víctor Tovar Ríos</span>--}}
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Consulta de evaluaciones de matemáticas por medio de la curp.
                            </p>
                            <form action="{{ route('qualifications.show') }}" method="GET">
                                <div class="mt-3 relative rounded-md shadow-sm">
                                    <input type="text" name="curp" id="curp" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="Ingresa tu curp" required>
                                </div>
                                <div class="mt-3 relative">
                                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Buscar
                                    </button>
                                </div>
                            </form>
                            <p class="text-center lg:text-left mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Prof. Víctor Tovar Ríos
                            </p>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
