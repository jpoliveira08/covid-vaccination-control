@extends('layout.layout')

@section('title')
    Create Employee
@endsection
@section('content')
    @section('page_title')
        Create Employee
    @endsection

<form action="{{ route('employee.store') }}" method="POST">
    @csrf
    @method('POST')
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
    <div id="vaccineRepeaterContainer">
        <div class="row mb-4 vaccine-repeater-item">
            <div class="col-md-6">
                <label class="form-label d-block">Vaccine description</label>
                <div class="vaccineSelect"></div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Dose date</label>
                <input type="date" class="form-control" name="vaccines[0][dose_date]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dose number</label>
                <input type="number" class="form-control" name="vaccines[0][dose_number]">
            </div>
            <div class="col-md-1">
                <label class="form-label"></label>
                <button type="button" class="btn btn-primary form-control mt-2 add-vaccine">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-1">
            <a href="{{ route('employee.index') }}" type="button" class="btn btn-secondary" id="cancelButton">Cancel</a>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</form>
@endsection
@push('scripts')
    @vite('resources/js/employee/index.js')
@endpush

