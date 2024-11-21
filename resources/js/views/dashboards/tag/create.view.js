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

    inputTitle.addEventListener("keyup", (event) => {
        const title = event.target.value;
        const slug = generateSlug(title);
        inputSlug.value = slug;
        textSlug.innerText = slug;
    });
}

function handleSubmit() {
    const formTag = document.getElementById("formTag");
    const buttonSave = document.getElementById("buttonSave");

    buttonSave.addEventListener('click', () => {
        formTag.submit();
    })
}

document.addEventListener("click", () => {
    handleBack();
    handleSlug();
    handleSubmit();
});
