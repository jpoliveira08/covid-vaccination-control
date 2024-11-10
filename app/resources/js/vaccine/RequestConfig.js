const RequestConfig = (method = 'POST', body = null) => {
    const config = {
        method: method,
        credentials: 'same-origin',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    };

    if (body) {
        config.body = body;
    }

    return config;
}

export default RequestConfig;
