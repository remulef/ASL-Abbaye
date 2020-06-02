
let id_doc;
let lien;
let commentaire_to_delete = [];
let old_title;
let old_description;
function init(id_doc) {
    //document.getElementById("myInput").style.display = "none";
    let url = "http://www.les-asl-abbaye.ovh/Controler/script-document.php";

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
    //console.log(json);

    let doc = JSON.parse(json);
    id_doc = doc.id;
    let title = doc.nom;
    let description = doc.descrip;
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

    console.log(date==null);
    document.getElementById("telecharger").setAttribute("href", "http://www.les-asl-abbaye.ovh" + lien);
    document.getElementById("titreh1").innerHTML = title;
    document.getElementById("titre").innerHTML += "<h4>"+(date==null?"":date)+"</h4>";

    document.getElementById("description").getElementsByTagName("p")[0].innerHTML += description;
    recup_all_comment();





}

function supprimer() {

    if (confirm("Voulez vous vraiment supprimer ce document ")) {

        console.log(id_doc);
        id_doc = 1816;
        let url = "http://www.les-asl-abbaye.ovh/Controler/script-delete-sql.php?";

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
    add_button_delete_all();
    addicondelete();
    //ajouter des infos bull avec des span https://www.alsacreations.com/astuce/lire/1-comment-personnaliser-une-infobulle.html
    var button_modifier = document.getElementById("modifier");
    var div_description = document.getElementById("description");
    var description = div_description.getElementsByTagName("p")[0].innerHTML;
    const regex = /<br>/gi;
    description = description.replace(regex,'\n');
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
    old_title = titre;
    old_description = description;

}


function valider() {
    removecondelete();
    remove_button_delete_all();
    delete_selected_comment();
    var button_modifier = document.getElementById("modifier");
    var div_description = document.getElementById("description");
    var div_titre = document.getElementById("titre");

    var title = document.getElementsByTagName("textarea")[0].value;
    var description = document.getElementsByTagName("textarea")[1].value;
    const regex = /\n/gi;
    description = description.replace(regex,'<br>');  //On enleve le "\n" dans les titres


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
    // si on ne modifie pas le titre ou la description, inutile de faire l'appel ajax d'update
    if (title != old_title || description != old_description) {
        var newdoc = ({
            id_doc: id_doc,
            title: title,
            descr: description
        })

        console.log(newdoc);

        try {
            uri = JSON.stringify(newdoc);
            let url = "http://www.les-asl-abbaye.ovh/Controler/script-modify.php?";
            ajax_post_request(null, url, false, encodeURIComponent(uri));
        } catch (error) {
            alert(error);
        }
    }

    commentaire_to_delete = [];




}





function myFunction() {
    /*
    var lien = document.getElementById("telecharger");
    lien.innerHTML=lien.getAttribute("href");
    */

    var copy = document.createElement("a");
    copy.innerHTML = "http://www.les-asl-abbaye.ovh" + lien;
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
        tooltip.innerHTML = "Copied: " + "http://www.les-asl-abbaye.ovh" + lien;;

    } catch (error) {
        console.log('Oops, unable to copy');

    }
    window.getSelection().removeAllRanges();





}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copy to clipboard";
}




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
    /*
    document.getElementById("chat_s").innerHTML +=
        '<div class="chat chat_other"><div class="chat_message">' +
        commentaire +
        '</div><div class="chat_name">' + "de " + nom +
        ' posté le ' + today + '</div></div>';

    document.querySelector("#chat input").value = "";
    document.getElementById("chat_s").scrollTop = document.getElementById(
        "chat_s"
    ).scrollHeight;
*/

    var comment = ({
        id_doc: id_doc,
        comment: commentaire,
        nom: nom
    })
    try {
        uri = JSON.stringify(comment);
        let url = "http://www.les-asl-abbaye.ovh/Controler/script-add-comment.php?";
        ajax_post_request(recup_all_comment, url, false, encodeURIComponent(uri));
    } catch (error) {
        alert(error);
    }
}
//Fait un appel AJAX pour recuperer les commentaires
function recup_all_comment() {
    try {
        let url = "http://www.les-asl-abbaye.ovh/Controler/script-recup-comment.php?";
        ajax_post_request(display_all_comment, url, false, encodeURIComponent(id_doc));
    } catch (error) {
        alert(error);
    }
}

function add_one_comment(commentaire, nom, date, id) {

    var today = new Date(date);
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var dd = String(today.getDate()).padStart(2, '0');
    today = yyyy + '/' + mm + '/' + dd;


    commentaire = commentaire.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    nom = nom.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    date = convertDate(date);
    document.getElementById("chat_s").innerHTML +=
        '<div class="chat chat_other" id="' + id + '"><div class="chat_message">' +
        commentaire +
        '</div><div class="chat_name">' + "de " + nom +
        ' posté le ' + today + '</div></div>';

    document.querySelector("#chat input").value = "";
    document.getElementById("chat_s").scrollTop = document.getElementById(
        "chat_s"
    ).scrollHeight;
}

