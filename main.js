const edit_buttons = document.getElementsByClassName("edit");

// creates the frame for each todos if the click event happens
for (let i = 0; i < edit_buttons.length; i++){ edit_buttons[i].addEventListener("click", 
new Edit().create_frame) }
