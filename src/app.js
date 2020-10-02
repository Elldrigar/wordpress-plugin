import './sass/main.scss';

window.addEventListener('load', function () {
  const todoInput = document.querySelector('.form__input');
  const todoButton = document.querySelector('.form__button');
  const todoList = document.querySelector('.todo-container__list');

  todoButton.addEventListener('click', addTodo);
  todoList.addEventListener('click', deleteTodo);

  function addTodo(event) {
    if (todoInput.value === '') {
      return;
    } else {
      event.preventDefault();
      const todoDiv = document.createElement('div');
      todoDiv.classList.add('todo');

      const newTodo = document.createElement('li');
      newTodo.innerText = todoInput.value;
      newTodo.classList.add('todo__item');
      todoDiv.appendChild(newTodo);

      const completedButton = document.createElement('button');
      completedButton.innerHTML = '<i class="fas fa-check"></i>';
      completedButton.classList.add('todo__completeBtn');
      todoDiv.appendChild(completedButton);

      const trashButton = document.createElement('button');
      trashButton.innerHTML = '<i class="fas fa-trash"></i>';
      trashButton.classList.add('todo__trashBtn');
      todoDiv.appendChild(trashButton);

      todoList.appendChild(todoDiv);
      todoInput.value = '';
    }
  }
});
