let id_doc;
let lien;
function init(id_doc) {
    //document.getElementById("myInput").style.display = "none";
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
    lien = doc.lien;
    lien = "/" + lien;

    let type = doc.typedoc;
    type = type.toLowerCase();


    type = type.trim()

    let media = document.getElementById("media");

    switch (type) {
        case "jpeg":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id", "document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;

        case "jpg":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id", "document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;
        case "png":
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("id", "document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);
            break;

        case "pdf":
            var pdf = document.createElement("embed");
            pdf.setAttribute("src", lien);
            pdf.setAttribute("width", "800");
            pdf.setAttribute("height", "500");
            pdf.setAttribute("type", "application/pdf");
            media.appendChild(pdf);

            break;

        case "mp3":
            var div = document.createElement("div");
            div.setAttribute("class", "controlimage");


            var divmp3 = document.createElement("div");
            divmp3.setAttribute("class", "audiogrid");


            var divimage = document.createElement("div");
            divimage.setAttribute("class", "imagegrid");
            var img = document.createElement("img");
            var ressource = "../../data/icon/file/" + type + ".svg";
            img.setAttribute("src", ressource);
            img.setAttribute("classe", "cover");
            divimage.appendChild(img);


            var mp3 = document.createElement("audio");
            var source = document.createElement("source");
            source.setAttribute("src", lien);
            source.setAttribute("src", lien);
            source.setAttribute("type", "audio/mp3");
            mp3.setAttribute("controls", "");
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
            var ressource = "../../data/icon/file/" + type + ".svg";
            img.setAttribute("src", ressource);
            img.setAttribute("id", "document");
            img.setAttribute("width", "400");
            img.setAttribute("height", "400");
            media.appendChild(img);

            break;
    }


    document.getElementById("telecharger").setAttribute("href", "http://localhost/" + lien);
    document.getElementById("titreh1").innerHTML = title;





}

function supprimer() {

    if (confirm("Voulez vous vraiment supprimer ce document ")) {

        console.log(id_doc);
        id_doc = 1816;
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

function modifier() {
    //ajouter des infos bull avec des span https://www.alsacreations.com/astuce/lire/1-comment-personnaliser-une-infobulle.html
    var button_modifier = document.getElementById("modifier");
    var div_description = document.getElementById("description");
    var description = div_description.getElementsByTagName("p")[0].innerHTML;
    var div_titre = document.getElementById("titre");
    var titre = document.getElementsByTagName("h1")[0].innerHTML;

    div_description.removeChild(div_description.getElementsByTagName("p")[0]);
    var input_description = document.createElement("textarea");
    input_description.setAttribute("spellcheck", "false");
    input_description.setAttribute("id", "input_description");
    input_description.setAttribute("name", "nouvelle description ");
    input_description.setAttribute("rows", "4");
    //input_description.setAttribute("cols","95");
    input_description.innerHTML = description;

    div_description.append(input_description);

    div_titre.removeChild(div_titre.getElementsByTagName("h1")[0]);
    var input_title = document.createElement("textarea");
    input_title.setAttribute("id", "input_title");
    input_title.setAttribute("spellcheck", "false");
    input_title.setAttribute("name", "nouveau titre ");
    input_title.setAttribute("rows", "1");

    input_title.innerHTML = titre;

    div_titre.append(input_title);


    button_modifier.setAttribute("onclick", "valider()");

}


function valider() {
    var button_modifier = document.getElementById("modifier");
    var div_description = document.getElementById("description");
    var div_titre = document.getElementById("titre");

    var title = document.getElementsByTagName("textarea")[0].value;
    var description = document.getElementsByTagName("textarea")[1].value;


    div_titre.removeChild(div_titre.getElementsByTagName("textarea")[0]);
    var h1 = document.createElement("h1");
    h1.setAttribute("id", "titreh1");
    h1.innerHTML = title;
    div_titre.append(h1);

    div_description.removeChild(div_description.getElementsByTagName("textarea")[0]);
    var p = document.createElement("p");
    p.innerHTML = description;
    div_description.append(p);

    button_modifier.setAttribute("onclick", "modifier()");

    var newdoc = ({
        id_doc: id_doc,
        title: title,
        descr: description
    })

    console.log(newdoc);

    try {
        uri = JSON.stringify(newdoc);
        let url = "http://localhost/ASL-Abbaye/controler/script-modify.php?";
        ajax_post_request(null, url, false, encodeURIComponent(uri));
    } catch (error) {
        alert(error);
    }

}





function myFunction() {
    /*
    var lien = document.getElementById("telecharger");
    lien.innerHTML=lien.getAttribute("href");
    */

    var copy = document.createElement("a");
    copy.innerHTML = "http://localhost" + lien;
    var range = document.createRange();
    document.getElementById("telecharger").append(copy);
    range.selectNode(copy);
    window.getSelection().addRange(range);

    try {
        var successful = document.execCommand('copy');
        document.getElementById("telecharger").removeChild(copy);
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Copy email command was ' + msg);
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + "http://localhost" + lien;;

    } catch (error) {
        console.log('Oops, unable to copy');

    }
    window.getSelection().removeAllRanges();





}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copy to clipboard";
}



$.getJSON(
    "https://spreadsheets.google.com/feeds/list/1bGgvgvlumPjv1NrL8-EpFPQpgv2zObV_02M6NvzgyRM/od6/public/values?alt=json",
    function (data) {
        console.log(data);
        for (var i = 0; i < data.feed.entry.length; i++) {
            var entry = data.feed.entry[i];
            var a, b;
            if (entry.gsx$name.$t == "Ariana") {
                a = "Ariana";
                b = "";
            } else {
                a = entry.gsx$message.$t;
                b = " chat_other";
            }
            document.getElementById("chat_s").innerHTML +=
                '<div class="chat' +
                b +
                '"><div class="chat_message">' +
                entry.gsx$_cpzh4.$t +
                '</div><div class="chat_name">' +
                a +
                "</div></div>";
        }
    }
);
//Ajoute un commentaire 
function add() {

    var today = new Date();
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var dd = String(today.getDate()).padStart(2, '0');
    today = mm + '/' + dd + '/' + yyyy;
    var commentaire = document.getElementById("entry_comment").value;
    commentaire = commentaire.replace(/</g, "&lt;").replace(/>/g, "&gt;");
   
    
    var nom = (document.getElementById("entry_name").value === "" ? "Anonyme" : document.getElementById("entry_name").value); //Operateur ternaire Condition? action_si_vrai: action_si_faux
    nom = nom.replace(/</g, "&lt;").replace(/>/g, "&gt;");

    document.getElementById("chat_s").innerHTML +=
        '<div class="chat chat_other"><div class="chat_message">' +
        commentaire +
        '</div><div class="chat_name">' + "de " + nom +
        ' posté le ' + today + '</div></div>';

    document.querySelector("#chat input").value = "";
    document.getElementById("chat_s").scrollTop = document.getElementById(
        "chat_s"
    ).scrollHeight;


    var comment = ({
        comment: commentaire,
        nom: nom
    })
    try {
        uri = JSON.stringify(comment);
        let url = "http://localhost/ASL-Abbaye/controler/script-addcomment.php?";
        ajax_post_request(null, url, false, encodeURIComponent(uri));
    } catch (error) {
        alert(error);
    }
}
//Fait un appel AJAX pour recuperer les commentaires 
function recup_all_comment() {
    try {
        let url = "http://localhost/ASL-Abbaye/controler/script-addcomment.php?";
        ajax_post_request(recup_comment, url, false, encodeURIComponent(id_doc));
    } catch (error) {
        alert(error);
    }
}

function add_one_comment(commentaire, nom, date) {
    date = convertDate(date);
    document.getElementById("chat_s").innerHTML +=
        '<div class="chat chat_other"><div class="chat_message">' +
        commentaire +
        '</div><div class="chat_name">' + "de " + nom +
        ' posté le ' + date + '</div></div>';

    document.querySelector("#chat input").value = "";
    document.getElementById("chat_s").scrollTop = document.getElementById(
        "chat_s"
    ).scrollHeight;
}

function display_all_comment(json){
    var all_comment= JSON.parse(json);

    for (let index = 0; index < all_comment.length; index++) {
        var current = all_comment[index];
        add_one_comment(current.commentaire,current.nom,current.date);
    }

}



function convertDate(dateString) {
    var date = new Date(dateString);
    return date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
}









//Verifie un commentaire
function check() {
    var x;
    x = document.getElementById("entry_comment").value;
    if (!x.replace(/\s/g, "").length) {
        alert(
            "Votre commentaire est vide"
        );
        return false;
    }
    //Si le commentaire contient du contenue injurieux
    if (false) {
        alert(
            "L'espace commentaire doit rester un lieu de respect"
        );
        return false;
    }
}


function load_comment() { }
function save_comment() { }
function delete_comment() { }