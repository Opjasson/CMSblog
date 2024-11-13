// Toggle the side navigation
function sidebarToggle() {
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
}

function logoutSubmit() {
    const actionLogout = document.getElementById('actionLogout')
    const formLogout = document.getElementById('formLogout')

    // Event untuk metriger supaya saat element dengan Id actionLogout di klik akan ikut mengklik submit dari button logout
    actionLogout.addEventListener('click', (e)=>{
        e.preventDefault();
        formLogout.submit();
    })
}

window.addEventListener("DOMContentLoaded", () => {
    sidebarToggle();
    logoutSubmit();
});

