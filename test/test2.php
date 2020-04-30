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

$numnode_courant =1;
$numdoc_courant = 1;

$nodesql = fopen("node.sql", "x+");
$docsql = fopen("document.sql", "x+");
$docnodesql = fopen("node_document.sql", "x+");

function recup_worker(string $path,int $node_parent_courant){
  global $nodesql;
  global $docsql,
  global $docnodesql;
  global $numdoc_courant;
  global $numnode_courant;
  global $listedossier_courant;
  $ignore = array( 'cgi-bin', '.', '..',);
  //$node_parent_courant++;


  $dossier_courant =  scandir($path,1);
  $listedossier_courant = array();
  foreach ($dossier_courant as $value) {

    if(!in_array($value,$ignore)){

      $chemin = $path.'/'.$value;
      if(is_dir($chemin)){
        $requeteSQL_node = add_node($value,$node_parent_courant,$numnode_courant);
        fwrite($nodesql,$requeteSQL_node);
        $listedossier_courant[$numnode_courant]=$value;
      }else{
        $requeteSQL_doc = add_document($chemin,$numdoc_courant);
        fwrite($docsql,$requeteSQL_doc);
        $requeteSQL_docnode = add_node_document($node_parent_courant,$numdoc_courant);
        fwrite($docnodesql,$requeteSQL_docnode);
        $numdoc_courant++;
      }}
    }
    //lire le dossier courant
    var_dump($listedossier_courant);
    foreach ($listedossier_courant as $key => $value) {
      $chemin = $path.'/'.$value;
      if(!in_array($value,$ignore)){
        if(is_dir($chemin)){
          recup_worker($chemin,$key);

        }
      }
    }
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
  echo'insert into NODE (id_node,name, parent_node_id) values (0,\''.dirname('.').'\',NULL);  <br> ';
  recup_worker('.',0);
  close()
  ?>
