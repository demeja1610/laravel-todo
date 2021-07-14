import { resetForm } from "../form/reset";

export const closeModal = selector => {
    const modals = document.querySelectorAll(selector);

    modals.forEach(modal => {
        const errors = modal.querySelectorAll('.form-error');
        const forms = modal.querySelectorAll('form');

        modal.classList.remove('active');

        setTimeout(() => {
            errors.forEach(error => {
                error.remove();
            })

            forms.forEach(form => {
                resetForm(form);
            })
        }, 300);
    })
}
