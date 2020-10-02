import './sass/main.scss';

window.addEventListener('load', function () {
  const todoInput = document.querySelector('.form__input');
  const todoButton = document.querySelector('.form__button');
  const todoList = document.querySelector('.todo-container__list');

  todoButton.addEventListener('click', addTodo);
  todoList.addEventListener('click', deleteTodo);

  getTodos();
  function addTodo(event) {
    if (todoInput.value === '') {
      return;
    } else {
      event.preventDefault();
      const todoDiv = document.createElement('div');
      todoDiv.classList.add('todo');

      const newTodo = document.createElement('li');
      newTodo.innerText = todoInput.value;
      saveLocalTodos(todoInput.value);
      newTodo.classList.add('todo__item');
      todoDiv.appendChild(newTodo);
      todoInput.value = '';

      const completedButton = document.createElement('button');
      completedButton.innerHTML = '<i class="fas fa-check"></i>';
      completedButton.classList.add('todo__button');
      completedButton.classList.add('todo__button--complete');
      todoDiv.appendChild(completedButton);

      const trashButton = document.createElement('button');
      trashButton.innerHTML = '<i class="fas fa-trash"></i>';
      trashButton.classList.add('todo__button');
      trashButton.classList.add('todo__button--trash');
      todoDiv.appendChild(trashButton);

      todoList.appendChild(todoDiv);
    }
  }
  function deleteTodo(e) {
    const item = e.target;

    if (item.classList[1] === 'todo__button--trash') {
      const todo = item.parentElement;
      todo.classList.add('fall');
      removeLocalTodos(todo);
      todo.addEventListener('transitionend', (e) => {
        todo.remove();
      });
    }
    if (item.classList[1] === 'todo__button--complete') {
      const todo = item.parentElement;
      todo.classList.toggle('completed');
    }
  }
  function saveLocalTodos(todo) {
    let todos;
    if (localStorage.getItem('todos') === null) {
      todos = [];
    } else {
      todos = JSON.parse(localStorage.getItem('todos'));
    }
    todos.push(todo);
    localStorage.setItem('todos', JSON.stringify(todos));
  }
  function removeLocalTodos(todo) {
    let todos;
    if (localStorage.getItem('todos') === null) {
      todos = [];
    } else {
      todos = JSON.parse(localStorage.getItem('todos'));
    }
    const todoIndex = todo.children[0].innerText;
    todos.splice(todos.indexOf(todoIndex), 1);
    localStorage.setItem('todos', JSON.stringify(todos));
  }

  function getTodos() {
    let todos;
    if (localStorage.getItem('todos') === null) {
      todos = [];
    } else {
      todos = JSON.parse(localStorage.getItem('todos'));
    }
    todos.forEach(function (todo) {
      //Create todo div
      const todoDiv = document.createElement('div');
      todoDiv.classList.add('todo');
      //Create list
      const newTodo = document.createElement('li');
      newTodo.innerText = todo;
      newTodo.classList.add('todo__item');
      todoDiv.appendChild(newTodo);
      todoInput.value = '';
      //Create Completed Button
      const completedButton = document.createElement('button');
      completedButton.innerHTML = `<i class="fas fa-check"></i>`;
      completedButton.classList.add('todo__button');
      completedButton.classList.add('todo__button--complete');
      todoDiv.appendChild(completedButton);
      //Create trash button
      const trashButton = document.createElement('button');
      trashButton.innerHTML = `<i class="fas fa-trash"></i>`;
      trashButton.classList.add('todo__button');
      trashButton.classList.add('todo__button--trash');
      todoDiv.appendChild(trashButton);
      //attach final Todo
      todoList.appendChild(todoDiv);
    });
  }
});
