<?php

// Inlcudo il file con la classe Department che dopo andrò ad istanziare
require __DIR__ . '/Department.php';
require_once __DIR__ . '/database.php';


// Creiamo una stringa sql dove selezioniamo tutti gli elementi di departments
$sql = 'SELECT * FROM departments';

// Qui eseguiamo la connessione
$result = $conn->query($sql);

// echo var_dump($result);

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
            <li><a href="department-details.php?id=<?php echo $department->id ?>"><?php echo $department->name; ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>