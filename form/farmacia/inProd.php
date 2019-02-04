<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmacia</title>
    <style>
        td {
            padding: 20px;
        }
        #txtHint {
            width: 150px;
        }
    </style>
</head>
<body>
<?php include 'php/utilidades.php'; ?>
    <h1><a href="/Inventario/form/farmacia/farmacia.php">Farmacia</a></h1>
    
    <form action="" method="post">
    <table>
        <tr>
            <td colspan="2"><label>Entrada Producto</label></td>
        </tr>
        <tr>
            <td>
                <label for="">Nombre</label><br>
                <input type="text" name="proname" id=""><br>
                <label for="">Concentracion</label><br>
                <input type="text" name="procen" id=""><br>
                <label for="">Forma Farmaceutica</label><br>
                <select name="formas" onchange="showformas(this.value)">
                    <option value=""></option>
                    <?php
                        $sql = "select * from farm_formas";
                        $result = $mysqli->query($sql);

                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row["form_id"]."'>".$row["form_detalles"]."</option>";
                            }
                        }
                        $mysqli->close();
                    ?>
                </select>
                <br>
                <div id="txtHint"></div>
                <label for="">Forma de presentacion</label><br>
                <input type="text" name="proname" id=""><br>
                <label for="">Numero de lote</label><br>
                <input type="text" name="pronumlot" id=""><br>
                <label for="">Fecha Vencimiento</label><br>
                <input type="date" name="vencimiento" id=""><br>
                <label for="">Registro Sanitario</label><br>
                <input type="text" name="rsanitario" id=""><br>
                
            </td>
            <td>
                <label for="">Fabricante</label><br>
                <select name="" id="">
                    <option value="-">-</option>
                </select><br>
                <label for="">Importador</label><br>
                <input type="text"><br>
                <label for="">Condisiones de almacenamiento</label><br>
                <input type="text" name="proname" id=""><br>
                <label for="">Costo</label><br>
                <input type="text" name="procosto" id=""><br>
                <label for="">Cantidad</label><br>
                <input type="number" name="cantidad" id=""><br>
                <label for="">Unto de Reorden</label><br>
                <input type="number" name="puntoreo" id=""><br>
                <label for="">Estado</label><br>
                <label for=""><input type="checkbox" name="status" id=""> Activo</label>
            </td>
        </tr>
    </table>
    </form>
    <script>
        function showformas(str){
            var xhttp;
            if(str == ""){
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "php/tiposformas.php?q="+str, true);
            xhttp.send();
        }
    </script>
</body>
</html>