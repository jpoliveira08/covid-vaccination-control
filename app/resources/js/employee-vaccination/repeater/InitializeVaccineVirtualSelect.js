import VaccineSearch from './VaccineSearch.js';

const InitializeVaccineVirtualSelect = (element, inputName) => {
    window.VirtualSelect.init({
        ele: element,
        maxWidth: '500px',
        search: true,
        name: inputName,
        onServerSearch: VaccineSearch,
        maxOptions: 100,
    });
}

export default InitializeVaccineVirtualSelect;
