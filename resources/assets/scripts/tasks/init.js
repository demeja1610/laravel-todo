export const tasks = function () {
    const tasksTriggers = document.querySelectorAll('.tasks__item-name');

    tasksTriggers.forEach(tasksTrigger => {
        tasksTrigger.addEventListener('click', () => {
            tasksTrigger.closest('.tasks__item').classList.toggle('active');
        })
    })
}
