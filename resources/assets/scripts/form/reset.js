export const resetForm = (form) => {
    if(form instanceof HTMLElement) {
        const inputs = form.querySelectorAll('input, textarea');

        form.reset();

        inputs.forEach(input => {
            input.value = '';
            input.innerHTML = '';
        })
    }
}
