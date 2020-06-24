
let history = [];
let parcours = [];

function init() {
    clearul();
    history = [];
    var pos = ({
        id_node: 0,
        name: "Ressource Pedagogique",
    })
    history.push(pos);
    updateparcours();
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
            a.setAttribute("onclick", "changedoc(" + id + ',"' + current.name + '",true,-1)');
            a.setAttribute("class", "button3");
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

function changedoc(id, title, forward, pos) {

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
        a.innerHTML = "/" + current.name;
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
        docname: inputs[0].value,
        ressource: recupressource(),
        typedoc: recuptype(),
        tags: (inputs[13].value.split("+").length>0?inputs[13].value.split("+"):""),
        niveau: recupniveau(),
        order: recuporderby(), //Croissant ? 
        tefanf: inputs[20].checked  // TEF ANF ?
    });

    param = JSON.stringify(param);

    console.log(param);
    try {
        //let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-search.php";
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/test.php";
        //ajax_post_request(displaysearch, url, true, encodeURIComponent(param));
        ajax_post_request(log, url, true, encodeURIComponent(param));

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
    if (inputs[1].checked === true) {
        type.push("fp");
    }
    if (inputs[2].checked === true) {
        type.push("j");
    }
    if (inputs[3].checked === true) {
        type.push("da");
    }

    if (inputs[4].checked === true) {
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
    if (inputs[7].checked === true) {
        type.push("pdf");
    }
    if (inputs[8].checked === true) {
        type.push("jpeg");
        type.push("jpg");
        type.push("gif");
        type.push("png");
    }
    if (inputs[9].checked === true) {
        type.push("wma");
        type.push("mp3");
    }

    if (inputs[10].checked === true) {
        type.push("MPG");
    }

    if (inputs[11].checked === true) {
        type.push("docx");
        type.push("odt");
        type.push("doc");
        type.push("txt");
        type.push("docx#");
        type.push("pub");
        type.push("rtf");
        type.push("opd");
        type.push("ods");
        type.push("opd");
    }
    if (inputs[12].checked === true) {
        type.push("pptx");
        type.push("ppt");
    }
    return type;
}

function recupniveau() {
    var inputs = document.getElementsByTagName("input");
    var niv = [];

    if (inputs[14].checked === true) {
        niv.push("ALPHA")
    }

    if (inputs[15].checked === true) {
        niv.push("D")
    }

    if (inputs[16].checked === true) {
        niv.push("E")
    }

    if (inputs[17].checked === true) {
        niv.push("A")
    }
    return niv;
}


function displaysearch(json) {
    document.getElementById("docbar").innerHTML = "";
    var query = document.getElementById("element_1").value;
    query = query.replace(/</g, "&lt;").replace(/>/g, "&gt;");

    var data = JSON.parse(json);
    document.getElementById("h3doc").innerHTML = "<strong>" + data.length + "</strong> resultats pour " + query;


    var uldoc = document.getElementById("docbar");
    for (let index = 0; index < data.length; index++) {
        var current = data[index];
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.setAttribute("href", "http://www.les-asl-abbaye.ovh/ASL-Abbaye/View/document.view/document.view.php?id_doc=" + current.id_doc);
        a.innerHTML = current.nom;
        li.appendChild(a);
        uldoc.appendChild(li);

    }

}

function recuporderby() {

    var inputs = document.getElementsByTagName("input");

    if (inputs[18].checked === true) {
        return "nom ASC";
    } 
     if (inputs[19].checked === true) {
        return "nom DESC";
    }
     if (inputs[20].checked === true) {
        return "dl ASC";
    } else {
        return "dl DESC";
    }
}
