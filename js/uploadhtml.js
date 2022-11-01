let fileinput = document.getElementById("file-input");
let imageContainer=document.getElementById("images");
let numofFiles = document.getElementById("num-of-files");


function preview(){
    imageContainer.innerHTML = "";
    numofFiles.textContent=`${fileinput.files.length}
    Files Selected`;

    for(i of fileinput.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figcap = document.createElement("figcaption");

        figcap.innerText = i.name;
        figure.appendChild(figcap);
        reader.onload=()=>{
            let img =document.createElement("img");
            img.setAttribute("src", reader.result);
            figure.insertBefore(img,figcap);
        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }
}