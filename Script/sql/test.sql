SELECT *
FROM DOCUMENT
WHERE typedoc="pdf"and  id_doc in ( SELECT DOCUMENT_id_doc
                           FROM NODE_DOCUMENT
                           WHERE NODE_id_node in (SELECT id_node
                                                      FROM NODE
                                                      WHERE name="E" and parent_node_id in (select id_node 
																					 from NODE
                                                                                     where name="Administrations"))
);

