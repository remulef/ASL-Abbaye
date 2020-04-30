insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(1,'2020-04-29','php','test2','./test2.php')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,1);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(2,'2020-04-29','php','scan.php','./scan.php.php')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,2);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(3,'2020-04-29','sql','node_document','./node_document.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,3);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(4,'2020-04-29','sql','node','./node.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,4);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(5,'2020-04-29','NULL','fichier1','./fichier1')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,5);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(6,'2020-04-29','sql','document','./document.sql')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (1,6);
insert into NODE (id_node,name, parent_node_id) values (2,'Z3',1);
insert into NODE (id_node,name, parent_node_id) values (3,'Z2',1);
insert into NODE (id_node,name, parent_node_id) values (4,'Z1',1);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(7,'2020-04-29','NULL','oui','Z2/oui')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (2,7);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(8,'2020-04-29','NULL','bonjour','Z2/bonjour')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (2,8);
insert into DOCUMENT (id_doc,datepublication, typedoc, nom, chemin) values(9,'2020-04-29','NULL','aurevoir','Z2/aurevoir')
insert into NODE_DOCUMENT (NODE_id_node, DOCUMENT_id_doc) values (2,9);
insert into NODE (id_node,name, parent_node_id) values (5,'Zinterieur',2); 
