SELECT *
FROM DOCUMENT
WHERE DOCUMENT.id_doc in ( SELECT DOCUMENT_id_doc
                           FROM NODE_DOCUMENT
                           WHERE DOCUMENT_id_node in (SELECT id_node
                                                      FROM NODE
                                                      WHERE name =" Administration")
);
