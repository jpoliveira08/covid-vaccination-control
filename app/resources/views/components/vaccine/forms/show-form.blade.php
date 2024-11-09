<form method="POST" action="{{ route('vaccine.store') }}">
    @csrf
    <div class="mb-3">
        <label for="vaccine-name" class="form-label">Name</label>
        <input type="text" class="form-control" id="vaccine-name" name="name">
    </div>
    <div class="mb-3">
        <label for="vaccine-batch" class="form-label">Batch</label>
        <input type="text" class="form-control" id="vaccine-batch" name="batch">
    </div>
    <div class="mb-3">
        <label for="vaccine-expiration-date" class="form-label">Expiration date</label>
        <input type="date" class="form-control" id="vaccine-expiration-date" name="expiration_date">
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
