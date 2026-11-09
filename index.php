<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Lettura Log CSV</title>
    
</head>
<body>

    <h2>Dati del Log</h2>

    <table>
        <thead>
            <tr>
                <th>Data e Ora</th>
                <th>Operazione</th>
                <th>IP / Sorgente</th>
            </tr>
        </thead>
        <body>
        <?php
            $file = fopen("log.csv", "r");
            if(!$file){ 
                die("Errore nell'apertura del file");
            }
            while(!feof($file)){ 
                $row = fgets($file);

                if(trim($row) !== "") {
                    $data = explode(",", $row);

                    echo "<tr>";
                    foreach($data as $cell) {
                        echo "<td>" . htmlspecialchars(trim($cell)) . "</td>";
                    }
                    echo "</tr>";
                }
            }

            fclose($file);
        ?>
        </tbody>
    </table>

</body>
</html>