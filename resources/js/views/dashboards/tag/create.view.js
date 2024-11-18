// Logic untuk button back supaya kembali kehalaman awal tags
function handleBack() {
    const buttonBack = document.getElementById("buttonBack");
    const route = buttonBack.getAttribute("data-route");

    buttonBack.addEventListener('click', ()=>{
        window.location = route;
    })
}

document.addEventListener("click", () => {
    handleBack();
});
