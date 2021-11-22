<div>
    <x-alert />

    <x-card :search="$search">
        <x-slot name="cardHead">
            <x-primary-button wire:click="createStudent" wire:loading.attr="disabled" wire:offline.attr="disabled">
                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>

                Crear Alumno
            </x-primary-button>
        </x-slot>

        <x-table>
            <x-slot name="head">
                <x-th>Nombre</x-th>
                <x-th>Matrícula</x-th>
                <x-th>Grupo</x-th>
                <x-th>Promedio</x-th>
                <x-th-actions></x-th-actions>
            </x-slot>

            <x-slot name="body">
                @forelse ($students as $student)
                    <tr>
                        <x-td>{{ $student->full_name }}</x-td>
                        <x-td>{{ $student->curp }}</x-td>
                        <x-td>{{ $student->grade_and_group }}</x-td>
                        <x-td-badge-element>{{ $student->average }}</x-td-badge-element>
                        <x-td-actions>
                            <x-action-table wire:click="updateStudent({{ $student }})">
                                <svg class="h-5 w-5 text-yellow-500 group-hover:text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </x-action-table>
                            <x-action-table class="ml-2" wire:click="destroy({{ $student }})">
                                <svg class="h-5 w-5 text-red-500 group-hover:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </x-action-table>
                        </x-td-actions>
                    </tr>
                @empty
                    <tr>
                        @if ($search)
                            <x-td>No hay resultados para la busqueda "{{ $search }}"</x-td>
                        @else
                            <x-td colspan="5" class="text-center">Aun no se han agregado registros</x-td>
                        @endif
                    </tr>
                @endforelse
            </x-slot>
        </x-table>

        <x-slot name="cardFooter">
            {{ $students->links() }}
        </x-slot>

        @include('students.create')
        @include('students.edit')
    </x-card>
</div>
