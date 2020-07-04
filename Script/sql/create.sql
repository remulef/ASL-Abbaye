CREATE TABLE NODE(
id_node int PRIMARY KEY  ,
name varchar(40),
parent_node_id INTEGER,
FOREIGN KEY(parent_node_id) REFERENCES NODE (id_node)
);


CREATE TABLE DOCUMENT(
  id_doc int PRIMARY KEY auto_increment,
  datepublication date,
  typedoc varchar(40) NOT NULL,
  nom TEXT NOT NULL,
  chemin TEXT NOT NULL,
  descri TEXT NULL,
  pop int DEFAULT 0,
  tmp BOOLEAN DEFAULT FALSE,

);

CREATE TABLE NODE_DOCUMENT(
NODE_id_node int ,
DOCUMENT_id_doc int  ,
primary key(NODE_id_node,DOCUMENT_id_doc),
FOREIGN KEY(NODE_id_node) REFERENCES NODE(id_node)  ON DELETE CASCADE,
FOREIGN KEY(DOCUMENT_id_doc) REFERENCES DOCUMENT(id_doc) ON DELETE CASCADE
);



CREATE TABLE COMPTERENDU(
id_cr int PRIMARY KEY auto_increment  ,
titre varchar(255),
content MEDIUMTEXT NOT NULL,
datepub date,
auteur varchar(40)
);


CREATE TABLE COMPTERENDU_DOCUMENT(
COMPTERENDU_id_cr int ,
DOCUMENT_id_doc int  ,
primary key(COMPTERENDU_id_cr,DOCUMENT_id_doc),
FOREIGN KEY(COMPTERENDU_id_cr) REFERENCES COMPTERENDU(id_cr) ON DELETE CASCADE,
FOREIGN KEY(DOCUMENT_id_doc) REFERENCES DOCUMENT(id_doc) ON DELETE CASCADE
);




CREATE TABLE COMMENTAIRE(
id_comment int auto_increment  ,
id_doc int ,
commentaire TEXT NOT NULL,
datepub date,
auteur varchar(40),
primary key(id_comment,id_doc),
FOREIGN KEY(id_doc) 
  REFERENCES DOCUMENT(id_doc)
   ON DELETE CASCADE
);

CREATE TABLE TAGS(
id_tags int auto_increment  ,
id_doc int ,
tag varchar(30) NOT NULL,
primary key(id_tags,id_doc),
FOREIGN KEY(id_doc) 
  REFERENCES DOCUMENT(id_doc)
   ON DELETE CASCADE
);

