import {openOverlay} from '../overlay/open'

export const triggers = () => {
    const triggers = document.querySelectorAll('.modal-trigger[data-modal]');


    triggers.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(`.modal[data-modal="${button.getAttribute('data-modal')}"]`);

            if (modal) {
                openOverlay();
                modal.classList.add('active');
            }
        })
    })
}
