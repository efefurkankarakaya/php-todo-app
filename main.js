const edit_buttons = document.getElementsByClassName("edit");

for (let i = 0; i < edit_buttons.length; i++){ edit_buttons[i].addEventListener("click", call_frame); }

function call_frame(){
    const edit = new Edit();
    edit.create_frame();
}