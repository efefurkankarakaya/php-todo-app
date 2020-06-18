class Remove{
    close_frame = () => {
        document.body.removeChild(this.html);
        document.getElementById("main").style = "opacity: 1";
        document.getElementById("main-table").style = "opacity: 1";
    }

    create_frame = () => {
        document.getElementById("main").style = "opacity: 0.3";
        document.getElementById("main-table").style = "opacity: 0.3";
        this.html = document.createElement("html");
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

        #frame-form-group input, button{
            margin-top: 1%;
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
                <input type="text" class="form-control col-md-7" readonly value="Are you sure? You will lost your data.">
                <button name="remove-submit" value=${event.target.parentNode.parentNode.firstElementChild.textContent} type="submit" class="btn btn-secondary"><a>Confirm</a></button>
                <button id="remove-cancel" type="submit" class="btn btn-secondary"><a>Cancel</a></button>
            </div>
        </form>
        `
        
        this.html.appendChild(frame);
        this.html.appendChild(style);
        document.body.appendChild(this.html);
        document.getElementById("close-form").addEventListener("click", this.close_frame);
        document.getElementById("remove-cancel").addEventListener("click", this.close_frame);
    }   
}
