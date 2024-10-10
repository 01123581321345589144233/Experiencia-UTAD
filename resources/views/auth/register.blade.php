@php
    $btnNumero = 0;
@endphp

<x-guest-layout>


    @switch($btnNumero)
        @case(1)
            @include('auth\register-type\register-aluno')
            @break
    
        @case(2)
            @include('auth\register-type\register-professor')
            @break

        @case(3)
            @include('auth\register-type\register-profissional')
            @break
    
        @default
            <x-primary-button class="ms-4">
                Aluno
                @php
                    $btnNumero = 1;
                @endphp
            </x-primary-button>
    @endswitch


</x-guest-layout>
