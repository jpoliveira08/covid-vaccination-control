import {Modal} from "bootstrap";
import FetchRequest from "./FetchRequest.js";
import UrlBuilder from "./UrlBuilder.js";

const SendForm = async (event) => {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const formMethod = document.getElementById('form-method').value;
    const idVaccine = document.getElementById('vaccine-id').value;
    const url = UrlBuilder(formMethod, idVaccine).build();
    try {
        const response = await FetchRequest(url, formMethod, formData);
        alert(response.message);

        const modal = new Modal('#vaccineModal');
        modal.hide();
        location.reload();
    } catch (error) {
        if (error.status === 422) {
            let errorMessages = '';
            Object.keys(error.errors).forEach((field) => {
                errorMessages += `${field}: ${error.errors[field].join(', ')}\n`;
            });

            alert(errorMessages);
            return;
        }

        alert('Contact system administrator.');
        console.error(error);
    }
}

export default SendForm;
