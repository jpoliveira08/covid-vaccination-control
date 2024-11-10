import CreateRequestConfig from "./CreateRequestConfig.js";

const FetchRequest = async (url, method, body) => {
    const config = CreateRequestConfig(method, body);

    try {
        const response = await fetch(url, config);

        if (!response.ok) {
            const errorData = await response.json();

            if (response.status === 422) {
                throw { status: 422, errors: errorData };
            }

            throw { status: response.status, message: 'Contact system administrator.' };
        }
    } catch (error) {
        throw error;
    }

}

export default FetchRequest;
