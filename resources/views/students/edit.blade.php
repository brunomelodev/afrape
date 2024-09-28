<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ 'Editar Aluno' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">






                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Editar Aluno
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Editar um Aluno
                            </p>
                        </header>

                        <form method="post" action="{{ route('students.update', $student) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            @include('students.partials.form')

                            <div class="flex items-center gap-4">
                                <x-primary-button>Salvar</x-primary-button>
                            </div>


                        </form>
                    </section>






                </div>
            </div>
        </div>
    </div>

</x-app-layout>