
let history = [];

function init() {
    clearul();
    history = [];
    var pos = ({
        id_node: 0,
        name: "Ressource Pedagogique",
    })
    history.push(pos);

    try {
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-load.php";
        ajax_post_request(load, url, true, null);
    } catch (error) {

    }
}


function load(json) {
    //clearul();

    var data = JSON.parse(json);
    var uldoc = document.getElementById("docbar");
    var uldoss = document.getElementById("dossbar");
    for (let index = 0; index < data.length; index++) {
        var current = data[index];
        if (current.id_node !== undefined) {
            var id = current.id_node;
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.setAttribute("onclick", "changedoc(" + id + ',"' + current.name + '",true,false)');
            a.setAttribute("class", "button1");
            a.innerHTML = current.name;
            li.appendChild(a);
            uldoss.appendChild(li);

        } else {
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.setAttribute("href", "http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=" + current.id_doc);
            a.innerHTML = current.nom;
            li.appendChild(a);
            uldoc.appendChild(li);
        }
    }

}

function changedoc(id, title, forward,fromparcours) {
    updateparcours();
    clearul();
    changetitle(title);

    //si on descend
    if (forward) {
        var pos = ({
            id_node: id,
            name: title,
        });
        history.push(pos);
    }
    //si l'on du parcours
    if (fromparcours) {
        cleanhistory(id);
    }

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

function getback() {
    if (history.length === 1) {
        init();
    }
    else {
        history.pop();
        let node = history[history.length - 1];
        changedoc(node.id_node, node.name, false);
    }

}

function changetitle(title) {
    document.getElementById("pos").innerHTML = "Contenue de la thématique : <strong>" + title + "</strong>";
}

function updateparcours() {
    document.getElementById("parcours").innerHTML = "";
    var ul = document.getElementById("parcours");
    for (let index = 0; index < history.length; index++) {
        current = history[index];
        var id = current.id_node;
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.setAttribute("onclick", "changedoc(" + id + ',"' + current.name + '",true,true)');
        a.setAttribute("class", "button1");
        a.innerHTML = "/" + current.name;
        li.appendChild(a);
        ul.appendChild(li);
    }
}

function cleanhistory(id) {
    console.log(id);
    var index = history.indexOf(id);
    history.splice(index);


}