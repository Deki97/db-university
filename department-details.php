<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Department.php';

$sql = $conn->prepare("SELECT * FROM departments WHERE id = ?");

// Qui tramite bind-param colleghiamo il punto interrogativo al valore di $id
$sql->bind_param("d", $id);

// Prelevo la variabile id tramite GET
$id = $_GET['id'];

$sql->execute();
$result = $sql->get_result();


if($result && $result->num_rows > 0) {

    // Creiamo un array che andrà a contenere i risultati
    $departments = [];

    while($row = $result->fetch_assoc()) {
        $department = new Department();
        $department->id = $row['id'];
        $department->name = $row['name'];
        $department->address = $row['address'];
        $departments[] = $department;
    }

    // echo var_dump($departments);
} elseif($result && $result->num_rows == 0) {
    // Se la query è ok, ma ci sono zero risultati, ovvero se non ci sono righe
    echo 'Risultati non presenti per questa pagina';
} else {
    // Altrimenti se è un errore di query scrivo un messaggio di errore
    echo 'Errore di query';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL db-university</title>
</head>
<body>
    <ul>
        <?php foreach($departments as $department) { ?>
            <li><?php echo $department->id; ?> <?php echo $department->address; ?></li>
        <?php } ?>
    </ul>
</body>
</html>