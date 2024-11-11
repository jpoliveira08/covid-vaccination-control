const vaccineSelect = document.getElementById('vaccineSelect');
let debounceTimeout;

window.VirtualSelect.init({
    ele: vaccineSelect,
    maxWidth: '500px',
    search: true,
    onServerSearch: onVaccineServerSearch,
    maxOptions: 100,
});

async function onVaccineServerSearch(searchValue, virtualSelect) {
    if (searchValue.length < 2) {
        virtualSelect.setServerOptions([]);
        return;
    }

    clearTimeout(debounceTimeout);
    debounceTimeout = setTimeout(async () => {
        try {
            const response = await fetch(`/vaccine/search?search=${encodeURIComponent(searchValue)}`);

            if (!response.ok) {
                throw new Error('Erro ao buscar vacinas');
            }

            const data = await response.json();

            virtualSelect.setServerOptions(data.options);

            if (data.total > 10) {
                console.log('Há mais resultados disponíveis');
            }
        } catch (error) {
            console.error('Erro ao buscar vacinas:', error);
        }
    }, 300);
}
