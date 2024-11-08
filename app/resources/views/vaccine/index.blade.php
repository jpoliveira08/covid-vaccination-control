<x-layout>
    <x-slot:heading>
        <h1>Vaccines</h1>
    </x-slot:heading>
    <a href="{{ route('vaccine.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        Vaccine
    </a>
    <livewire:tables.vaccine-table/>
</x-layout>
