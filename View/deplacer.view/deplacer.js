let id_doc = 18; //$_GET("id");
let nom = "nom du document";//$_GET("nom");


let history = [];
let parcours = [];


function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

function init() {
    document.getElementById("id_doc").value=id_doc;
    document.getElementById("nom").value=nom;
    document.getElementById("destination").value = "BDD";
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



function changedoc(id, title, forward, pos) {
    document.getElementById("dossbar").innerHTML = "";
    if (forward) {
        var add = ({
            id_node: id,
            name: title,
        });
        history.push(add);
    }
    if (pos !== -1) {
        console.log(pos);
        history.splice(pos + 1);

    }
    document.getElementById("destination").value = title;
    document.getElementById("id_node_dest").value = id;

    updateparcours();
    

    try {
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-load.php";
        ajax_post_request(load, url, true, encodeURIComponent(id));
    } catch (error) {
        alert(error);
    }

}

function load(json) {
    

    var data = JSON.parse(json);
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

        }
    }
}
