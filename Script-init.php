<?php

$nodesql = fopen("node.sql", "w");
$docsql = fopen("document.sql", "w");
$docsql = fopen("document.sql", "w");



function scriptrecup(objet){
  while(objet!=null){
    if(objet=file) opération fichier
    if(objet=dossier) scriptrecup(dossier)
    objet++;
  }
}

function init(string $obj){
  if($)

}


string function add_document(string $path){
  //recupere les métadonnées sur le type de fichier et nom
  $path_info = pathinfo($path);
  $type = $path_info['extension'] ;   //type du fichier
  $nom =  $path_info['filename'] ;     //nom du fichier
  $datepublication = stat($chemin)['mtime'];  //date de modification du fichier

  return 'insert into DOCUMENT (datepublication, typedoc, nom, chemin) values('.$datepublication.','.$type.','.$nom.','.$path.')';
}


string function add_node(string $path){
  $path_info = pathinfo($path);
  $nom =  $path_info['filename'] ;     //nom du dossier
  if($path!='.'){
    return
    'select node_id into id_parent \n
    from NODE  \n
    where name = '.basename(dirname($path)).'; \n '.
    'insert into NODE (name, parent_node_id) values (\''.$nom.'\', @id_parent);  \n ';
  }
  return 'insert into NODE (name) values (\''.$nom.'\');  \n ';
}

$root = ".";
init($root);


?>
