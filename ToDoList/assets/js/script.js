function check() {
    let input = document.getElementById("input");
    if (input.value == "") {
        alert("Please fill in the task");
    } else {
        formSubmit.submit();
    }
}

function done() {
    let row = document.getElementsByTagName("tr");
    let check = document.getElementsByClassName("form-check-input");
    let labels = document.getElementsByClassName("form-check-label");


    for (let i = 0; i < row.length; i++) {
        check[i].addEventListener("change", function () {
            if (check[i].checked) {
                labels[i].innerHTML = "Done!";
                labels[i].style.color = "#198754";
                check[i].value = 1;
                row[i+1].classList.add("strikeout");
                row[i+1].style.opacity = "0.5";
            } else {
                labels[i].innerHTML = "Not done yet";
                labels[i].style.color = "#ff0000";
                check[i].value = 0;
                row[i+1].classList.remove("strikeout");
                row[i+1].style.opacity = "1";
            }
        });
    }
}

function hide(btn) {
    let row = btn.parentNode.parentNode;
    console.log(row);
    row.style.display = "none";
}