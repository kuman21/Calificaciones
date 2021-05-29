<x-dialog-modal wire:model="creatingStudent">
    <x-slot name="title">
        Crear Alumno
    </x-slot>

    <form wire:submit.prevent="store">
        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4" x-data="{}" x-on:creating-students.window="setTimeout(() => $refs.name.focus(), 250)">
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="name" value="Nombre" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="name"
                                 wire:model.defer="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="last_name" value="Apellido Paterno" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="last_name"
                                 wire:model.defer="last_name" />
                    <x-jet-input-error for="last_name" class="mt-2" />
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="mothers_last_name" value="Apellido Materno" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="mothers_last_name"
                                 wire:model.lazy="mothers_last_name" />
                    <x-jet-input-error for="mothers_last_name" class="mt-2" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="curp" value="Curp" />
                <x-jet-input type="text" class="block mt-1 w-full"
                            wire:model.defer="curp" />
                <x-jet-input-error for="curp" class="mt-2" />
            </div>

            <div class="mt-4 grid grid-cols-12 gap-4" x-data="{}" x-on:creating-students.window="setTimeout(() => $refs.name.focus(), 250)">
                <div class="col-span-12 sm:col-span-6">
                    <x-jet-label for="grade" value="Grado" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="grade"
                                 wire:model.defer="grade" />
                    <x-jet-input-error for="grade" class="mt-2" />
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <x-jet-label for="group" value="Grupo" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="group"
                                 wire:model.defer="group" />
                    <x-jet-input-error for="group" class="mt-2" />
                </div>
            </div>

            <div class="mt-4 grid grid-cols-12 gap-4" x-data="{}" x-on:creating-students.window="setTimeout(() => $refs.name.focus(), 250)">
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="first_period_qualification" value="Primer Periodo" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="first_period_qualification"
                                 wire:model.defer="first_period_qualification" />
                    <x-jet-input-error for="first_period_qualification" class="mt-2" />
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="second_period_qualification" value="Segundo Periodo" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="second_period_qualification"
                                 wire:model.defer="second_period_qualification" />
                    <x-jet-input-error for="second_period_qualification" class="mt-2" />
                </div>
                <div class="col-span-12 sm:col-span-4">
                    <x-jet-label for="third_period_qualification" value="Tercer Periodo" />
                    <x-jet-input type="text" class="block mt-1 w-full"
                                 x-ref="third_period_qualification"
                                 wire:model.lazy="third_period_qualification" />
                    <x-jet-input-error for="third_period_qualification" class="mt-2" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="observations" value="Observaciones" />
                <x-jet-input type="text" class="block mt-1 w-full"
                             x-ref="observations"
                             wire:model.defer="observations" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('creatingStudent')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button class="ml-2"
                        wire:click="store"
                        wire:loading.attr="disabled">
                Guardar
            </x-jet-button>
        </x-slot>
    </form>
</x-dialog-modal>