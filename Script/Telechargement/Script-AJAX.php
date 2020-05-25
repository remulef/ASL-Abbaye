<?php

$str = $_POST['data'];
$fich = fopen('recup-AHAX.html', 'a');





$cr = json_decode($str);

/* Recopie le var_dump dans un fichier 
ob_start();
var_dump($cr->doc);
$data = ob_get_clean();
$fp = fopen("textfile.txt", "w");
fwrite($fp, $data);
fclose($fp);
*/

$crsql = fopen("../resultat-scriptxml/insert_COMPTERENDU.sql", "a");
$docsql = fopen("../resultat-scriptxml/insert_DOCUMENT(COMPTERENDU).sql", "a");



$titre = $cr->titre;
$date = $cr->date;

//TODO Modifier l'attribut href des documents 
$contenue = $cr->content;
$id = $cr->id;




    $contenue = addslashes($contenue);
    $QUERY_insert_CR = 'INSERT into COMPTERENDU (id_cr,titre,content, datepub, auteur) values('.$id.',\''.addslashes($titre).'\',\''.$contenue.'\',\''.$date.'\',\'export\');';
    fwrite($crsql,$QUERY_insert_CR.PHP_EOL);
    fclose($crsql);
    
    
    $check = array();
    //$dejafait = array();
    $doc = $cr->doc;
    //$doc = array_unique($doc);
    
    foreach ($doc as $key => $value) {
        $filename = $value->filename;
        $url = $value->url;
        $extension = $value->extension;

        if(!in_array($filename,$check)){  //Si on a pas encore traiter filename alors on le traite et ajoute a la liste des traités 
            download($url,$filename,$id,$extension);
            array_push($check,$filename);
        }
        
    
    }
    

        
    



fclose($docsql);




function download(string $url, string $file_name,int $id,string $extension){
    $fp = fopen("log.txt", "a");

    // Use file_get_contents() function to get the file
    // from url and use file_put_contents() function to
    // save the file by using base name
    
    if(file_exists($file_name)){
        $res = "File ".$file_name." existe déja "; //log
        fwrite($fp, $res.PHP_EOL);
        $docsql2 = fopen("../resultat-scriptxml/insert_DOCUMENT(COMPTERENDU)2.sql", "a");
        $QUERY_max_id = 'SELECT (id_doc) INTO @iddoc FROM DOCUMENT WHERE nom =\''.$file_name.'\';';
        fwrite($docsql2,$QUERY_max_id.PHP_EOL);
        $QUERY_insert_COMPTERENDU_DOCUMENT = 'insert into COMPTERENDU_DOCUMENT (COMPTERENDU_id_cr, DOCUMENT_id_doc) values ('.$id.',@iddoc);';
        fwrite($docsql2,$QUERY_insert_COMPTERENDU_DOCUMENT.PHP_EOL);
        
    }else {

        if(file_put_contents( $file_name,file_get_contents($url))) {
            $docsql = fopen("../resultat-scriptxml/insert_DOCUMENT(COMPTERENDU).sql", "a");

            $res = "File ".$file_name." downloading complete "; //log
            fwrite($fp, $res.PHP_EOL);
            
            $QUERY_insert_DOCUMENT = 'INSERT into DOCUMENT (typedoc, nom, chemin) values(\''.$extension.' \',\''.$file_name.'\',\'DocumentCompteRendu/'.$file_name.'\');';
            $QUERY_max_id = 'SELECT MAX(id_doc) INTO @max FROM DOCUMENT;';
            $QUERY_insert_COMPTERENDU_DOCUMENT = 'insert into COMPTERENDU_DOCUMENT (COMPTERENDU_id_cr, DOCUMENT_id_doc) values ('.$id.',@max);';
        
            fwrite($docsql,$QUERY_insert_DOCUMENT.PHP_EOL);
            fwrite($docsql,$QUERY_max_id.PHP_EOL);
            fwrite($docsql,$QUERY_insert_COMPTERENDU_DOCUMENT.PHP_EOL);
    
        }
        else {
            
            $res = "File :".$file_name." downloaded failed".PHP_EOL."URL : ".$url.PHP_EOL."<hr>"; //log 
            fwrite($fp, $res.PHP_EOL);
            
    
        }
        fclose($fp);
        }
    }
    

    

?>


