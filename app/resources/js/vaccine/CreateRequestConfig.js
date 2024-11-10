const CreateRequestConfig = (method = 'POST', body = null) => {
    const config = {
        method: method,
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    };

    if (body) {
        config.body = body;
    }

    return config;
}

export default CreateRequestConfig;
