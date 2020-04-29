CREATE TABLE NODE(
id_node int PRIMARY KEY  ,
name varchar(40),
parent_node_id INTEGER,
FOREIGN KEY(parent_node_id) REFERENCES NODE (id_node)
);


CREATE TABLE DOCUMENT(
  id_doc int PRIMARY KEY ,
  datepublication date,
  typedoc varchar(40) NOT NULL,
  nom varchar(40) NOT NULL,
  chemin TEXT NOT NULL,
  descri TEXT
);

CREATE TABLE NODE_DOCUMENT(
NODE_id_node int ,
DOCUMENT_id_doc int  ,
primary key(NODE_id_node,DOCUMENT_id_doc),
FOREIGN KEY(NODE_id_node) REFERENCES NODE(id_node),
FOREIGN KEY(DOCUMENT_id_doc) REFERENCES DOCUMENT(id_doc)
);







