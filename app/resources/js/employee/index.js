function initializeVaccineRepeater() {
    const repeaterContainer = document.getElementById('vaccineRepeaterContainer');
    let vaccineCount = 0;
    repeaterContainer.addEventListener('click', function (e) {
        if (e.target.closest('.add-vaccine')) {
            addVaccineRow();
        }
    });

    function addVaccineRow() {
        vaccineCount++;
        const row = document.createElement('div');
        row.classList.add('row', 'mb-4', 'vaccine-repeater-item');

        row.innerHTML = `
                <div class="col-md-6">
                    <label class="form-label d-block">Vaccine description</label>
                    <div class="vaccineSelect"></div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Dose date</label>
                    <input type="date" class="form-control" name="vaccines[${vaccineCount}][dose_date]">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Dose number</label>
                    <input type="number" class="form-control" name="vaccines[${vaccineCount}][dose_number]">
                </div>
                <div class="col-md-1">
                    <label class="form-label"></label>
                    <button type="button" class="btn btn-danger form-control mt-2 remove-vaccine">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                </div>
            `;

        // Adiciona a nova linha ao container
        repeaterContainer.appendChild(row);

        // Inicializa o VirtualSelect na nova linha
        window.VirtualSelect.init({
            ele: row.querySelector('.vaccineSelect'),
            maxWidth: '500px',
            options: [
                { label: 'Vaccine 1', value: 'vaccine_1' },
                { label: 'Vaccine 2', value: 'vaccine_2' },
                { label: 'Vaccine 3', value: 'vaccine_3' },
            ],
            placeholder: 'Select a vaccine'
        });

        // Adiciona o evento de remoção para o botão da nova linha
        row.querySelector('.remove-vaccine').addEventListener('click', function () {
            row.remove();
        });
    }

    // Inicializa o VirtualSelect na primeira linha
    window.VirtualSelect.init({
        ele: document.querySelector('.vaccineSelect'),
        maxWidth: '500px',
        options: [
            { label: 'Vaccine 1', value: 'vaccine_1' },
            { label: 'Vaccine 2', value: 'vaccine_2' },
            { label: 'Vaccine 3', value: 'vaccine_3' },
        ],
        placeholder: 'Select a vaccine'
    });
}

// Chama a função para inicializar o repetidor
initializeVaccineRepeater();

// const vaccineSelect = document.getElementById('vaccineSelect');
// let debounceTimeout;
//
// window.VirtualSelect.init({
//     ele: vaccineSelect,
//     maxWidth: '500px',
//     search: true,
//     onServerSearch: onVaccineServerSearch,
//     maxOptions: 100,
// });
//
// async function onVaccineServerSearch(searchValue, virtualSelect) {
//     if (searchValue.length < 2) {
//         virtualSelect.setServerOptions([]);
//         return;
//     }
//
//     clearTimeout(debounceTimeout);
//     debounceTimeout = setTimeout(async () => {
//         try {
//             const response = await fetch(`/vaccine/search?search=${encodeURIComponent(searchValue)}`);
//
//             if (!response.ok) {
//                 throw new Error('Erro ao buscar vacinas');
//             }
//
//             const data = await response.json();
//
//             virtualSelect.setServerOptions(data.options);
//
//             if (data.total > 10) {
//                 console.log('Há mais resultados disponíveis');
//             }
//         } catch (error) {
//             console.error('Erro ao buscar vacinas:', error);
//         }
//     }, 300);
// }
