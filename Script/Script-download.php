<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <div id="lien">

  </div>
  <div id="cr">
    <?php


    // function download(string $url){
    //   // Use basename() function to return the base name of file
    //   $file_name = basename($url);
    //   // Use file_get_contents() function to get the file
    //   // from url and use file_put_contents() function to
    //   // save the file by using base name
    //   if(file_put_contents( $file_name,file_get_contents($url))) {
    //   	echo "File ".$file_name." downloaded successfully <br>";
    //   }
    //   else {
    //   	echo " /!\ File ".$file_name." ERROR download /!\ <br>";
    //   }
    // }

    function scriptcontent(string $fichier)
    {
      $content = simplexml_load_file($fichier);
      $list = array();
      $count = 1;





      foreach ($content->posts as $posts) {
        foreach ($posts->post as  $post) {
          echo '<div class="COMPTE RENDU"> <br>';
          echo '<p class="titleCR">' . $post->title . '</p><br>';
          echo '<p class="dateCR">' . $post->published_at . '</p><br>';
          //echo '<div class="contenue">';
          echo $count;
          echo  $post->content;
          //

          switch ($count+1) { //Ces elements ne sont pas bien construit et pose des problemes car il manque la fermerture de balise ce qui fausse la collect de compte rendu 
            case 195:
              echo " \"></div></div></div></div>";
              
              break;

            case 217:
              echo " \"></div></div></div></div>";
              break;

            case 276:
              echo " \"></div></div></div></div>";
              break;

            case 294:
              echo " \"></div></div></div></div>";
              break;
          }


          echo "<hr>";
          //echo  '<!--'.$post->content.' -->';
          echo "</div>";
          //if($post->title=="")


        
          $count++;
        }
      }
    }

    scriptcontent("export.xml");




    ?>


  </div>


  <script>
    let list_cr = document.getElementsByClassName("COMPTE RENDU");
    let Compterendu = [];
    let i = 0;
    let total = 0;
    let countdoc = 0;
    let countrepet = 0;
    var repet = [];
    console.log(list_cr.length);
    while (i < list_cr.length) {

      var current = list_cr[i];
      var idCR = i + 1;
      var titleCR = current.getElementsByClassName("titleCR")[0].innerHTML;
      var dateCR = current.getElementsByClassName("dateCR")[0].innerHTML.substr(0, 10); //On garde le format AAAA-MM-JJ
      var contentCR = current.getElementsByClassName("ob-sections")[0];
      var list_a = contentCR.getElementsByTagName("a");
      var docCR = [];

      var j = 0
      while (j < list_a.length) {

        //var title = list_a[j].innerHTML;
        //const regex = /\n/gi;
        //title = title.replace(regex,'');  //On enleve le "\n" dans les titres 
        var href = list_a[j].getAttribute("href");
        if (href.includes("mp3") || href.includes("pdf") || href.includes("docx") || href.includes("jpg") || href.includes("pptx") || href.includes("mp3") || href.includes("jpeg") ||
          href.includes("odt") || href.includes("png") || href.includes("gif") || href.includes("mp4") || href.includes("mkv") || href.includes("jpe") || href.includes("avi") || href.includes("aac") ||
          href.includes("txt") || href.includes("zip") || href.includes("7zip") || href.includes("tgz") || href.includes("wav")) //On recupere uniquement les fichiers ces formats 
        {

          if (href.indexOf("over-blog") !== -1) {
            //var filename = fullPath.replace(/^.*[\\\/]/, '')



            //console.log(downloading);
            var extensiondoc = href.slice((href.lastIndexOf(".") - 1 >>> 0) + 2); // On recupere l'extension de l'URL 

            var test_jpg = extensiondoc.indexOf("jpg");
            var test_png = extensiondoc.indexOf("png");
            var test_jpeg = extensiondoc.indexOf("jpeg");

            var pos = href.lastIndexOf(".");
            if (test_jpg !== -1) { //Si l'extension est de type jpg alors on fixe l'extension à JPG pour eviter les  serveur.fichier.jpg#width=456&height=456 qui pose probleme lors du telechargement PHP
              href = href.substr(0, pos < 0 ? file.length : pos) + ".jpg";
              extensiondoc = "jpg";
            }
            if (test_png !== -1) {
              href = href.substr(0, pos < 0 ? file.length : pos) + ".png";
              extensiondoc = "png";
            }
            if (test_jpeg !== -1) {
              href = href.substr(0, pos < 0 ? file.length : pos) + ".jpeg";
              extensiondoc = "jpeg";
            }

            var chemin = href.substring(href.lastIndexOf('/') + 1);

            var downloading = ({ //On crée une structure pour chaque document rattaché 
              filename: chemin,
              url: href,
              extension: extensiondoc
            })



            docCR.push(downloading); // On ajoute les structures à la liste des documents du compte rendu courant 



            countdoc++;
          }

        }


        j++;
      }

      let k = 0;
      //Remplace le document du serveur blog-spot par les documents de notre serveur 
      while (k < contentCR.getElementsByTagName("a").length) {
        var l = 0;
        while (l < docCR.length) {
          //Nettoie les liens du type "www.blog-spot.image.jpeg#widht=496
          var comp = contentCR.getElementsByTagName("a")[k].getAttribute("href");
          var test_jpg = comp.indexOf("jpg");
          var test_png = comp.indexOf("png");
          var test_jpeg = comp.indexOf("jpeg");

          var pos = comp.lastIndexOf(".");
          if (test_jpg !== -1) {
            comp = comp.substr(0, pos < 0 ? file.length : pos) + ".jpg";
          }
          if (test_png !== -1) {
            comp = comp.substr(0, pos < 0 ? file.length : pos) + ".png";
          }
          if (test_jpeg !== -1) {
            comp = comp.substr(0, pos < 0 ? file.length : pos) + ".jpeg";
          }
          if (docCR[l].url === comp) {


            contentCR.getElementsByTagName("a")[k].setAttribute("href", "/DocumentCompteRendu/" + docCR[l].filename);
            //contentCR.getElementsByTagName("a")[k].setAttribute("href","XXXXXXXXXXXXXXXXXX");
          }
          var test = ({
            comp: comp,
            url: docCR[l].url,
            res: docCR[l].url === comp
          })

          //console.log(test);

          l++;
        }
        k++;
      }

      clear_content = contentCR.innerHTML;
      const regex1 = /\n/gi;
      const regex2 = /\t/gi;
      const regex3 = /\"/gi;
      clear_content = clear_content.replace(regex1, ''); //On enleve le "\n" dans les titres 
      clear_content = clear_content.replace(regex2, ''); //On enleve le "\n" dans les titres 
      clear_content = clear_content.replace(regex3, '"'); //On enleve le "\n" dans les titres 
      // docCR =  JSON.stringify(docCR);

      //clear_content.getElementsByClassName("a");




      var Crendu = ({ // On crée une structure du Compte rendu Courant 
        id: idCR + 1,
        titre: titleCR,
        date: dateCR,
        content: clear_content,
        doc: docCR
      })

      if (current.getElementsByClassName("titleCR").length > 1) {
        console.log(Crendu);

        //sauf le 635
        //var liens = document.getElementById("lien");
        //var p = document.createElement("p");
        //p.innerHTML=Crendu;
        //liens.appendChild(p);

      }


      uri = JSON.stringify(Crendu);
      let url = "http://localhost/ASL-Abbaye/Script/Telechargement/Script-AJAX.php";
      //ajax_post_request(null, url, false, encodeURIComponent(uri));


      Compterendu.push(Crendu); //On ajoute la structure à la liste des comptes rendu 
      i++;

    }



    //var liens = document.getElementById("lien");
    //var save = JSON.stringify(Compterendu);
    //var p = document.createElement("p");
    //p.innerHTML=save;
    //liens.appendChild(p);
    //console.log(uri);


    //let cr = document.getElementById("cr");
    //var child;
    //while(  child = cr.firstChild ){
    // cr.removeChild(child);
    //}
    function onlyUnique(value, index, self) {
      return self.indexOf(value) === index;
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
  </script>









</body>

</html>