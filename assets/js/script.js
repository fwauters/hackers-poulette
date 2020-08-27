
document.getElementById("button").addEventListener("click", () => {

    let myElements = document.querySelectorAll(".jsClass");

    for (let i = 0; i < myElements.length; i++) {
        if (myElements[i].value === "") {
            myElements[i].style.borderColor = "red";
        }
    }
});