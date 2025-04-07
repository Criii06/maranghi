<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio Ordine</title>
    <style>
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Aggiungi la pietanza all'ordine
    $ordine = $_SESSION['ordine'];
    $ordine[$_POST['pietanza']] = $ordine[$_POST['pietanza']] + $_POST['numero'];
    $_SESSION['ordine'] = $ordine;

    // Prezzi per le pietanze
    $prezzi = [
        'pizza' => 5,
        'pasta' => 6,
        'mandolino' => 69
    ];

    // Calcola il prezzo totale
    $prezzoTotale = 0;
    foreach ($_SESSION['ordine'] as $pietanza => $quantita) {
        if (isset($prezzi[$pietanza])) {
            $prezzoTotale += $quantita * $prezzi[$pietanza];
        }
    }

    // Mostra la tabella
    echo '<h2>Dettaglio Ordine</h2>';
    echo '<table>';
    echo '<tr><th>Quantità</th><th>Pietanza</th><th>Prezzo Unitario (€)</th><th>Prezzo Totale (€)</th></tr>';
    
    foreach ($_SESSION['ordine'] as $pietanza => $quantita) {
        if (isset($prezzi[$pietanza])) {
            $prezzoUnitario = $prezzi[$pietanza];
            $prezzoParziale = $quantita * $prezzoUnitario;
            echo '<tr>';
            echo '<td>' . $quantita . '</td>';
            echo '<td>' . ucfirst($pietanza) . '</td>';
            echo '<td>' . number_format($prezzoUnitario, 2) . '</td>';
            echo '<td>' . number_format($prezzoParziale, 2) . '</td>';
            echo '</tr>';
        }
    }

    // Mostra il prezzo totale
    echo '</table>';
    echo '<p><strong>Il prezzo totale è: €' . number_format($prezzoTotale, 2) . '</strong></p>';
    ?>

    <a href="ordina.html">Torna indietro</a>
</body>
</html>
