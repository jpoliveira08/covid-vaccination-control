<x-layout>
    <x-slot:heading>
        <h1>Vaccines</h1>
    </x-slot:heading>
    <a href="{{ route('vaccine.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        New vaccine
    </a>
    <livewire:tables.vaccine-table/>
    <div class="modal fade" id="viewVaccineModal" tabindex="-1" aria-labelledby="viewVaccineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteVaccineModal" tabindex="-1" aria-labelledby="deleteVaccineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete vaccine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this vaccine record?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('vaccine.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
