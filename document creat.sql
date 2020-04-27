DROP TABLE DOCUMENT;
CREATE TABLE DOCUMENT{
  id_doc INTEGER PRIMARY KEY AUTO_INCREMENT,
  datepublication date,
  type varchar(40) NOT NULL,
  nom varchar(40) NOT NULL,
  chemin varchar(400) NOT NULL,
  descri TEXT,

CONSTRAINT CHK_TypeDocument CHECK( type="mp3" OR type="png" OR type="pdf" OR type="ODT") -- TODO A COMPLETER
};

CREATE INDEX id_doc_index ON DOCUMENT (id_doc);