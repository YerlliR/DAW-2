let display = document.querySelector('.pantalla input');
let buttons = document.querySelectorAll('.boton');
let currentInput = '';
let firstOperand = null;
let operator = '';

buttons.forEach(button => {
    button.addEventListener('click', function() {
        const value = this.textContent;

        if (value === 'C') {
            currentInput = '';
            firstOperand = null;
            operator = '';
            display.value = '0';
        } else if (value === '=') {
            if (firstOperand !== null && operator) {
                currentInput = calculate(firstOperand, operator, parseFloat(currentInput));
                display.value = currentInput;
                firstOperand = null;
                operator = '';
            }
        } else if (value === '«') {
            currentInput = currentInput.slice(0, -1);
            display.value = currentInput || '0';
        } else if (value === '%') {
            if (currentInput) {
                currentInput = (parseFloat(currentInput) / 100).toString(); // Calcula el porcentaje
                display.value = currentInput;
            }
        } else if (['+', '-', 'x', '/'].includes(value)) {
            if (currentInput) {
                if (firstOperand === null) {
                    firstOperand = parseFloat(currentInput);
                } else {
                    currentInput = calculate(firstOperand, operator, parseFloat(currentInput));
                }
                operator = value === 'x' ? '*' : value;
                display.value = currentInput;
                currentInput = '';
            }
        } else {
            currentInput += value;
            display.value = currentInput;
        }
    });
});

function calculate(firstOperand, operator, secondOperand) {
    switch (operator) {
        case '+':
            return firstOperand + secondOperand;
        case '-':
            return firstOperand - secondOperand;
        case '*':
            return firstOperand * secondOperand;
        case '/':
            return firstOperand / secondOperand;
        default:
            return secondOperand;
    }
}
