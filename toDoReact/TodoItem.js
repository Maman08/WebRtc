import React, { useState } from "react";
const TodoItem = (props) => {
const { eachTodo, onDeleteTodo, onUpdateTodo } = props;
const [editing, setEditing] = useState(false);
const [title, setUpdatedTitle] = useState(eachTodo.title);
const [description, setUpdatedDescription] = useState(eachTodo.description);
const [completed, setCompleted] = useState(eachTodo.completed);
const handleUpdate = () => {
onUpdateTodo(eachTodo.id, title, description, completed);
setEditing(false);
};
const handleDelete = () => { onDeleteTodo(eachTodo.id); };
const handleToggle = () => { setCompleted(!completed);
onUpdateTodo(eachTodo.id, title, description, completed);
};
const handleEdit = () => { setEditing(true); };
return (
<div className={`arrayofList ${completed ? "completed" : ""}`}>
{editing ? (
<>
<input type="text" value={title}
onChange={(e) => setUpdatedTitle(e.target.value)} />
<input type="text" value={description}
onChange={(e) => setUpdatedDescription(e.target.value)} />
<button onClick={handleUpdate}>Update</button>
</>
) : (
<>
<span className="todo-title">{title}</span>
<span className="todo-description">{description}</span>
<span>
<button onClick={handleToggle}> {completed ? "Incomplete" : "Complete"} </button>
<button onClick={handleEdit}>Edit</button>
<button onClick={handleDelete}>Delete</button>
</span>
</>
)}
</div>
);
};
export default TodoItem;