let currentQuestion = 0;
let score = 0;

function startQuiz() {
    showQuestion(currentQuestion);
}

function showQuestion(index) {
    if (index < images.length) {
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
            label.textContent = choices[i].split('/').pop();

            formElement.appendChild(radioButton);
            formElement.appendChild(label);
            formElement.appendChild(document.createElement("br"));
        }

        const submitButton = document.createElement("input");
        submitButton.type = "button";
        submitButton.value = "Submit";

        submitButton.onclick = () => {
            const selected = document.querySelector('input[name="choice"]:checked').value;
            if (selected === images[currentQuestion]) {
                score++;
                showMessage('Right!');
            } else {
                rightAnswer = images[currentQuestion];
                showMessage('Wrong, the right answer is: '+rightAnswer);
            }
            currentQuestion++;
            document.getElementById("score-value").innerText = score;
            
            setTimeout(function() {
                showQuestion(currentQuestion);
                showMessage('');
              }, 3000);
        };

        formElement.appendChild(submitButton);
    } else {
        alert(`Game Over. Your score is ${score} out of ${images.length}`);
    }
}

function showMessage(message) {
    const resultDiv = document.getElementById("message");
    resultDiv.textContent =message;
  }
