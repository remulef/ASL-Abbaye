function init(){

    try {
        let url = "http://www.les-asl-abbaye.ovh/ASL-Abbaye/Controler/Display/script-load.php";
        ajax_post_request(load,url,true,null);
    } catch (error) {
        
    }
}


function load(json) {
    var data = JSON.parse(json);
    var ul = document.getElementById("docbar");
    for (let index = 0; index < data.length; index++) {
        var current = data[index];
        if(current.id_node!==undefined){
            var id= current.id_node;
            var li = document.createElement("li");
            var a = document.createElement("a");
            a.setAttribute("onclick","changedoc("+id+')');
            a.setAttribute("href","");
            a.innerHTML=current.name;
            li.appendChild(a);
            ul.appendChild(li);
        }
    }

}


function ajax_post_request(callback, url, async, data) {
    // Instanciation d'un objet XHR
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
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
