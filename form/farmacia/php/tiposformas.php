<?php
require 'utilidades.php';
echo "<label>Tipo </label><select>";
$sql = "select * from formas_tipos where form_id = ".$_GET['q'];

$result = $mysqli->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<option value='".$row["formas_tipos_id"]."'>".$row["formas_tipos_detalles"]."</option>";
    }
}else{
    echo "<option value='-'>-</option>";
}
echo "</select>";
$mysqli->close();
?>
