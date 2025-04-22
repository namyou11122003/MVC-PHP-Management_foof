let foods = [];
let cart = [];
let currentCategory = "all";
let searchTerm = "";

document.addEventListener("DOMContentLoaded", function () {
  fetch("foods.json")
    .then((response) => {
      if (!response.ok) throw new Error("Network response was not ok");
      return response.json();
    })
    .then((data) => {
      foods = data;
      setUpCategoryButtons();
      displayFoodCards();
      updateCartCount();
    })
    .catch((error) => {
      console.error("Error loading food data:", error);
      const foodGrid = document.getElementById("foodGrid");
      foodGrid.innerHTML =
        "<p>Failed to load food items. Please try again later.</p>";
    });
});

// Set up category buttons
function setUpCategoryButtons() {
  const categoryButtons = document.querySelectorAll(".category-btn");
  categoryButtons.forEach((button) => {
    button.addEventListener("click", function () {
      categoryButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");
      currentCategory = this.getAttribute("data-category");
      filterItems();
    });
  });
}
// filter item 
function filterItems() {
  searchTerm = document.getElementById("searchInput").value.toLowerCase();
  displayFoodCards();
}
//  dislay card or product 
function displayFoodCards() {
  const foodGrid = document.getElementById("foodGrid");
  foodGrid.innerHTML = "";

  const filteredFoods = foods.filter((food) => {
    const matchesCategory =
      currentCategory === "all" || food.category === currentCategory;
    const matchesSearch = food.name.toLowerCase().includes(searchTerm);
    return matchesCategory && matchesSearch;
  });

  if (filteredFoods.length === 0) {
    const noResults = document.createElement("div");
    noResults.className = "no-results";
    noResults.textContent = "No items found matching your criteria.";
    foodGrid.appendChild(noResults);
    return;
  }

  filteredFoods.forEach((food) => {
    const foodCard = document.createElement("div");
    foodCard.className = "food-card";
    const categoryDisplay = food.category
      .split("-")
      .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
      .join(" ");

    foodCard.innerHTML = `
      <img src="${food.image}" alt="${food.name}" class="food-image">
      <div class="food-info">
          <div class="food-title">${food.name}</div>
          <div class="food-price">$${food.price.toFixed(2)}</div>
          <div class="food-category">${categoryDisplay}</div>
          <button class="add-to-cart" onclick="addToCart(${
            food.id
          })">Add to Cart</button>
      </div>
    `;
    foodGrid.appendChild(foodCard);
  });
}

function addToCart(foodId) {
  const food = foods.find((f) => f.id === foodId);
  if (food) {
    const existingItem = cart.find((item) => item.id === foodId);
    if (existingItem) {
      existingItem.quantity += 1;
    } else {
      cart.push({ ...food, quantity: 1 });
    }
    updateCartCount();
    showNotification(`Added ${food.name} to cart!`);
  }
}

function updateCartCount() {
  const cartCount = document.getElementById("cartCount");
  const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
  cartCount.textContent = totalItems;
}

function showNotification(message) {
  const notification = document.createElement("div");
  notification.textContent = message;
  notification.style.position = "fixed";
  notification.style.bottom = "20px";
  notification.style.right = "20px";
  notification.style.backgroundColor = "#2ecc71";
  notification.style.color = "white";
  notification.style.padding = "10px 20px";
  notification.style.borderRadius = "4px";
  notification.style.zIndex = "1001";
  document.body.appendChild(notification);

  setTimeout(() => {
    notification.style.opacity = "0";
    notification.style.transition = "opacity 0.5s ease";
    setTimeout(() => {
      document.body.removeChild(notification);
    }, 500);
  }, 2000);
}

function openCart() {
  const cartModal = document.getElementById("cartModal");
  cartModal.style.display = "flex";
  displayCartItems();
}

function closeCart() {
  const cartModal = document.getElementById("cartModal");
  cartModal.style.display = "none";
}

function displayCartItems() {
  const cartItems = document.getElementById("cartItems");
  const cartTotal = document.getElementById("cartTotal");
  cartItems.innerHTML = "";

  if (cart.length === 0) {
    cartItems.innerHTML = "<p>Your cart is empty.</p>";
    cartTotal.textContent = "Total: $0.00";
    return;
  }

  let total = 0;

  cart.forEach((item) => {
    const itemTotal = item.price * item.quantity;
    total += itemTotal;

    const cartItem = document.createElement("div");
    cartItem.className = "cart-item";
    cartItem.innerHTML = `
      <div>
          <strong>${item.name}</strong> x ${item.quantity}
      </div>
      <div>
          $${itemTotal.toFixed(2)}
          <button onclick="removeFromCart(${
            item.id
          })" style="margin-left: 10px; background: none; border: none; cursor: pointer;">🗑️</button>
      </div>
    `;
    cartItems.appendChild(cartItem);
  });

  cartTotal.textContent = `Total: $${total.toFixed(2)}`;
}

function removeFromCart(foodId) {
  const itemIndex = cart.findIndex((item) => item.id === foodId);
  if (itemIndex !== -1) {
    if (cart[itemIndex].quantity > 1) {
      cart[itemIndex].quantity -= 1;
    } else {
      cart.splice(itemIndex, 1);
    }
    updateCartCount();
    displayCartItems();
  }
}

function checkout() {
  if (cart.length === 0) {
    alert("Your cart is empty!");
    return;
  }
  alert("Thank you for your order! Your food will be prepared shortly.");
  cart = [];
  updateCartCount();
  closeCart();
}
