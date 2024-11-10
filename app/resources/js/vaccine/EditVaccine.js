import DisableInputs from "../utils/DisableInputs.js";
import {Modal} from "bootstrap";

const fillVaccineInputs = (vaccineData) => {
    const inputName = document.getElementById('vaccine-name');
    const inputBatch = document.getElementById('vaccine-batch');
    const inputExpirationDate = document.getElementById('vaccine-expiration-date');

    inputName.value = vaccineData.name;
    inputBatch.value = vaccineData.batch;
    inputExpirationDate.value = vaccineData.expiration_date;
}

const EditVaccine = async (idVaccine) => {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        fillVaccineInputs(vaccineData);

        const modal = new Modal('#vaccineModal');
        modal.show();

        document.getElementById('form-method').value = 'PUT';
        document.getElementById('vaccine-id').value = idVaccine;
    } catch (error) {
        console.error(error);
    }
}

export default EditVaccine;
