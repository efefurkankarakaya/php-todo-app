class Remove{
    close_frame = () => {
        document.body.removeChild(this.html);
        document.getElementById("main").style = "opacity: 1";
    }

    create_frame = () => {
        document.getElementById("main").style = "opacity: 0.3";
        this.html = document.createElement("html");
        const head = document.createElement("head");
        const link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "css/remove.css";
        const frame = document.createElement("div");

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

        head.appendChild(link);
        this.html.appendChild(head);
        this.html.appendChild(frame);
        document.body.appendChild(this.html);
        document.getElementById("close-form").addEventListener("click", this.close_frame);
        document.getElementById("remove-cancel").addEventListener("click", this.close_frame);
    }   
}
