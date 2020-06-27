var dbrow = document.getElementById("tableau").rows.length;

// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();

function ajouterLigne()
{
	var tableau = document.getElementById("tableau");

	var ligne = tableau.insertRow(-1);//on a ajouté une ligne

  //Ajouter boutons sur la ligne
  //Bouton Supprimer :
  td = ligne.insertCell(0);
  var btnS = document.createElement('input');
  btnS.setAttribute('type', 'button');
  btnS.setAttribute('onclick','removeRow(this)');
  btnS.setAttribute('value','Suppr');
  td.appendChild(btnS);
  //Bouton Modifier :
  var btnM = document.createElement('input');
  btnM.setAttribute('type', 'button');
  //btnsM.setAttribute('onclick','removeRow(this)');
  btnM.setAttribute('value','Modif');
  td.appendChild(btnM);

  //Ajouter id / mdp sur la ligne
  for (var c = 1; c < 3; c++) {
    td = ligne.insertCell(c);
    var ele = document.createElement('input');
    ele.setAttribute('type', 'text');
    ele.setAttribute('value', '');
    ele.setAttribute('required', '');

    td.appendChild(ele);
  }

  //Ajouter rôle sur la ligne
  td = ligne.insertCell(c++);
  var ele = document.createElement('select');
  ele.setAttribute('class', 'sel');
  var op1 = document.createElement('option');
  var op2 = document.createElement('option');
  var op3 = document.createElement('option');
  op1.text = "Appreneur";
  op2.text = "SuperAppreneur";
  op3.text = "Admin";
  ele.options.add(op1);
  ele.options.add(op2);
  ele.options.add(op3);
  td.appendChild(ele);
}

// function to delete a row.
function removeRow(oButton) {
	var txt;
	var r = confirm("Cet utilisateur va être supprimé");
	if (r == true) {
		row = oButton.parentNode.parentNode.rowIndex;
		tableau.deleteRow(row); // button -> td -> tr
		var username = oButton.parentNode.parentNode.cells[1].childNodes[0].innerHTML;
		console.log(username);
		ajax(username,"../../Controler/admin/script-delete-userdb.php");
		dbrow--;
	}else{

	}
}

function modifyRow(oButton) {
  var password = oButton.parentNode.parentNode.cells[2];
	console.log(password);
  var role = oButton.parentNode.parentNode.cells[3];
  var validate = oButton.parentNode.parentNode.cells[4].childNodes[0].nextSibling;
	console.log(validate);
  validate.setAttribute('style', 'inline');
  password.childNodes[0].setAttribute('style', 'inline');
  password.childNodes[2].setAttribute('style', 'display:none');
  var valeur = role.childNodes[3].innerHTML;
  for (var i = 0; i < 3; i++) {
    if (valeur == role.childNodes[1][i].value) {
      role.childNodes[1][i].setAttribute('selected', '');
    }
  }
  console.log(role.childNodes[1][0]);
  console.log(role.childNodes[1][0].value); // I GOT IT
  role.childNodes[1].setAttribute('style', 'inline');
  role.childNodes[3].setAttribute('style', 'display:none');
}

function ValidateModify(oButton) {
  var myTab = document.getElementById('tableau');
  var arrValues = new Array();
  var complet = true;
  var row = oButton.parentNode.parentNode.rowIndex;
  for (c = 1; c < myTab.rows[row].cells.length-1; c++) {
      var element = myTab.rows.item(row).cells[c];
      if (c==2 && element.childNodes[0].getAttribute('type') == 'text') {
          var champ = element.childNodes[0].value.trim(); //on enlève les espaces au cas-où
          if (champ.length != 0) {
            arrValues.push("'" + champ + "'");
          }else{
            console.log("Je ne peux pas renvoyer ça");
            arrValues.push("'" + champ + "'");
            complet = false;
          }
      }else if (c==3 && element.childNodes[1].getElementsByClassName('sel') != null) {
        arrValues.push("'" + element.childNodes[1].value + "'");
      }else if (c==1 && element.childNodes[0].getAttribute('type') == 'text') {
          var champ = element.childNodes[0].innerHTML;
					console.log(champ);
          if (champ.length != 0) {
            arrValues.push("'" + champ + "'");
          }else{
            console.log("Je ne peux pas renvoyer ça");
            arrValues.push("'" + champ + "'");
            complet = false;
          }
				}
  }
  if (complet != true) {
    arrValues.splice(0,arrValues.length);
    alert("Le champ du mot de passe n'est pas rempli.");
  }else{
    ajax(arrValues,"../../Controler/admin/script-modify-userdb.php");
    alert("Modification réussie !");
  }

  // finally, show the result in the console.
  console.log(arrValues);
  if (typeof arrValues !== 'undefined' && arrValues.length > 0) {
  console.log("tableau pas vide");
  }else{
  console.log("tableau vide");
  }
}

// function to extract and submit table data.
function submit() {
    var myTab = document.getElementById('tableau');
    var arrValues = new Array();
    var complet = true;
    // loop through each row of the table.
    console.log("testo");
    for (row = dbrow; row < myTab.rows.length; row++) {
        // loop through each cell in a row.
        console.log(myTab.rows.length);
        for (c = 1; c < myTab.rows[row].cells.length; c++) {
            var element = myTab.rows.item(row).cells[c];
            console.log("test");
            if (element.childNodes[0].getAttribute('type') == 'text') {
                var champ = element.childNodes[0].value.trim(); //on enlève les espaces au cas-où
                if (champ.length != 0) {
                  arrValues.push("'" + champ + "'");
                }else{
                  console.log("Je ne peux pas renvoyer ça");
                  arrValues.push("'" + champ + "'");
                  complet = false;
                }
                console.log("typetext");
            }else if (element.childNodes[0].getElementsByClassName('sel') != null) {
              arrValues.push("'" + element.childNodes[0].value + "'");
            }
        }
        if (complet != true) {
          arrValues.splice(arrValues.length - 3,3);
          console.log("splice fait");
          myTab.deleteRow(row);
        }else{
          dbrow++;
        }
    }

    // finally, show the result in the console.
    console.log(arrValues);
    if (typeof arrValues !== 'undefined' && arrValues.length > 0) {
      console.log("tableau pas vide");
    }else{
      console.log("tableau vide");
    }
    console.log(dbrow);
    console.log(myTab.rows.length);
    ajax(arrValues,"../../Controler/admin/script-add-userdb.php");
}

function ajax(values,url){
  $.ajax({
     type: "POST",
     data: {result:JSON.stringify(values)},
     url: url,
     success: function(msg){
       $('.answer').html(msg);
     }
  });
}
