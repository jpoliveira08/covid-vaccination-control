<x-layout>
    <x-slot:heading>
        <h1>New vaccine</h1>
    </x-slot:heading>

    <form method="POST" action="{{ route('vaccine.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="inputVaccineName" class="form-label">Vaccine name</label>
                <input type="text" class="form-control" id="inputVaccineName" name="name">
            </div>
            <div class="col-md-3">
                <label for="inputBatch" class="form-label">Batch</label>
                <input type="text" class="form-control" id="inputBatch" name="batch">
            </div>
            <div class="col-md-3">
                <label for="inputExpirationDate" class="form-label">Expiration date</label>
                <input type="date" class="form-control" id="inputExpirationDate" name="expiration_date">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
</x-layout>
