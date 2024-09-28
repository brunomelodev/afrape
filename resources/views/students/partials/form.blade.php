<div class="flex">
    <div class="w-full mr-2">

        <div>
            <x-input-label for="name" value="Nome" />
            <x-text-input class="mt-1 block w-full"
                id="name"
                name="name"
                type="text"
                value="{{ $student->name ?? old('name') }}"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="cpf" value="CPF" />
            <x-text-input class="mt-1 block w-full mask-cpf"
                id="cpf"
                name="cpf"
                type="text"
                value="{{ $student->cpf ?? old('cpf') }}"
                required autocomplete="cpf" />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>

        <div>
            <x-input-label for="rg" value="RG" />
            <x-text-input class="mt-1 block w-full"
                id="rg"
                name="rg"
                type="text"
                value="{{ $student->rg ?? old('rg') }}"
                required autocomplete="rg" />
            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
        </div>

        <div>
            <x-input-label for="birthday" value="Aniversário" />
            <x-text-input class="mt-1 block w-full"
                id="birthday"
                name="birthday"
                type="date"
                value="{{ $student->birthday ?? old('birthday') }}"
                autocomplete="birthday" />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <div>
            <x-input-label for="nis" value="NIS" />
            <x-text-input class="mt-1 block w-full"
                id="nis"
                name="nis"
                type="text"
                value="{{ $student->nis ?? old('nis') }}"
                autocomplete="nis" />
            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
        </div>

        <div>
            <x-input-label for="ra" value="RA" />
            <x-text-input class="mt-1 block w-full"
                id="ra"
                name="ra"
                type="text"
                value="{{ $student->ra ?? old('ra') }}"
                autocomplete="ra" />
            <x-input-error class="mt-2" :messages="$errors->get('ra')" />
        </div>

        <div>
            <x-input-label for="responsible_name" value="Responsável" />
            <x-text-input class="mt-1 block w-full"
                id="responsible_name"
                name="responsible_name"
                type="text"
                value="{{ $student->responsible_name ?? old('responsible_name') }}"
                required autocomplete="responsible_name" />
            <x-input-error class="mt-2" :messages="$errors->get('responsible_name')" />
        </div>

    </div>


    <div class="w-full ml-2">

        <div>
            <x-input-label for="phone" value="Telefone" />
            <x-text-input class="mt-1 block w-full mask-phone"
                id="phone"
                name="phone"
                type="text"
                value="{{ $student->phone ?? old('phone') }}"
                required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="whatsapp" value="WhatsApp" />
            <x-text-input class="mt-1 block w-full mask-whatsapp"
                id="whatsapp"
                name="whatsapp"
                type="text"
                value="{{ $student->whatsapp ?? old('whatsapp') }}"
                autocomplete="whatsapp" />
            <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
        </div>

        <div>
            <x-input-label for="gender" value="Sexo" />
            <x-select-input class="mt-1 block w-full"
                id="gender"
                name="gender">
                <option disabled selected>Selecionar</option>
                @foreach ($options as $key => $value)
                <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : ''}}
                    @if (isset($student->gender))
                         {{ $student->gender == $key ? 'selected' : '' }}
                    @endif
                    >{{ $value }}
                </option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="origin_school" value="Escola Origem" />
            <x-text-input class="mt-1 block w-full"
                id="origin_school"
                name="origin_school"
                type="text"
                value="{{ $student->origin_school ?? old('origin_school') }}"
                autocomplete="origin_school" />
            <x-input-error class="mt-2" :messages="$errors->get('origin_school')" />
        </div>

        <div>
            <x-input-label for="series" value="Série" />
            <x-text-input class="mt-1 block w-full"
                id="series"
                name="series"
                type="text"
                value="{{ $student->series ?? old('series') }}"
                autocomplete="series" />
            <x-input-error class="mt-2" :messages="$errors->get('series')" />
        </div>

        <div>
            <x-input-label for="class" value="Turma" />
            <x-text-input class="mt-1 block w-full"
                id="class"
                name="class"
                type="text"
                value="{{ $student->class ?? old('class') }}"
                autocomplete="class" />
            <x-input-error class="mt-2" :messages="$errors->get('class')" />
        </div>

        <div>
            <x-input-label for="date_of_entry" value="Data de ingresso" />
            <x-text-input class="mt-1 block w-full"
                id="date_of_entry"
                name="date_of_entry"
                type="date"
                value="{{ $student->date_of_entry ?? old('date_of_entry') }}"
                autocomplete="date_of_entry" />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_entry')" />
        </div>
    </div>

</div>