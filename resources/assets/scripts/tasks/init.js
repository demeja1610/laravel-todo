export const tasks = function () {
    const tasks = document.querySelectorAll('.tasks__item');

    tasks.forEach(task => {
        task.addEventListener('click', () => {
            task.classList.toggle('active');
        })
    })
}
