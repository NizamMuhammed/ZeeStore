function performSearch() {
  const searchQuery = document.getElementById("search").value.trim();
  if (searchQuery) {
    // Redirect to the same page with the search query as a GET parameter
    window.location.href = `?query=${encodeURIComponent(searchQuery)}`;
  }
}
