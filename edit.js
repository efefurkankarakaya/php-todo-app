class Edit {
    constructor(){
        this.html = document.createElement("html");
    }

    close_frame = () => {
        document.body.removeChild(this.html);
        document.getElementById("main").style = "opacity: 1";
        document.getElementById("main-table").style = "opacity: 1";
    }

    create_frame = () => {
        document.getElementById("main").style = "opacity: 0.3";
        document.getElementById("main-table").style = "opacity: 0.3";
        const style = document.createElement("style");
        const frame = document.createElement("div");
    
        style.innerHTML = `
        #frame{
            border: 1px solid lightgray;
            margin: auto;
            width: 50%;
            background: lightgray;
            top: 30%;
            right: 25%;
            position: absolute;
        }
        #frame-header{
            height: 10%;
            border: 1px;
            background-color: grey;
        }
    
        #frame-header a{
            margin-top: 1%;
            margin-left: 97%;
            text-align: right;
            background-color: darkred;
            color: white;
            border-radius: 20%;
            text-decoration: none;
        }
    
        #frame-form-group input, textarea, button{
            margin-top: 1%;
        }
        #frame-form-id{
            text-align: center;
        }
        `
        console.log(event.target.parentNode.parentNode.children[1].textContent);
        frame.id = "frame";
        frame.align = "center";
        frame.innerHTML = `
        <div id="frame-header"><a href="#" id="close-form">&nbsp;X&nbsp;</a></div>
        <form action="index.php" method="POST">
            <div class="form-group" id="frame-form-group">
                <input id="frame-form-id" name="id" type="text" class="form-control col-md-1" readonly value=${event.target.parentNode.parentNode.firstElementChild.textContent}>
                <input id="frame-form-name" name="edited_name" type="text" class="form-control col-md-5" placeholder="Name" value=${event.target.parentNode.parentNode.children[1].textContent}>
                <textarea id="frame-form-details" name="edited_details" type="text" class="form-control col-md-5" placeholder="Details">${event.target.parentNode.parentNode.children[2].textContent}</textarea>
                <button id="submit" type="submit" class="btn btn-secondary"><a>Confirm</a></button>
            </div>
        </form>
        `
        
        this.html.appendChild(frame);
        this.html.appendChild(style);
        document.body.appendChild(this.html);

        document.getElementById("close-form").addEventListener("click", this.close_frame);
    }
}

