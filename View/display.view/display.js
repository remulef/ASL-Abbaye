
let history = [];
let parcours = [];

function init() {
    clearul();
    history = [];
    var pos = ({
        id_node: 0,
        name: "BDD",
    })
    history.push(pos);
    updateparcours();
    try {
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-load.php";
        ajax_post_request(load, url, true, encodeURIComponent(0));
    } catch (error) {

    }
}


function load(json) {
    //clearul();

    var data = JSON.parse(json);
    var nbdoc = 0;
    var uldoc = document.getElementById("docbar");
    var uldoss = document.getElementById("dossbar");
    for (let index = 0; index < data.length; index++) {
        var current = data[index];
        if (current.id_node !== undefined) {
            var id = current.id_node;
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.setAttribute("onclick", "changedoc(" + id + ',"' + current.name + '",true,-1)');
            a.setAttribute("class", "button3");
            a.innerHTML = current.name;

            li.appendChild(a);
            uldoss.appendChild(li);

        } else {
            nbdoc++;
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.setAttribute("href", "http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/mitigeur.php?id_doc=" + current.id_doc);
            a.setAttribute("target", "_blank");
            a.innerHTML = "ouvrir";
            //p 
            var p = document.createElement("p");
            p.class = "price";
            p.innerHTML = current.typedoc;
            /*image
        var img = document.createElement("img");
        img.setAttribute("src", "http://placehold.it/200x120");
        */
            var lien = "/" + current.chemin;
            var type = current.typedoc;
            type = type.toLowerCase();
            type = type.trim();


            if (type === "png" || type === "jpeg" || type === "jpg" || type === "gif") {
                var img = document.createElement("img");
                img.setAttribute("src", lien);
                img.setAttribute("width", "200");
                img.setAttribute("height", "120");

            } else if (type === "doc" || type === "docx" || type === "mp3" || type === "mpg" ||
                type === "odp" || type === "odt" || type === "osd" || type === "pdf" ||
                type === "ppt" || type === "pptx" || type === "rtf" || type === "txt" || type === "wma") {
                var img = document.createElement("img");
                var ressource = "../../data/icon/file/" + type + ".svg";
                img.setAttribute("src", ressource);
                img.setAttribute("width", "200");
                img.setAttribute("height", "120");
            }
            else {
                var img = document.createElement("img");
                img.setAttribute("src", "http://placehold.it/200x120");
            }
            //h3
            var titre = document.createElement("p");
            titre.innerHTML = "<strong>" + current.nom + "</strong>";

            li.appendChild(img);
            li.appendChild(titre);
            li.appendChild(p);
            li.appendChild(a);
            uldoc.appendChild(li);
        }
    }
    document.getElementById("h3doc").innerHTML = "Liste des fichiers (<strong>" + nbdoc + "</strong>)";


}

function changedoc(id, title, forward, pos) {
    document.getElementsByTagName("h3")[0].innerHTML = "Liste des thématiques";
    clearul();
    //si on descend
    if (forward) {
        var add = ({
            id_node: id,
            name: title,
        });
        history.push(add);
    }
    //si l'on viens du parcours
    if (pos !== -1) {
        //On efface toutes les noeuds aprés le document id
        /*var pos = ({
            id_node: id,
            name: title,
        });

        var index = history.indexOf(pos);
        */
        console.log(pos);
        history.splice(pos + 1);

    }
    
    if( title === "Ressources pédagogiques"){
        document.getElementById("presentation").setAttribute("style","display: block");
    }else {
        document.getElementById("presentation").setAttribute("style","display: none");
    }

    updateparcours();
    

    try {
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-load.php";
        ajax_post_request(load, url, true, encodeURIComponent(id));
    } catch (error) {
        alert(error);
    }

}

function clearul() {
    document.getElementById("dossbar").innerHTML = "";
    document.getElementById("docbar").innerHTML = "";
}



