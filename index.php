<?php
$dir = "./images/3C/";
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

    <!-- Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var images = <?php echo json_encode($images); ?>;
    </script>
</body>
</html>
