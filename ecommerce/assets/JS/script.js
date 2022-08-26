/*let counter_prod = document.getElementById("counter");
let num = parseInt(counter_prod.innerHTML);

if (num == 0) {
    counter_prod.style.display = "none";
}
*/
function addProd() {
    num += 1;
    counter_prod.style.display = "inline-block";
    counter_prod.innerText = num;
}