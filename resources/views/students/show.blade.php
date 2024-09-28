<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Alunos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <section>
                        <header>
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Listagem de Alunos
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Listando todos os alunos cadastrados
                                </p>
                            </div>
                        </header>





                        <div class="mt-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                            <x-alert />


                            <ul class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <li><b>Nome:</b> {{ $student->name }}</li>
                                <li><b>CPF:</b> {{ $student->cpf }}</li>
                                <li><b>RG:</b> {{ $student->rg }}</li>
                                <li><b>Aniversário:</b> {{ $student->birthday }}</li>
                                <li><b>NIS:</b> {{ $student->nis }}</li>
                                <li><b>RA:</b> {{ $student->ra }}</li>
                                <li><b>Responsável:</b> {{ $student->responsible_name }}</li>
                                <li><b>Telefone:</b> {{ $student->phone }}</li>
                                <li><b>WhatsApp:</b> {{ $student->whatsapp }}</li>
                                <li><b>Sexo:</b> {{ $student->gender }}</li>
                                <li><b>Escola de Origem:</b> {{ $student->origin_school }}</li>
                                <li><b>Série:</b> {{ $student->series }}</li>
                                <li><b>Classe:</b> {{ $student->class }}</li>
                                <li><b>Data de Ingresso:</b> {{ $student->date_of_entry }}</li>
                                <li><b>Status:</b> {{ $student->active }}</li>
                                <li><b>Suporte:</b> {{ $student->support }}</li>
                                <li><b>Status:</b> {{ $student->status }}</li>

                            </ul>



                        </div>









                    </section>






                </div>
            </div>
        </div>
    </div>










</x-app-layout>