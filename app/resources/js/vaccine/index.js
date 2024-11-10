import { Modal } from 'bootstrap'

window.createVaccine = function () {
    const modal = new Modal('#vaccineModal');
    modal.show();
};

window.showVaccine = async function (idVaccine) {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        document.getElementById('vaccine-name').value = vaccineData.name;
        document.getElementById('vaccine-batch').value = vaccineData.batch;
        document.getElementById('vaccine-expiration-date').value = vaccineData.expiration_date;

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

window.sendForm = async function (event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('/vaccine', {
            method: 'POST',
            credentials: "same-origin",
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const modal = new Modal('#vaccineModal');
        modal.hide();
        location.reload();
        // Add validations
    } catch (error) {
        console.error(error);
    }
}

let modal = document.getElementById('vaccineModal');
modal.addEventListener('hidden.bs.modal', event => {
    let submitButton = document.getElementById('vaccineSubmitButton');
    submitButton.setAttribute('type', 'submit');
    submitButton.textContent = 'Save';
    submitButton.classList.remove('btn-secondary');
    submitButton.classList.add('btn-success');
})

