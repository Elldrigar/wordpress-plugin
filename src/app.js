import './sass/main.scss';

window.addEventListener('load', function () {
  const todoInput = document.querySelector('.form__input');
  const todoButton = document.querySelector('.form__button');
  const todoList = document.querySelector('.todo-container__list');

  todoButton.addEventListener('click', addTodo);

  function addTodo(event) {
    event.preventDefault();
    const todoDiv = document.createElement('div');
    todoDiv.classList.add('todo');

    const newTodo = document.createElement('li');
    newTodo.classList.add('todo-item');
    todoDiv.appendChild(newTodo);

    const completedButton = document.createElement('button');
    completedButton.innerHTML = '<i class="fas fa-check"></i>';
    completedButton.classList.add('complete-btn');
    todoDiv.appendChild(completedButton);

    const trashButton = document.createElement('button');
    trashButton.innerHTML = '<i class="fas fa-trash"></i>';
    trashButton.classList.add('complete-btn');
    todoDiv.appendChild(trashButton);

    todoList.appendChild(todoDiv);
  }
});