function getback() {
    if (history.length === 1) {
        init();
    }
    else {
        history.pop();
        let node = history[history.length - 1];
        //let node = history.pop();
        changedoc(node.id_node, node.name, false, -1);
    }

}


function updateparcours() {
    document.getElementById("parcours").innerHTML = "";
    var ul = document.getElementById("parcours");
    for (let index = 0; index < history.length; index++) {
        current = history[index];
        var id = current.id_node;
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.setAttribute("onclick", "changedoc(" + id + ',"' + current.name + '",false,' + index + ')');
        a.setAttribute("class", "button1");
        a.innerHTML = "<strong>" + current.name + "</strong>";
        li.appendChild(a);
        ul.appendChild(li);
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


function search(elem) {
    //il faut faire de l'anti-injection
    var inputs = document.getElementsByTagName("input");

    var param = ({
        nodesearch: (inputs[0].checked === true ? -1 : history[history.length - 1].id_node),
        docname: inputs[1].value,
        ressource: recupressource(),
        typedoc: recuptype(),
        tags: (inputs[14].value.length > 0 ? inputs[14].value.split("+") : []),
        niveau: recupniveau(),
        order: recuporderby(), //Croissant ? 
        tefanf: inputs[23].checked,  // TEF ANF ?
        alpha: inputs[24].checked
    });

    param = JSON.stringify(param);

    console.log(param);
    try {
        /*
        // configuration pour effectuer des tests
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/test.php";
        ajax_post_request(log, url, true, encodeURIComponent(param));
         */
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-search.php";
        ajax_post_request(displaysearch, url, false, encodeURIComponent(param));


    } catch (error) {
        console.log(error);
    }

}

function log(params) {
    console.log(params);
}

function recupressource() {
    var inputs = document.getElementsByTagName("input");
    var type = [];
    if (inputs[2].checked === true) {
        type.push("fp");
    }
    if (inputs[3].checked === true) {
        type.push("j");
    }
    if (inputs[4].checked === true) {
        type.push("da");
    }

    if (inputs[5].checked === true) {
        type.push("vsm");
    }


    if (inputs[5].checked === true) {
        type.push("da");
    }


    if (inputs[6].checked === true) {
        type.push("ea");
    }
    return type;
}

function recuptype() {
    var inputs = document.getElementsByTagName("input");
    var type = [];
    if (inputs[8].checked === true) {
        type.push("pdf");
    }
    if (inputs[9].checked === true) {
        type.push("jpeg");
        type.push("jpg");
        type.push("gif");
        type.push("png");
    }
    if (inputs[10].checked === true) {
        type.push("wma");
        type.push("mp3");
    }

    if (inputs[11].checked === true) {
        type.push("MPG");
    }

    if (inputs[12].checked === true) {
        type.push("docx");
        type.push("odt");
        type.push("doc");
        type.push("txt");
        type.push("docx#");
        type.push("pub");
        type.push("rtf");
        type.push("odp");
        type.push("ods");

    }
    if (inputs[13].checked === true) {
        type.push("pptx");
        type.push("ppt");
    }
    return type;
}

function recupniveau() {
    var inputs = document.getElementsByTagName("input");
    var niv = [];

    if (inputs[15].checked === true) {
        niv.push("D");
        niv.push("E");
        niv.push("A");

    }

    if (inputs[16].checked === true) {
        niv.push("D")
    }

    if (inputs[17].checked === true) {
        niv.push("E")
    }

    if (inputs[18].checked === true) {
        niv.push("A")
    }
    return niv;
}


function displaysearch(json) {
    //Réinitialise la barre des documents et la liste des documents
    if (document.getElementsByTagName("input")[0].checked === true) {
        history = [];
        var pos = ({
            id_node: 0,
            name: "BDD",
        })
        history.push(pos);
    updateparcours();
    document.getElementsByTagName("h3")[0].innerHTML = "";
    document.getElementById("dossbar").innerHTML = "";
    
    }
    //============
    document.getElementById("docbar").innerHTML = "";
    
    var query = document.getElementById("element_1").value;
    query = query.replace(/</g, "&lt;").replace(/>/g, "&gt;");

    var data = JSON.parse(json);
    document.getElementById("h3doc").innerHTML = "<strong>" + data.length + "</strong> resultats " +
        (query.length !== 0 ? "pour " + query : "");


    var uldoc = document.getElementById("docbar");
    for (let index = 0; index < data.length; index++) {
        var current = data[index];
        var li = document.createElement("li");
        //a
        var a = document.createElement("a");
        a.setAttribute("href", "http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/mitigeur.php?id_doc=" + current.id_doc);
        a.setAttribute("target", "_blank");
        a.innerHTML = "ouvrir";



        //add 24 June

        //p 
        var p = document.createElement("p");
        p.class = "price";
        p.innerHTML = current.typedoc;
        /*image
        var img = document.createElement("img");
        img.setAttribute("src", "http://placehold.it/200x120");
        */
        var lien = "/" + current.chemin;
        var type = current.typedoc;
        type = type.toLowerCase();
        type = type.trim();


        if (type === "png" || type === "jpeg" || type === "jpg" || type === "gif") {
            var img = document.createElement("img");
            img.setAttribute("src", lien);
            img.setAttribute("width", "200");
            img.setAttribute("height", "120");

        } else if (type === "doc" || type === "docx" || type === "mp3" || type === "mpg" ||
            type === "odp" || type === "odt" || type === "osd" || type === "pdf" ||
            type === "ppt" || type === "pptx" || type === "rtf" || type === "txt" || type === "wma") {
            var img = document.createElement("img");
            var ressource = "../../data/icon/file/" + type + ".svg";
            img.setAttribute("src", ressource);
            img.setAttribute("width", "200");
            img.setAttribute("height", "120");
        }
        else {
            var img = document.createElement("img");
            img.setAttribute("src", "http://placehold.it/200x120");
        }

        //h3
        var titre = document.createElement("p");
        titre.innerHTML = "<strong>" + current.nom + "</strong>";

        li.appendChild(img);
        li.appendChild(titre);
        li.appendChild(p);
        li.appendChild(a);

        uldoc.appendChild(li);

    }

}

function recuporderby() {

    var inputs = document.getElementsByTagName("input");

    if (inputs[19].checked === true) {
        return "nom ASC";
    }
    if (inputs[20].checked === true) {
        return "nom DESC";
    }

    if (inputs[21].checked === true) {
        return "pop ASC";
    }
    if (inputs[22].checked === true) {
        return "pop DESC";
    }
}

function hide() {
    var sortpanel = document.getElementById("sortpanel");
    var hider = document.getElementById("hider");
    if (sortpanel.getAttribute("style") == "display: block;") {
        sortpanel.setAttribute("style", "display: none;");
        hider.innerHTML = "afficher le panel <br> de tri/recherche <br> <svg class=\"bi bi-arrow-bar-right\" width=\"1.33em\" height=\"1.33em\" viewBox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">"
            + "<path fill-rule=\"evenodd\" d=\"M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z\"/>" +
            "<path fill-rule=\"evenodd\" d=\"M6 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H6.5A.5.5 0 0 1 6 8zm-2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z\"/></svg>"
    } else {
        sortpanel.setAttribute("style", "display: block;");
        hider.innerHTML =
            "cacher le panel <br> de tri/recherche <br> <svg class=\"bi bi-arrow-bar-left\" width=\"1.33em\" height=\"1.33em\" viewBox=\"0 0 16 16\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">" +
            "<path fill-rule=\"evenodd\" d=\"M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z\" />" +
            "<path fill-rule=\"evenodd\" d=\"M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z\" /></svg>";

    };
}

function careful() {
    if (document.getElementsByTagName("input")[0].checked === false) {
        var last = history[history.length - 1].name;
        alert("Attention vous allez faire une recherche dans le dossier "+last);
    } else {
        alert("Votre recherche va s'effectuer dans la totalité de la base de données");
    }

    search();
}