const numberButtons = document.querySelectorAll('[data-numbers]');
const operationButtons = document.querySelectorAll('[data-operation]');
const equalsButton = document.querySelector('[data-equals]');
const deleteButton = document.querySelector('[data-delete]');
const allClearButton = document.querySelector('[data-all-clear]');
let previousOperand = document.getElementById("previous-operand");
let currentOperand = document.getElementById("current-operand");
let operationSign = "";

numberButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        //console.log(button);
        appendNumber(button.innerText);
    });
});

operationButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        //console.log(button);
        chooseOperation(button.innerText);
        updateDisplay();
    });
});


equalsButton.addEventListener("click", function () {
    //console.log(button);
    compute();

});

allClearButton.addEventListener("click", function () {
    clear();
});

deleteButton.addEventListener("click", function () {
    del();
});

function appendNumber(number) {
    if (number === '.' && currentOperand.innerText.includes(".")) {
        return;
    }
    if (currentOperand.innerText == 0) {
        currentOperand.innerText = number;
    } else {
        currentOperand.innerText += number;
    }

}

function chooseOperation(operation) {
    if (currentOperand.innerText === "") {
        return;
    }

    if (previousOperand.innerText !== "") {
        compute();
    }
    operationSign = operation;
    currentOperand.innerText += operation;
}

function updateDisplay() {
    previousOperand.innerText = currentOperand.innerText;
    currentOperand.innerText = "";
}

function compute() {
    let result = 0;
    let prev = parseFloat(previousOperand.innerText);
    let curr = parseFloat(currentOperand.innerText);

    switch (operationSign) {
        case "+":
            result = prev + curr;
            break;
        case "−":
            result = prev - curr;
            break;
        case "×":
            result = prev * curr;
            break;
        case "÷":
            result = prev / curr;
            break;
        default:
            return;
    }
    currentOperand.innerText = String(result);
    operation = undefined;
    previousOperand.innerText = "";
}

function clear() {
    currentOperand.innerText = 0;
    operation = undefined;
    previousOperand.innerText = "";
}

function del() {
    let last_char = currentOperand.innerText[currentOperand.innerText.length - 1];
    currentOperand.innerText = currentOperand.innerText.replace(last_char, "");
}