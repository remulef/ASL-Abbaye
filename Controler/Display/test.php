<?php
header('Access-Control-Allow-Origin: *');
$data = $_POST['data'];
$data = json_decode($data);

$id_node = $data->pos;
$search_name = "%".$data->docname."%";
$typedoc = $data->typedoc;
$search_format = $data->formats;
$niveau = $data->niveau;
$order =($data->order==true?"ASC":"DESC");
$tefanf = $data->tefanf; 

$typedoc_string = "(".implode(",",$typedoc).")";
echo $typedoc_string;

?>