<?php

if ( isset($_GET['klas']) ) {
    $klas = $_GET['klas'];
} else {
    header("Location: folder.php");
    exit(); // Ensure that code execution is terminated
}


$dir = "./images/$klas/";
$images = glob($dir . "*.{jpg,jpeg,png}", GLOB_BRACE);
shuffle($images);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Names Quiz</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js"></script>
    <style>
        #quiz-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Image Quiz</h1>
        <div id="quiz-area" class="row mt-4">
            <div class="col-md-6">
                <img id="quiz-image" src="./images/ready.png" alt="Quiz image" class="img-fluid mb-3">
            </div>
            <div class="col-md-6">
                <form id="quiz-form">
                    <!-- Choices will go here -->
                </form>
            </div>
            <div id="message">
            </div>
        </div>
        <button id="start-button" class="btn btn-success btn-block mt-3" onclick="startQuiz()">Start Quiz</button>
        <div id="score" class="text-center mt-3">
            Your Score: <span id="score-value">0</span>
        </div>
    </div>

    <script>
        var images = <?php echo json_encode($images); ?>;
    </script>
</body>
</html>
