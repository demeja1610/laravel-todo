import { closeOverlay } from "./close";

export const overlay = () => {
    const overlay = document.querySelector('.overlay');

    overlay?.addEventListener('click', () => {
        closeOverlay();
    })
}
