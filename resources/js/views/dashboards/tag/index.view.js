function handleEdit() {
    const buttonEdit = document.querySelectorAll("button#buttonEdit");

    buttonEdit.forEach((itemButtonEdt) => {
        const route = itemButtonEdt.getAttribute("data-route");

        itemButtonEdt.addEventListener("click", () => {
            window.location = route;
        });
    })

    
}

function handleDelete() {
    const buttonDelete = document.querySelectorAll("button#buttonDelete");
    const formDeleteTag = document.getElementById("formDeleteTag")

    buttonDelete.forEach((itemButtonDlt) => {
        const route = itemButtonDlt.getAttribute("data-route");

        itemButtonDlt.addEventListener("click", () => {
            // window.location = route;
            formDeleteTag.action = route;
            formDeleteTag.submit();
        });
    })

    
}


document.addEventListener("click", () => {
    handleEdit();
    handleDelete();
    
});