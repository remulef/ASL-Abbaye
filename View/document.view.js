


function init(id_doc) {
   
    let url = "http://localhost/ASL-Abbaye/controler/script-document.php";

    try {
        ajax_post_request(affiche, url, true, encodeURIComponent(id_doc));
        
    } catch (error) {
        error();
    }

}

function error(){
    alert("error document");
}


function affiche(json) {
    //alert("success");
    console.log(json);

    let doc = JSON.parse(json);
    let title = doc.nom;
    let date = doc.datepublication;
    let lien ="DocumentCompteRendu/"+title;
    let type = doc.typedoc;

    
    type = type.trim()

    let media = document.getElementById("media");

    switch (type) {
        case "jpeg":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            media.appendChild(img);

            break;
        case "png":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            media.appendChild(img);

            break;

        case "pdf":
            var pdf = document.createElement("embed");
            pdf.setAttribute("src","/"+lien);
            pdf.setAttribute("width","800");
            pdf.setAttribute("height","500");
            pdf.setAttribute("type","application/pdf");
            media.appendChild(pdf);

            break;

        case "mp3":
            var mp3 = document.createElement("audio");
            mp3.setAttribute("src",lien);
            media.appendChild(mp3);
            
            break;
        case "mpg":
            var video = document.createElement("video");
            var source = document.createElement("source");
            video.appendChild(source);
            source.setAttribute("src",lien);
           
            media.appendChild(img);
            
            break;
            
        case "mp4":
            var video = document.createElement("video");
            var source = document.createElement("source");
            video.appendChild(source);
            source.setAttribute("src",lien);
           
            media.appendChild(img);
            
            break;
                    
            break;


        default:
            var icon="chemin/"+type+"png";
            var obj = document.createElement("img");
            obj.setAttribute("src",icon);
            media.appendChild(obj);
                    
            break;
    }


    document.getElementById("telecharger").setAttribute("href","/"+lien);
    document.getElementById("titre").innerHTML=title;





}

function ajax_post_request(callback, url, async, data) {
    // Instanciation d'un objet XHR
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (callback && xhr.readyState == 4 && xhr.status == 200) {
            callback(xhr.responseText);
        }
    };

    // Initialisation de l'objet
    // (avec la définition du format des données envoyées)
    xhr.open("POST", url, async);
    xhr.setRequestHeader("Content-Type",
        "application/x-www-form-urlencoded");

    // Envoi de la requête
    if (data === null) {
        xhr.send(null);
    } else {
        xhr.send("data=" + data);
    }
}
