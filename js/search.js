document.getElementById("search").addEventListener("input", function () {
  let filter = this.value.toUpperCase();

  document.querySelectorAll(".menus").forEach((div) => {
    if (
      div.querySelector("h3").textContent.toUpperCase().indexOf(filter) === -1
    ) {
      div.classList.add("ghost");
    } else {
      div.classList.remove("ghost");
    }
  });

  document.querySelectorAll(".menu-wrap").forEach((itm) => {
    if (
      itm.querySelectorAll(".menus").length ===
      itm.querySelectorAll(".ghost").length
    ) {
      itm.classList.add("freak");
    } else {
      itm.classList.remove("freak");
    }
  });
});
