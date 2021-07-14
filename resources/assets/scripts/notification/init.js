export const notification = () => {
    const notificationsCloseBtn = document.querySelectorAll('.notification__close');

    notificationsCloseBtn.forEach(notificationCloseBtn => {
        notificationCloseBtn.addEventListener('click', () => {
            notificationCloseBtn.closest('.notification').remove();
        })
    })
}
