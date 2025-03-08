const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const modeText = document.querySelector(".mode-text");
    const modeSwitch = document.querySelector(".toggle-switch");

    // Check local storage for user preference
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark");
        modeText.innerText = "Light mode";
    }

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Light mode";
            localStorage.setItem("theme", "dark"); // Save preference
        } else {
            modeText.innerText = "Dark mode";
            localStorage.setItem("theme", "light"); // Save preference
        }
    });
});
