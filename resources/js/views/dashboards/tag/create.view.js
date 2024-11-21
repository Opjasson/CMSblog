import { generateSlug } from "../../../plugins/slugify";

// Logic untuk button back supaya kembali kehalaman awal tags
function handleBack() {
    const buttonBack = document.getElementById("buttonBack");
    const route = buttonBack.getAttribute("data-route");

    buttonBack.addEventListener("click", () => {
        window.location = route;
    });
}

function handleSlug() {
    const inputTitle = document.getElementById("inputTitle");
    const inputSlug = document.getElementById("inputSlug");
    const textSlug = document.getElementById("textSlug");

    inputTitle.addEventListener("click", (event) => {
        const title = event.target.value;
        const slug = generateSlug(title);
        inputSlug.value = slug;
        textSlug.innerText = slug;
    });
}

document.addEventListener("click", () => {
    handleBack();
    handleSlug();
});
