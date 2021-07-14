import {triggers} from './triggers'
import {closeOverlay} from '../overlay/close'

export const modal = () => {
    triggers();

    const modalCloseBtns = document.querySelectorAll('.modal__close');

    modalCloseBtns.forEach(button => {
        button.addEventListener('click', () => {
            closeOverlay();
        })
    })
}
