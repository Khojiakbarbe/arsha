<?php
include('connect.php');

$pdoStatement = $pdo->prepare("
    SELECT * FROM `skills` ORDER BY id DESC
");

if (!$pdoStatement->execute()) {
    echo 'Xatolik bor';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Skills</title>
</head>

<body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Skills Table</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success btn-sm" href="/admin/create.php">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>
            <div class="col-12">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Skill</th>
                            <th>Knowladge</th>
                            <th>Color</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        while ($data = $pdoStatement->fetch()) {
                            ?>
                            <tr>
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <?= $data['skill'] ?>
                                </td>
                                <td>
                                    <?= $data['knowladge'] ?>
                                </td>
                                <td>
                                    <?= $data['color'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="/admin/edit.php?id=<?= $data['id'] ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Delete?')"
                                        href="/admin/delete.php?id=<?= $data['id'] ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>