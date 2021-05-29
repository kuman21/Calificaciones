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
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Calificaciones de matemáticas
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Escuela Secundaria Federal "Moisés Sáenz"
                </p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Tingambato, Michoacán
                </p>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Prof. Víctor Tovar Ríos
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nombre
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->full_name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Grupo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->grade_and_group }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Calificaciones
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        Primer Periodo
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                            {{ ($student->first_period_qualification === '') ? 'N/A' : $student->first_period_qualification }}
                                        </span>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        Segundo Periodo
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                            {{ ($student->second_period_qualification === '') ? 'N/A' : $student->second_period_qualification }}
                                        </span>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        Tercer Periodo
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <span class="font-medium text-indigo-600 hover:text-indigo-500">
                                            {{ ($student->third_period_qualification === '') ? 'N/A' : $student->third_period_qualification }}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Promedio General
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->average }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Observaciones
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ ($student->observations === '') ? 'N/A' : $student->observations }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="bg-white">
            <a href="/" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Salir
            </a>
        </div>
    </body>
</html>
