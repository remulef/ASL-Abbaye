SELECT *
FROM DOCUMENT
WHERE DOCUMENT.id_doc in ( SELECT DOCUMENT_id_doc
                           FROM NODE_DOCUMENT
                           WHERE NODE_id_node in (SELECT id_node
                                                      FROM NODE
                                                      WHERE parent_node_id in(236,145,984))
);

