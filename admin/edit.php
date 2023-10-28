<?php

include "connect.php";

$id = $_GET['id'];

$pdoGet = $pdo->prepare("
SELECT * FROM `skills` WHERE id=$id
");
$pdoGet->execute();
$data = $pdoGet->fetch();

if (isset($_POST["submit"])) {

    $skill = $_POST['skill'];
    $knowladge = $_POST['knowladge'];
    $color = $_POST['color'];

    $pdoStatement = $pdo->prepare("UPDATE `skills` SET `skill`=:skill,`knowladge`=:knowladge,`color`=:color WHERE id=$id ");

    $pdoStatement->bindParam('skill', $skill);
    $pdoStatement->bindParam('knowladge', $knowladge);
    $pdoStatement->bindParam('color', $color);

    if ($pdoStatement->execute()) header("location: index.php");
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
                <h1>Edit Skill</h1>
            </div>
            <div class="col-12 text-end mb-3">
                <a class="btn btn-success btn-sm" href="index.php">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <form action="edit.php?id=<?= $data['id'] ?>" method="post" autocomplete="off"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="skill">Skill</label>
                        <input class="form-control" value="<?= $data['skill']; ?>" type="text" id="skill" name="skill"
                            placeholder="Enter skill">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="knowladge">Knowladge</label>
                        <input class="form-control" type="text" value="<?= $data['knowladge']; ?>" id="knowladge" name="knowladge"
                            placeholder="Enter knowladge">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="color">Color</label>
                        <select name="color" class="form-select" id="color">
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="orange">Orange</option>
                            <option value="pink">Pink</option>
                            <option value="purple">Purple</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>