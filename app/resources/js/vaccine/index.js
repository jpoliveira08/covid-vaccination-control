let viewVaccine = async idVaccine => {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        document.getElementById('vaccine-name').value = vaccineData.name;
        document.getElementById('vaccine-batch').value = vaccineData.batch;
        document.getElementById('vaccine-expiration-date').value = vaccineData.expiration_date;

        console.log($('#vaccine-name'));
    } catch (error) {
        console.error(error);
    }
};
