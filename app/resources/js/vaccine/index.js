import { Modal } from 'bootstrap'
import DisableInputs from '../utils/DisableInputs.js';
import EnableInputs from "../utils/EnableInputs.js";
import SendForm from "./SendForm.js";
import DeleteVaccine from "./DeleteVaccine.js";
import EditVaccine from './EditVaccine.js';

window.createVaccine = function () {
    const modal = new Modal('#vaccineModal');
    modal.show();
};

const fillVaccineInputs = (vaccineData) => {
    const inputName = document.getElementById('vaccine-name');
    const inputBatch = document.getElementById('vaccine-batch');
    const inputExpirationDate = document.getElementById('vaccine-expiration-date');

    inputName.value = vaccineData.name;
    inputBatch.value = vaccineData.batch;
    inputExpirationDate.value = vaccineData.expiration_date;
}


window.showVaccine = async function (idVaccine) {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        fillVaccineInputs(vaccineData);
        DisableInputs([
            'vaccine-name',
            'vaccine-batch',
            'vaccine-expiration-date'
        ]);

        let submitButton = document.getElementById('vaccineSubmitButton');
        submitButton.setAttribute('type', 'button');
        submitButton.setAttribute('data-bs-dismiss', 'modal');
        submitButton.textContent = 'Close';
        submitButton.classList.remove('btn-success');
        submitButton.classList.add('btn-secondary');


        const modal = new Modal('#vaccineModal');
        modal.show();
    } catch (error) {
        console.error(error);
    }
};

window.SendForm = SendForm;
window.EditVaccine = EditVaccine;
window.DeleteVaccine = DeleteVaccine;

let modal = document.getElementById('vaccineModal');
modal.addEventListener('hidden.bs.modal', event => {
    document.getElementById('vaccineForm').reset();
    EnableInputs([
        'vaccine-name',
        'vaccine-batch',
        'vaccine-expiration-date'
    ]);

    document.getElementById('form-method').value = 'POST';
    document.getElementById('vaccine-id').value = '';

    let submitButton = document.getElementById('vaccineSubmitButton');
    submitButton.setAttribute('type', 'submit');
    submitButton.textContent = 'Save';
    submitButton.classList.remove('btn-secondary');
    submitButton.classList.add('btn-success');
})

