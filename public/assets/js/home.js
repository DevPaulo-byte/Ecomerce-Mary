// Seleciona os elementos
let navbar = document.querySelector(".navbar");
let searchForm = document.querySelector(".search-form");
let cartItem = document.querySelector(".cart-items-container");

// Botão do menu
document.querySelector("#menu-btn").onclick = () => {
  const isActive = navbar.classList.toggle("active");
  document.querySelector("#menu-btn").setAttribute("aria-expanded", isActive);
  searchForm.classList.remove("active");
  cartItem.classList.remove("active");
};

// Botão da busca
document.querySelector("#search-btn").onclick = () => {
  searchForm.classList.toggle("active");
  navbar.classList.remove("active");
  cartItem.classList.remove("active");
  
  if (searchForm.classList.contains("active")) {
    searchForm.querySelector("input").focus(); // Foca no campo de busca
  }
};

// Botão do carrinho
document.querySelector("#cart-btn").onclick = () => {
  cartItem.classList.toggle("active");
  navbar.classList.remove("active");
  searchForm.classList.remove("active");
};

// Fecha todos os menus
function closeAllMenus() {
  navbar.classList.remove("active");
  searchForm.classList.remove("active");
  cartItem.classList.remove("active");
}

// Fecha todos os menus ao rolar a página
window.onscroll = () => {
  closeAllMenus();
};

// Fecha todos os menus ao clicar fora deles 
document.addEventListener("click", (e) => {
  const menuIsOpen = navbar.classList.contains("active") || 
                     searchForm.classList.contains("active") || 
                     cartItem.classList.contains("active");
  
  if (menuIsOpen && !e.target.closest('.header') && !e.target.closest('.cart-items-container') && !e.target.closest('.search-form')) {
    closeAllMenus();
  }
});
