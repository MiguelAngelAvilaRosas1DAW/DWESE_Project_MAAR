let panels = document.querySelectorAll(".gameContent");

window.onscroll = () => {
    panelIn();

}

const panelIn = function () {
    if (panels.length > 0) {
        panels.forEach(panel => {
            const scrollHeight = window.innerHeight + window.scrollY;
            const panelPostion = panel.offsetTop;

            if (scrollHeight > panelPostion) {
                panel.classList.add("panel-fade-in");
            } else {
                panel.classList.remove("panel-fade-in");
            }

            console.log(panel.offsetTop);
        });
    }
}

const passwordInput = document.getElementById("claveUsuario");
const togglePasswordIcon = document.getElementById("togglePassword");

togglePasswordIcon.addEventListener("click", function () {
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordIcon.classList.remove("fa-eye");
        togglePasswordIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        togglePasswordIcon.classList.remove("fa-eye-slash");
        togglePasswordIcon.classList.add("fa-eye");
    }
});