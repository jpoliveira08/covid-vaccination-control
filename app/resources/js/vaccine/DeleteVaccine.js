import {Modal} from "bootstrap";
import DisableInputs from "../utils/DisableInputs.js";

const fillVaccineInputs = (vaccineData) => {
    const inputName = document.getElementById('vaccine-name');
    const inputBatch = document.getElementById('vaccine-batch');
    const inputExpirationDate = document.getElementById('vaccine-expiration-date');

    inputName.value = vaccineData.name;
    inputBatch.value = vaccineData.batch;
    inputExpirationDate.value = vaccineData.expiration_date;
}
const DeleteVaccine = async (idVaccine) => {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        fillVaccineInputs(vaccineData);
        DisableInputs([
            'vaccine-name',
            'vaccine-batch',
            'vaccine-expiration-date'
        ]);

        const modal = new Modal('#vaccineModal');
        modal.show();

        document.getElementById('form-method').value = 'DELETE';
        document.getElementById('vaccine-id').value = idVaccine;
    } catch (error) {
        console.error(error);
    }
}

export default DeleteVaccine;
