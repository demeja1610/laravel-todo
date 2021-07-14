import {tasks} from './tasks/init'
import {modal} from './modal/init'
import {overlay} from './overlay/init'
import {notification} from './notification/init'

window.addEventListener('DOMContentLoaded', () => {
    tasks();
    modal();
    overlay();
    notification();
})
