<?php
$resultat = "";
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST["nombre1"] ?? "";
    $n2 = $_POST["nombre2"] ?? "";
    $operation = $_POST["operation"] ?? "";

    if ($n1 === "" || $n2 === "") {
        $erreur = "Veuillez saisir les deux nombres.";
    } elseif (!is_numeric($n1) || !is_numeric($n2)) {
        $erreur = "Veuillez saisir des nombres valides.";
    } else {
        $n1 = (float)$n1;
        $n2 = (float)$n2;

        if ($operation == "addition") {
            $resultat = $n1 + $n2;
        } elseif ($operation == "soustraction") {
            $resultat = $n1 - $n2;
        } elseif ($operation == "multiplication") {
            $resultat = $n1 * $n2;
        } elseif ($operation == "division") {
            if ($n2 == 0) {
                $erreur = "La division par zéro est impossible.";
            } else {
                $resultat = $n1 / $n2;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice simple</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="calculatrice">
        <h1>Ma calculatrice</h1>
        <p>Effectuez les quatre opérations de base.</p>

        <form method="POST" action="index.php" onsubmit="return verifierFormulaire();">
            <label for="nombre1">Premier nombre</label>
            <input type="number" step="any" id="nombre1" name="nombre1"
                value="<?php echo htmlspecialchars($_POST['nombre1'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>

            <label for="operation">Opération</label>
            <select id="operation" name="operation">
                <option value="addition">Addition (+)</option>
                <option value="soustraction">Soustraction (-)</option>
                <option value="multiplication">Multiplication (×)</option>
                <option value="division">Division (÷)</option>
            </select>

            <label for="nombre2">Deuxième nombre</label>
            <input type="number" step="any" id="nombre2" name="nombre2"
                value="<?php echo htmlspecialchars($_POST['nombre2'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>

            <div class="boutons">
                <button type="submit">Calculer</button>
                <button type="reset" class="effacer">Effacer</button>
            </div>
        </form>

        <?php if ($erreur != "") { ?>
            <div class="message erreur"><?php echo htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8'); ?></div>
        <?php } ?>

        <?php if ($resultat !== "") { ?>
            <div class="message resultat">
                Résultat : <?php echo htmlspecialchars((string)$resultat, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php } ?>
    </main>
    <script src="script.js"></script>
</body>
</html>
