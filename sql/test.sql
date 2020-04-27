SELECT *
FROM DOCUMENT
WHERE id_doc IN ( SELECT DOCUMENT_id_doc
				  FROM NODE_DOCUMENT
				  WHERE DOCUMENT_id_node IN (SELECT id_node
                                             FROM NODE
                                             WHERE name =" Administration")
);
