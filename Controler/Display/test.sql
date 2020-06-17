    
    WITH cte AS 
     (
      SELECT a.id_node, a.parent_node_id, a.name
      FROM NODE a
      WHERE id_node = 1
      UNION ALL
      SELECT a.id_node, a.parent_node_id, a.name
      FROM NODE a JOIN cte c ON a.parent_node_id = c.id_node
      )
      SELECT id_node, parent_node_id, name
      FROM cte