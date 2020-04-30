<?php



function add_document(string $path,$id_doc):string{
  //recupere les métadonnées sur le type de fichier et nom
  //echo $path;
  $path_info = pathinfo($path);
  if(!isset($path_info['extension'])){
    $type = "NULL";
  }
  else{
     $type = $path_info['extension'] ;   //type du fichier
  }

  $nom =  $path_info['filename'] ;     //nom du fichier
  $datepublication = stat($path)['mtime'];  //date de modification du fichier
  $datepublication = new DateTime("@$datepublication");
  $datepublication = $datepublication->format('Y-m-d');

  echo 'insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values('.$id_doc.',\''.$datepublication.'\',\''.$type.'\',\''.$nom.'\',\''.$path.'\')<br>';
  return 'insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values('.$id_doc.',\''.$datepublication.'\',\''.$type.'\',\''.$nom.'\',\''.$path.'\')\n';
}


function add_node(string $path,int $parent,int $num):string{
  global $numnode_courant;
  $path_info = pathinfo($path);
  $nom =  $path_info['filename'] ;     //nom du dossier
 echo'insert into NODE (id_node,name, parent_node_id) values ('.$num.',\''.$nom.'\','.$parent.');  <br> ';
 $numnode_courant++;
  return 'insert into NODE (id_node,name, parent_node_id) values ('.$numnode_courant.',\''.$nom.'\','.$parent.');  \n ';
}


function add_node_document(int $id_node,int $id_doc):string{
  echo 'insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values ('.$id_node.','.$id_doc.'); <br>';
  return  'insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values ('.$id_node.','.$id_doc.'); \n';
}

  $numnode_courant =2;
  $numdoc_courant = 1;
  function recup_worker(string $path,int $node_parent_courant){
    $nodesql = fopen("node.sql", "w");
    $docsql = fopen("document.sql", "w");
    $docnodesql = fopen("node_document.sql", "w");
    global $numdoc_courant;
    global $numnode_courant;
    $ignore = array( 'cgi-bin', '.', '..','.git','.env','.gitignore' );
    $node_parent_courant++;


    $dossier_courant =  scandir($path,1);
    foreach ($dossier_courant as $value) {

      if(!in_array($value,$ignore)){

          $chemin = $path.'/'.$value;
        if(is_dir($chemin)){
          $requeteSQL_node = add_node($value,$node_parent_courant,$numnode_courant);
          recup_worker($chemin,$node_parent_courant);
        }else{
          $requeteSQL_doc = add_document($chemin,$numdoc_courant);
          $requeteSQL_docnode = add_node_document($node_parent_courant,$numdoc_courant);
          $numdoc_courant++;
        }}

      }

      foreach ($dossier_courant as $value) {
        if(is_dir($chemin)){
          recup_worker($chemin,$node_parent_courant);
      }

      $node_parent_courant++;
    }

//   $ignore = array( 'cgi-bin', '.', '..','.git' );
//
//   $l = scandir('.');
//   foreach ($l as $value) {
//   if(!in_array($value,$ignore)){
//     echo $value.'<br>';
//     //var_dump(stat($value));
//     $datepublication = stat($value)['mtime'];  //date de modification du fichier
//     $datepublication = new DateTime("@$datepublication");
//     $datepublication = $datepublication->format('Y-m-d');
//     echo $datepublication.' = DATE <br>';
//       echo '----------------------------- <br>';
//   }
// }

recup_worker('.',0);
?>
