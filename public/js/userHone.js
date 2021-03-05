$(document).ready(function () {
  var sidenav = document.querySelector(".navigation");
  var main = document.querySelector("main");

  sidenav.isOpen = screen.width > 1024;
  const openNav = () => {
    sidenav.style.transform = `translateX(${"0%"})`;
    if (screen.width < 476) {
    } else {
      main.style.paddingLeft = "300px";
    }
    sidenav.isOpen = true;
  };
  const closeNav = () => {
    sidenav.style.transform = `translateX(${"-105%"})`;
    if (screen.width < 476) {
    } else {
      main.style.paddingLeft = 0;
    }
    sidenav.isOpen = false;
  };

  document.querySelector(".sidenav-trigger").addEventListener("click", () => {
    sidenav.isOpen ? closeNav() : openNav();
  });
});
