const container = document.querySelector(".container");
// // const foodGrid = document.getElementById("foodGrid");
window.addEventListener("DOMContentLoaded", () => {
  fetch();
});

async function fetching() {
  try {
    const res = await fetch("products.json");
    const data = await res.json();
    displayProduct(data);
    displaybutton(data);
    searchfilter(data);
  } catch (error) {
    console.log(error);
  }
}

// Example modified displayProduct function:
function displayProduct(data) {
  const container = document.querySelector(".container-card");
  container.innerHTML = data
    .map(
      ({
        product_id,
        product_name,
        product_price,
        product_image,
        category,
      }) => {
        return `
        <div class="product-card">
          <img src="${product_image}" alt="${product_name}">
          <h2>${product_name}</h2>
          <p>Price: $${product_price}</p>
          <p>Category: ${category}</p>
          <button class="add-to-cart" 
            data-id="${product_id}" 
            data-name="${product_name}" 
            data-price="${product_price}" 
            data-image="${product_image}">
            Add to Cart
          </button>
        </div>`;
      }
    )
    .join("");
}

// Use event delegation to listen for Add to Cart clicks:
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("add-to-cart")) {
    addToCart(e.target.dataset);
  }
});
// The addToCart function stores products into localStorage:
function addToCart(productData) {
  // Retrieve current cart from localStorage, defaulting to an empty array:
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // Check if product already in cart (by product id)
  let existingProduct = cart.find((item) => item.product_id === productData.id);

  if (existingProduct) {
    // Increase quantity if product exists:
    existingProduct.quantity = (existingProduct.quantity || 1) + 1;
  } else {
    // Add new product to cart with quantity 1:
    cart.push({
      product_id: productData.id,
      product_name: productData.name,
      product_price: productData.price,
      product_image: productData.image,
      quantity: 1,
    });
  }

  // Save updated cart back into localStorage:
  localStorage.setItem("cart", JSON.stringify(cart));
  alert("Product added to cart!");
}
function displaybutton(data) {
  const buttonContainer = document.querySelector(".btn-container");
  const buttons = ["All", ...new Set(data.map((item) => item.category))];
  buttonContainer.innerHTML = buttons
    .map((b) => {
      return `<button class="btn-category" data-id="${b}">${b}</button>`;
    })
    .join("");
  const allButtons = document.querySelectorAll(".btn-category");
  allButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.dataset.id;
      // If 'All' is selected, show all products, otherwise filter
      const filtercategory =
        category === "All"
          ? data
          : data.filter((item) => item.category === category);
      displayProduct(filtercategory);
    });
  });
}

function searchfilter(data) {
  const inputSearchElem = document.getElementById("searchInput");
  inputSearchElem.addEventListener("keyup", () => {
    const query = inputSearchElem.value;
    const filterArray = data.filter((item) => {
      return item.product_name.includes(query);
    });
    // For example, update the UI:
    displayProduct(filterArray);
  });
}

// const AddTo= document.querySelector(".card");
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("add-to-cart")) {
    addToCart(e.target.dataset);
  }
});
// The function that adds the product to the cart, stored in localStorage:
function addToCart(productData) {
  // Retrieve current cart from localStorage (or default to an empty array)
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  // Check if the item is already in the cart (you can compare by product_id)
  let existingProduct = cart.find((item) => item.product_id === productData.id);

  if (existingProduct) {
    // Increase the quantity if already exists
    existingProduct.quantity = (existingProduct.quantity || 1) + 1;
  } else {
    // Add new product object, with a quantity of 1
    cart.push({
      product_id: productData.id,
      product_name: productData.name,
      product_price: productData.price,
      product_image: productData.image,
      quantity: 1,
    });
  }

  // Save the updated cart back to localStorage
  localStorage.setItem("cart", JSON.stringify(cart));
  alert("Product added to cart!");
}
