

const btnVider = document.getElementById("vider");
btnVider.addEventListener("click",vider);


function vider(event){
    event.preventDefault();
    document.getElementById("formulaire").reset();
    document.getElementById("message").innerText = "";
}

