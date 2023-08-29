let currentQuestion = 0;
let score = 0;

function startQuiz() {
    showQuestion(currentQuestion);
}

function showQuestion(index) {
    if ( index < Math.min(10,images.length) ) {
        const imgElement = document.getElementById("quiz-image");
        imgElement.src = images[index];

        let choices = [images[index]];

        while (choices.length < 4) {
            const randomChoice = images[Math.floor(Math.random() * images.length)];
            if (!choices.includes(randomChoice)) {
                choices.push(randomChoice);
            }
        }

        // Shuffle choices
        choices.sort(() => Math.random() - 0.5);

        const formElement = document.getElementById("quiz-form");
        formElement.innerHTML = '';

        for (let i = 0; i < choices.length; i++) {
            const radioButton = document.createElement("input");
            radioButton.type = "radio";
            radioButton.name = "choice";
            radioButton.value = choices[i];
            radioButton.id = `choice${i}`;

            const label = document.createElement("label");
            label.htmlFor = `choice${i}`;
            studentName = choices[i].split('/').pop();
            studentName = studentName.split('.').shift();
            label.textContent = studentName;

            formElement.appendChild(radioButton);
            formElement.appendChild(label);
            formElement.appendChild(document.createElement("br"));
        }

        const submitButton = document.createElement("input");
        submitButton.type = "button";
        submitButton.value = "Submit";

        submitButton.onclick = () => {
            const selected = document.querySelector('input[name="choice"]:checked').value;
            const segments = images[currentQuestion].split('/');
            const rightName = segments.pop().split('.').shift();

            if (selected === images[currentQuestion]) {
                score++;
                showMessage('Right, this is '+rightName);
                timeOut = 500;
            } else {
                showMessage('Wrong, this is '+rightName);
                timeOut = 3000;
            }

            currentQuestion++;
            document.getElementById("score-value").innerText = score;
            
            setTimeout(function() {
                showQuestion(currentQuestion);
                showMessage('');
                document.getElementById('quiz-form').style.display = 'block';
              }, timeOut);
        };

        formElement.appendChild(submitButton);
    } else {
        alert(`Game Over. Your score is ${score} out of ${Math.min(10,images.length)}`);
        location.reload(true);
    }
}

function showMessage(message) {
    document.getElementById('quiz-form').style.display = 'none';
    const resultDiv = document.getElementById("message");
    resultDiv.textContent =message;
  }
