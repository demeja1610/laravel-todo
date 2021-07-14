import { closeModal } from "../modal/close";

export const closeOverlay = () => {
    const overlay = document.querySelector('.overlay');

    closeModal('.modal.active');
    overlay?.classList.remove('active');
}
