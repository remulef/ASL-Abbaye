    
    WITH cte AS 
     (
      SELECT n.id_node, n.parent_node_id, n.name
      FROM NODE n
      WHERE id_node = 1
      UNION ALL
      SELECT n.id_node, n.parent_node_id, n.name
      FROM NODE a JOIN cte c ON a.parent_node_id = c.id_node
      )
      SELECT id_node, parent_node_id, name
      FROM cte