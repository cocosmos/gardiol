let stars = document.getElementsByClassName("rating-stars");
if (stars) {
  for (let i = 0; i < stars.length; i++) {
    if (stars[i].title === "Rating: 0.00") {
      stars[i].innerHTML = "...";
    }
  }
}
