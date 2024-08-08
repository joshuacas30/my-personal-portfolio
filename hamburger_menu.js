document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const navigationMenus = document.getElementById("navigation-menus");
  const menuLinks = document.querySelectorAll(".navigation-menus a"); // Select all anchor tags within the menu

  hamburger.addEventListener("click", function () {
    // Toggle the 'active' class for the hamburger icon
    hamburger.classList.toggle("active");
    // Toggle the 'show' class for the navigation menu
    navigationMenus.classList.toggle("show");
  });

  menuLinks.forEach((link) => {
    link.addEventListener("click", function () {
      // Close the menu when a link is clicked
      hamburger.classList.remove("active");
      navigationMenus.classList.remove("show");
    });
  });
});
