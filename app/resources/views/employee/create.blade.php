@extends('layout.layout')

@section('title')
    Create Employee
@endsection
@section('content')
    @section('page_title')
        Create Employee
    @endsection

<form>
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="employee-name" class="form-label">Name</label>
            <input type="text" class="form-control" id="employee-name" name="employee" required>
        </div>
        <div class="col-md-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="validationCustom03" required>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="birth-date" class="form-label">Birth date</label>
            <input type="date" class="form-control" id="birth-date" name="birth_date" required>
        </div>
    </div>
    <div class="row mb-4 ms-1">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="has-comorbidity" name="has_comorbidity">
            <label class="form-check-label" for="has_comorbidity">Has comorbidity</label>
        </div>
    </div>
    <hr>
    <h2>Vaccines</h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="vaccineSelect" class="form-label">Vaccine description</label>
            <div id="vaccineSelect"></div>
        </div>
        <div class="col-md-3">
            <label for="dose-date" class="form-label">Dose date</label>
            <input type="date" class="form-control" id="dose-date" name="dose_date">
        </div>
        <div class="col-md-2">
            <label for="dose-number" class="form-label">Dose number</label>
            <input type="number" class="form-control" id="dose-number" name="dose_number">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-1">
            <a href="{{ route('employee.index') }}" type="button" class="btn btn-secondary" id="cancelButton">Cancel</a>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
@endsection
@push('scripts')
    @vite('resources/js/employee/index.js')
@endpush

