document.getElementById("search").addEventListener("input", function () {
  let filter = this.value.toLowerCase().replace(/\s+/g, "");

  const tableRows = document.querySelectorAll(".table-row").forEach((row) => {
    // Find the cell with the brand name
    const brandNameCell = row.querySelector(".row:nth-child(2)");
    const brandName = brandNameCell
      ? brandNameCell.innerText.toLowerCase()
      : "";

    // Check if the brand name includes the search term
    if (!brandName.includes(filter)) {
      row.classList.add("close");
    } else {
      row.classList.remove("close");
    }
  });

  if (
    document.querySelectorAll(".table-row").length ==
    document.querySelectorAll(".close").length
  )
    document.querySelector(".flip").classList.remove("close2");
  else document.querySelector(".flip").classList.add("close2");
});
