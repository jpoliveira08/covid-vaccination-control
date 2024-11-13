import EmployeeVaccineRepeater from "../employee-vaccination/repeater/EmployeeVaccineRepeater.js";
import CpfMask from "../utils/CpfMask.js";

EmployeeVaccineRepeater();
window.deleteRow = (event) => {
    const row = event.target.parentElement.parentElement;
    row.remove();
}

document.getElementById("employee-cpf").addEventListener("input", function() {
    CpfMask(this);
});
