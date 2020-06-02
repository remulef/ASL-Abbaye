SELECT
  table_schema AS NomBaseDeDonnees, 
  ROUND(SUM( data_length + index_length ) / 1024 / 1024, 2) AS BaseDonneesMo 
FROM information_schema.TABLES
GROUP BY TABLE_SCHEMA;