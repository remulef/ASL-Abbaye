let id_doc;

function init(id_doc) {

    let url = "http://localhost/ASL-Abbaye/controler/script-document.php";

    try {
        ajax_post_request(affiche, url, true, encodeURIComponent(id_doc));

    } catch (error) {
        error();
    }

}

function error() {
    alert("error document");
}


function affiche(json) {
    //alert("success");
    console.log(json);
    
    let doc = JSON.parse(json);
    id_doc = doc.id;
    let title = doc.nom;
    let date = doc.datepublication;
    let lien = doc.lien;   
    lien = "/"+lien;
    
    let type = doc.typedoc;
    type= type.toLowerCase();


    type = type.trim()

    let media = document.getElementById("media");

    switch (type) {
        case "jpeg":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id","document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;

        case "jpg":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id","document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;
        case "png":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id","document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);
            break;

        case "pdf":
            var pdf = document.createElement("embed");
            pdf.setAttribute("src",lien);
            pdf.setAttribute("width", "800");
            pdf.setAttribute("height", "500");
            pdf.setAttribute("type", "application/pdf");
            media.appendChild(pdf);

            break;

        case "mp3":
            var div = document.createElement("div");
            div.setAttribute("class","controlimage");


            var divmp3 = document.createElement("div");
            divmp3.setAttribute("class","audiogrid");


            var divimage = document.createElement("div");
            divimage.setAttribute("class","imagegrid");
            var img = document.createElement("img");
            var ressource = "../../data/icon/file/"+type+".svg";
            img.setAttribute("src", ressource);
            img.setAttribute("classe", "cover");
            divimage.appendChild(img);


            var mp3 = document.createElement("audio");
            var source = document.createElement("source");
            source.setAttribute("src", lien);
            source.setAttribute("src", lien);
            source.setAttribute("type","audio/mp3");
            mp3.setAttribute("controls","");
            mp3.append(source);
            divmp3.appendChild(mp3);

          
           
            div.appendChild(divmp3);
            div.appendChild(divimage);
            media.appendChild(div);

            break;
     

        case "mp4":
            var video = document.createElement("video");
            var source = document.createElement("source");
            video.appendChild(source);
            source.setAttribute("src", lien);

            media.appendChild(img);

            break;




        default:
            var img = document.createElement("img");
            var ressource = "../../data/icon/file/"+type+".svg";
            img.setAttribute("src", ressource);
            img.setAttribute("id","document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;
    }


    document.getElementById("telecharger").setAttribute("href", "http://localhost/" + lien);
    document.getElementById("titre").innerHTML = title;





}

function supprimer(){

    if (confirm("Voulez vous vraiment supprimer ce document ")) {
        
        console.log(id_doc);
        id_doc=1816;
        let url = "http://localhost/ASL-Abbaye/controler/script-delete-sql.php?";

        try {
            ajax_post_request(null, url, true, encodeURIComponent(id_doc));

        } catch (error) {
            alert("La suppresion n'a pas aboutie");
        }
      }

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
