//TODO

// Limiter le nombre de tags 
//Ajouter des antiechappement aux tags 
//Limiter le nombre de caractere dans un tag 

//Un appel ajax pour ajouter a la db 
//Une fonction pour pouvoir les supprimers 
//un mode
function addtag() {
    var ul = document.getElementById("tags");

    if (ul.getElementsByTagName("li").length < 20) {
        var value = document.getElementById("inputtag").value;
        if (value.length < 30) {
            var tag = document.createElement("li");
            var a = document.createElement("a");
            a.className = "tag";
            a.innerHTML = value;
            tag.append(a);
            document.getElementById("tags").append(tag);
        } else alert("Les tags sont limités à 30 caracteres");
    } else alert("Le nombre de tags est limité à 20");
}