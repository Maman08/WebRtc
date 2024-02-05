import React, { useState } from "react";
import TodoItem from "./TodoItem";
// Sample todos data
const todosListArray = [
{
id: 1,
title: "ReactJS",
description: "ReactJS description",
completed: false,
},
{
id: 2,
title: "Javascript",
description: "Javascript description",
completed: true,
},
];
const TodoList = () => {
// storing sample todos data into a state to perform CRUD operations
const [todosList, setTodosList] = useState(todosListArray);
const [title, setTitle] = useState("");
const [description, setDescripion] = useState("");
// Adding a new todo
const handleSubmit = (e) => {
e.preventDefault();
if (title !== "" && description !== "") {
const newTodo = {
id: todosList.length + 1,
title: title,
description: description,
};
setTodosList((prevTodosList) => [...prevTodosList, newTodo]);
setTitle("");
setDescripion("");
} else {
alert("Please enter all the fields to proceed...!");
}
};
// updating existing todo
const onUpdateTodo = (id, title, description, completed) => {
setTodosList((prevTodosList) =>
prevTodosList.map((eachTodo) =>
eachTodo.id === id
? {
...eachTodo,
title: title,
description: description,
completed: completed,
}
: eachTodo
)
);
};
// deleting todo
const onDeleteTodo = (id) => {
setTodosList((prevTodosList) =>
prevTodosList.filter((eachTodo) => eachTodo.id !== id)
);
};
return (
<div>
Todo Manager
{/* Adding Todo */}
<div>
<form onSubmit={handleSubmit}>
<input placeholder="title" name="title" value={title}
onChange={(e) => setTitle(e.target.value)} />
<input placeholder="description" value={description}
onChange={(e) => setDescripion(e.target.value)} />
<button onSubmit={handleSubmit}>Add</button>
</form>
</div>
{/* Displaying todos */}
{ todosList.map((eachTodo) => {
return (
<TodoItem
key={eachTodo.id}
eachTodo={eachTodo}
onUpdateTodo={onUpdateTodo}
onDeleteTodo={onDeleteTodo}
/>
);
})}
</div>
);
};
export default TodoList;