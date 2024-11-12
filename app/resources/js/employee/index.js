import EmployeeVaccineRepeater from "../employee-vaccination/repeater/EmployeeVaccineRepeater.js";

EmployeeVaccineRepeater();
window.deleteRow = (event) => {
    const row = event.target.parentElement.parentElement;
    row.remove();
}

function cpfMask(input) {
    let cpf = input.value.replace(/\D/g, '');

    if (cpf.length > 11) {
        cpf = cpf.substring(0, 11);
    }

    if (cpf.length > 6) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d+)/, '$1.$2.$3');
    } else if (cpf.length > 3) {
        cpf = cpf.replace(/(\d{3})(\d+)/, '$1.$2');
    }

    if (cpf.length > 9) {
        cpf = cpf.replace(/(\d{3}\.\d{3}\.\d{3})(\d{2})$/, '$1-$2');
    }

    input.value = cpf;
}

document.getElementById("employee-cpf").addEventListener("input", function() {
    cpfMask(this);
});
