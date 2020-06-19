add_event_listeners(document.getElementsByClassName("edit"), new Edit());
add_event_listeners(document.getElementsByClassName("remove"), new Remove());

// creates the frame for each notes if the click event happens
function add_event_listeners(collection, object){
    for (let i = 0; i < collection.length; i++){
        collection[i].addEventListener("click", object.create_frame);
    }
}