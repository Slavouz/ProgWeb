let numA = 0;
let operation = "";
let lastOperator = "";

function plus() {
  if (lastOperator == "" || lastOperator != "+") {
    if (lastOperator != "+" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` + `);
    } else {
      operation = operation.concat(` + `);
    }
    console.log(`Operation: ${operation}`);
    numA = 0;
    lastOperator = "+";
    document.getElementById("num").innerHTML = operation;
  }
}

function minus() {
  if (lastOperator == "" || lastOperator != "-") {
    if (lastOperator != "-" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` - `);
      console.log(`Operation: ${operation}`);
    } else {
      operation = operation.concat(` - `);
      console.log(`Operation: ${operation}`);
    }
    numA = 0;
    lastOperator = "-";
    document.getElementById("num").innerHTML = operation;
  }
}

function mult() {
  if (lastOperator == "" || lastOperator != "*") {
    if (lastOperator != "*" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` * `);
      console.log(`Operation: ${operation}`);
    } else {
      operation = operation.concat(` * `);
      console.log(`Operation: ${operation}`);
    }
    numA = 0;
    lastOperator = "*";
    document.getElementById("num").innerHTML = operation;
  }
}

function divide() {
  if (lastOperator == "" || lastOperator != "/") {
    if (lastOperator != "/" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` / `);
      console.log(`Operation: ${operation}`);
    } else {
      operation = operation.concat(` / `);
      console.log(`Operation: ${operation}`);
    }
    numA = 0;
    lastOperator = "/";
    document.getElementById("num").innerHTML = operation;
  }
}

function mod() {
  if (lastOperator == "" || lastOperator != "%") {
    if (lastOperator != "%" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` % `);
      console.log(`Operation: ${operation}`);
    } else {
      operation = operation.concat(` % `);
      console.log(`Operation: ${operation}`);
    }
    numA = 0;
    lastOperator = "%";
    document.getElementById("num").innerHTML = operation;
  }
}

function pow() {
  if(lastOperator == "" || lastOperator != "^") {
    if(lastOperator != "^" && lastOperator != "") {
      operation = operation.slice(0, operation.length - 3);
      operation = operation.concat(` ** `);
      console.log(`Operation: ${operation}`);
    } else {
      operation = operation.concat(` ** `);
      console.log(`Operation: ${operation}`);
    }
    numA = 0;
    lastOperator = "^";
    document.getElementById("num").innerHTML = operation;
  }
}

function result() {
  let res = eval(operation);
  document.getElementById("num").innerHTML = res;
  numA = res;
  operation = res.toString();
  lastOperator = "";
  console.log(res);
}

function allClear() {
  numA = 0;
  operation = "";
  lastOperator = "";
  console.log(`Operation: ${operation}`);
  document.getElementById("num").innerHTML = numA;
}

function deleteEntry() {
  let lastChar = operation[operation.length - 1];
  if (operation != "") {
    if (
      lastChar === "+" ||
      lastChar === "-" ||
      lastChar === "/" ||
      lastChar === "*" ||
      lastChar === ""
    ) {
      operation = operation.slice(0, operation.length - 2);
    } else {
      operation = operation.slice(0, operation.length - 1);
    }
    if (operation === "") {
      numA = 0;
    } else {
      numA = Number(operation);
    }
    console.log(`Operation: ${operation}`);
    document.getElementById("num").innerHTML = operation;
  }
}

function btnNumber(number) {
  lastOperator = "";
  if (numA == 0) {
    if (operation == 0) {
      operation = "";
    }
    numA = number;
    operation = operation.concat(number);
    console.log(`Operation: ${operation}`);
    document.getElementById("num").innerHTML = operation;
  } else {
    numA = Number(numA.toString().concat(number.toString()));
    operation = operation.concat(number);
    console.log(`Operation: ${operation}`);
    document.getElementById("num").innerHTML = operation;
  }
}

document.getElementById("num").innerHTML = numA;
