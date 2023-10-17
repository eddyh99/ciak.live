const   bodyContent = document.querySelector("body"),
        modeToggleContent = body.querySelector(".mode-toggle-content");


let getModeContent = localStorage.getItem("explicit");
if(getModeContent && getModeContent === "yes"){
    body.classList.toggle("explicit");
}

modeToggleContent.addEventListener("click", () =>{

    body.classList.toggle("explicit");
    if(body.classList.contains("explicit")){
        localStorage.setItem("explicit", "yes");
    }else{
        localStorage.setItem("explicit", "no");
    }

});
