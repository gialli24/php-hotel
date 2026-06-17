<?php

// Hotels Array
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

// Filters
$parking_filter = (isset($_GET['parking']) && $_GET['parking'] == 'on') ? true : false;
$vote_filter = (isset($_GET['vote']) && !empty($_GET['vote']) && is_numeric($_GET['vote'])) ? $_GET['vote'] : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="app-main">

        <div class="container">

            <h1 class="my-4">Hotels</h1>

            <form action="./">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="parking">
                            <label class="form-check-label" for="parking">
                                Parcheggio
                            </label>
                        </div>
                    </span>
                    <input type="number" class="form-control" placeholder="Voto" name="vote">
                    <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                </div>
            </form>

            <table
                class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Parcheggio</th>
                        <th scope="col">Voto</th>
                        <th scope="col">Distanza dal Centro</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dinamyc Content -->
                    <?php
                    foreach ($hotels as $hotel) {

                        // Filter by parking
                        if ($parking_filter && !$hotel['parking']) {
                            continue;
                        }

                        // Filter by vote
                        if ($vote_filter && $hotel['vote'] < $vote_filter) {
                            continue;
                        }

                    ?>
                        <tr>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
                            <td><?php echo $hotel['vote'] ?></td>
                            <td><?php echo $hotel['distance_to_center'] . " km" ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.app-main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>