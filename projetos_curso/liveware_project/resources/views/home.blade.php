<x-layouts.main-layout>
    <div class="display-6 text-center">
        LIVEWIRE
    </div>
    <hr>
    @livewire('counter')
    @php
        $msg=123;
    @endphp

    <hr>
    <livewire:inline-component value="valor value" :php_value="$msg">
    <hr>

    @livewire("form-component")
</x-layouts.main-layout>