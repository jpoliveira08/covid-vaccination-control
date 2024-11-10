import {Modal} from "bootstrap";

const SendForm = async (event) => {
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

        if (!response.ok) {
            const errorData = await response.json();
            let errorMessages = '';
            Object.keys(errorData).forEach((field) => {
                errorMessages += `${field}: ${errorData[field].join(', ')}\n`;
            });

            alert(errorMessages);

            return;
        }

        const modal = new Modal('#vaccineModal');
        modal.hide();
        location.reload();
    } catch (error) {
        console.error(error);
    }
}

export default SendForm;
