// frontend/js/scripts.js
function filterTasks(filter) {
    const tasks = document.querySelectorAll('.task');

    tasks.forEach(task => {
        if (filter === 'all') {
            task.style.display = 'block';
        } else if (filter === 'completed' && task.getAttribute('data-completed') === '1') {
            task.style.display = 'block';
        } else if (filter === 'pending' && task.getAttribute('data-completed') === '0') {
            task.style.display = 'block';
        } else {
            task.style.display = 'none';
        }
    });
}


// function filterTasks(filter) {
//     const tasks = document.querySelectorAll('.task');

//     tasks.forEach(task => {
//         if (filter === 'all') {
//             task.style.display = 'block';
//         } else if (filter === 'completed' && task.getAttribute('data-completed') === '1') {
//             task.style.display = 'block';
//         } else if (filter === 'pending' && task.getAttribute('data-completed') === '0') {
//             task.style.display = 'block';
//         } else {
//             task.style.display = 'none';
//         }
//     });
// }
