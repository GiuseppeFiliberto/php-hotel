<?php

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <title>PHP Hotels</title>
</head>

<body>

    <div class="container-fluid">


        <h1 class="my-3"> Hotels List</h1>

        <h3>Filters</h3>

        <form action="" method="get">
            <!-- Parking Filter -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="parking" name="parking">
                <label class="form-check-label" for="parking">
                    With Parking
                </label>
            </div>

            <!-- Stars Filter -->
            <select class="form-select" aria-label="Default select example" id="minVote" name="minVote">
                <option selected disabled>Select Stars</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>

            <button
                class="btn btn-primary">
                Go
            </button>

        </form>


        <div
            class="table-responsive">
            <table
                class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // Bonus

                    $isParking = false;

                    if (isset($_GET["parking"]) && $_GET["parking"] == "on") {
                        $isParking = true;
                    }

                    $minVote = 0;

                    if (isset($_GET["minVote"])) {
                        $minVote = intval($_GET["minVote"]);
                    }


                    foreach ($hotels as $hotel) {

                        if ($isParking) {

                            if (!$hotel["parking"]) {
                                continue;
                            }
                        }

                        if ($minVote > 0 && $hotel["vote"] < $minVote) {
                            continue;
                        }
                    ?>

                        <tr class="">
                            <td scope="row"><?php echo $hotel["name"]; ?></td>
                            <td scope="row"><?php echo $hotel["description"]; ?></td>
                            <td scope="row">
                                <?php echo $hotel["parking"] ? "Yes" : "No"; ?>
                            </td>
                            <td scope="row"><?php echo $hotel["vote"] . " stars"; ?></td>
                            <td scope="row"><?php echo $hotel["distance_to_center"] . " Km"; ?></td>

                        </tr>

                    <?php
                    };
                    ?>

                </tbody>
            </table>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>