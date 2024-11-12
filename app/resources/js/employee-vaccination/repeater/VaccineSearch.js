let debounceTimeout;

const VaccineSearch = async (searchValue, virtualSelect) => {
    clearTimeout(debounceTimeout);

    debounceTimeout = setTimeout(async () => {
        try {
            const response = await fetch(`/vaccine/search?search=${encodeURIComponent(searchValue)}`);

            if (!response.ok) {
                throw new Error('Erro ao buscar vacinas');
            }

            const data = await response.json();

            virtualSelect.setServerOptions(data.options);
        } catch (error) {
            console.error('Erro ao buscar vacinas:', error);
        }
    }, 300);
}

export default VaccineSearch;
