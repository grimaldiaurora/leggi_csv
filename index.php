<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Lettura Log CSV</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
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
            if(!$file){ // Equivale a $file === false
                die("Errore nell'apertura del file");
                // die($msg) interrompe l'esecuzione dello script 
                // viene stampato a schermo il messaggio $msg
            }
            // Non serve avere un ramo else perché in caso di errore
            // lo script viene interrotto

            // Se il file esiste e viene aperto correttamente:
            while(!feof($file)){ // feof($file) === false
                $row = fgets($file);

                // Verifichiamo che la riga non sia vuota prima di elaborarla
                if(trim($row) !== "") {
                    // Si usa explode con "," come separatore per ottenere l'array dei campi
                    $data = explode(",", $row);

                    echo "<tr>";
                    // Cicliamo gli elementi dell'array per creare le celle <td>
                    foreach($data as $cell) {
                        // htmlspecialchars impedisce problemi di formattazione o script malevoli
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