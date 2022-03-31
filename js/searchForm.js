let searchIcon = document.getElementById("header_search-icon");

searchIcon.addEventListener("click", function () {
  let popup = document.getElementById("popup");
  let formPopup = document.getElementById("wrapper");
  popup.style.display = "block";

  popup.addEventListener("mouseup", function (e) {
    if (!formPopup.contains(e.target)) {
      popup.classList.add("popupOut");
      popup.style.display = "none";
    }
  });
});