function display_all_comment(json) {
    clear_comment();
    var all_comment = JSON.parse(json);

    for (let index = 0; index < all_comment.length; index++) {
        var current = all_comment[index];
        add_one_comment(current.commentaire, current.auteur, current.datepub, current.id_comment);
    }

}



function convertDate(dateString) {
    var date = new Date(dateString);
    return date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear();
}









//Verifie un commentaire
function check() {
    var x;
    x = document.getElementById("entry_comment").value;
    var nom = document.getElementById("entry_name").value;
    if (!x.replace(/\s/g, "").length) {
        alert(
            "Votre commentaire est vide"
        );
        return false;
    }
    //Si le commentaire contient du contenue injurieux
    if (x.length > 600) {
        alert(
            "Les commentaires sont limités à 600 caracteres "
        );
        return false;
    }

    if (nom.length > 40) {
        alert(
            "Le pseudonyme est limités à 50 caracteres"
        );
        return false;
    }
}

function clear_comment() {
    var chat = document.getElementById("chat_s");
    while (chat.firstChild) {
        chat.removeChild(chat.firstChild);
    }
}


function addicondelete() {
    //on ajoute un petit bouton poubelle
    var i = 0;
    while (i < document.getElementsByClassName("chat_name").length) {
        current = document.getElementsByClassName("chat_name")[i];
        current.innerHTML +=
            '<div class="tooltip"><button type="button" class="supprimer_comm" onclick="selectcomment(' + i + ')">' +
            '<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">' +
            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />' +
            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />' +
            '</svg></button><span class="tooltiptext">Supprimer le commentaire</span></div>';
        i++;
    }

}


function removecondelete() {

    var i = 0;
    while (i < document.getElementsByClassName("chat_name").length) {
        current = document.getElementsByClassName("chat_name")[i];
        current.removeChild(current.getElementsByClassName("tooltip")[0]);
        current.parentElement.style.backgroundColor = "white";

        i++;
    }

}

function selectcomment(id_com) {
    var x = document.getElementsByClassName("chat_name")[id_com];
    var parent = x.parentElement;
    var id = parent.id;

    var button = x.getElementsByTagName("button")[0];
    button.setAttribute("onclick", "diselect(" + id_com + ")");
    document.getElementById(id).style.backgroundColor = "tomato";
    commentaire_to_delete.push(id);


}

function delete_selected_comment() {
    if (commentaire_to_delete.length > 0) {
        try {

            var json = ({
                id_doc: id_doc,
                id_com: commentaire_to_delete
            })
            json = JSON.stringify(json);


            console.log(json);
            let url = "http://www.les-asl-abbaye.ovh/Controler/script-delete-comment.php?";
            ajax_post_request(recup_all_comment, url, false, encodeURIComponent(json));
        } catch (error) {
            alert(error);
        }
    }



}


function delete_all() {
    var i = 0;
    while (i < document.getElementsByClassName("chat_name").length) {
        current = document.getElementsByClassName("chat_name")[i];
        commentaire_to_delete.push(current.parentElement.id);

        i++;
    }

    try {

        var json = ({
            id_doc: id_doc,
            id_com: commentaire_to_delete
        })
        json = JSON.stringify(json);


        console.log(json);
        let url = "http://www.les-asl-abbaye.ovh/Controler/script-delete-comment.php?";
        ajax_post_request(recup_all_comment, url, false, encodeURIComponent(json));
    } catch (error) {
        alert(error);
    }
    commentaire_to_delete = [];



}

function add_button_delete_all() {
    var header = document.getElementsByClassName("chat_header")[0];
    header.innerHTML += '<div id="deleteall" class="tooltip"><button type="button" class="supprimer_all_comm" onclick="delete_all()">' +
        'supprimer tous les commentaires' +
        '</svg></button><span class="tooltiptext">Supprimer le commentaire</span></div>';
}

function remove_button_delete_all() {
    var elm = document.getElementById("deleteall");
    elm.parentNode.removeChild(elm);


}

function diselect(i) {
    //il faut aussi enlever de la liste
    current = document.getElementsByClassName("chat_name")[i];
    current.parentElement.style.backgroundColor = "white";


    var button = current.getElementsByTagName("button")[0];
    button.setAttribute("onclick", "selectcomment(" + i + ")");

    var x = document.getElementsByClassName("chat_name")[i];
    var parent = x.parentElement;
    var id = parent.id;

    commentaire_to_delete=arrayRemove(commentaire_to_delete,id);

}

function arrayRemove(arr, value)
 {
    recopie = [];
    var i = 0;
     while( i < arr.length){
         if(arr[i]!=value){
            recopie.push(arr[i]);
         }
         i++;
     }
     return recopie;
}
