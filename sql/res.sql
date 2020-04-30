insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(1,'2020-04-29','php','test2','./test2.php')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,1);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(2,'2020-04-29','php','scan.php','./scan.php.php')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,2);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(3,'2020-04-29','sql','node_document','./node_document.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,3);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(4,'2020-04-29','sql','node','./node.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,4);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(5,'2020-04-29','NULL','fichier1','./fichier1')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,5);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(6,'2020-04-29','sql','document','./document.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (0,6);
insert into NODE (id_node,name, parent_node_id) values (1,'Z3',0);
insert into NODE (id_node,name, parent_node_id) values (2,'Z2',0);
insert into NODE (id_node,name, parent_node_id) values (3,'Z1',0);

C:\wamp64\www\ASL-Abbaye\test\test2.php:73:
array (size=3)
  2 => string 'Z3' (length=2)
  3 => string 'Z2' (length=2)
  4 => string 'Z1' (length=2)

C:\wamp64\www\ASL-Abbaye\test\test2.php:73:
array (size=0)
  empty

insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(7,'2020-04-29','NULL','oui','./Z2/oui')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (3,7);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(8,'2020-04-29','NULL','bonjour','./Z2/bonjour')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (3,8);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(9,'2020-04-29','NULL','aurevoir','./Z2/aurevoir')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (3,9);
insert into NODE (id_node,name, parent_node_id) values (4,'Zinterieur',3);

C:\wamp64\www\ASL-Abbaye\test\test2.php:73:
array (size=1)
  5 => string 'Zinterieur' (length=10)

insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(10,'2020-04-29','NULL','boutdutunelle','./Z2/Zinterieur/boutdutunelle')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (5,10);

C:\wamp64\www\ASL-Abbaye\test\test2.php:73:
array (size=0)
  empty

C:\wamp64\www\ASL-Abbaye\test\test2.php:73:
array (size=0)
  empty
