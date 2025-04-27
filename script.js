// Global cart array (you can expand this later)
let cart = [];

const container = document.querySelector(".container-card");
const numberCart = document.querySelector(".number-cart");
const totalPayment = document.getElementById("totalPayment");

// increase quantity
function increaseQuantity(e) {
  let parent = e.parentElement;
  let quantityValue = parent.querySelector(".quantity-value");
  let price = parent.parentElement.querySelector(".product-price").innerText;
  quantityValue.innerText = parseInt(quantityValue.textContent) + 1;
  totalPayment.innerHTML = parseInt(totalPayment.textContent) + parseInt(price);
}
// end increase quantity

//  start decrease quantity
function decrease(e) {
  let parent = e.parentElement;
  let quantityValue = parent.querySelector(".quantity-value");
  let price = parent.parentElement.querySelector(".product-price").innerText;
  quantityValue.innerText = parseInt(quantityValue.textContent) - 1;
  totalPayment.innerHTML = parseInt(totalPayment.textContent) - parseInt(price);
}

document.addEventListener("DOMContentLoaded", () => {
  // Fetch products and render them
  fetching().then(() => {
    attachCartEventListeners();
  });

  function attachCartEventListeners() {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
    addToCartButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        const productCard = e.target.closest(".cart-product");
        if (!productCard) return;
        const productId = productCard.dataset.id;
        const productName =
          productCard.querySelector(".card-title").textContent;
        const productPrice = productCard
          .querySelector(".price")
          .textContent.replace("៛", "")
          .trim();
        const productImage = productCard.querySelector(".img").src;
        addTocart(productName, productPrice, productImage);
      });
    });
  }
  // Function to add a new item to the cart UI
  function addTocart(product_name, product_price, product_image) {
    const cartItem = document.getElementById("cardItem");
    const item = `  
     <div class="card-item d-flex justify-content-between align-items-center mb-3">
        <img src="${product_image}" alt="Product Image" class="img-fluid" style="width: 50px; height: 50px;">
        <div class="product-details d-flex gap-3 fs-6 align-items-center mt-2">
          <p class="product-name text">${product_name}</p>
          <p class="product-price">${product_price}៛</p>
          <input type="hidden" class="product-id" value="${product_price}">
        </div>
        <div class="quantity d-flex align-items-center gap-2">
          <button class="btn btn-secondary btn-sm btn-decrease" onclick="decrease(this)">-</button>
          <span class="quantity-value">1</span>
          <button class="btn btn-secondary btn-sm btn-increase" onclick="increaseQuantity(this)" >+</button>
          <button class="btn btn-close" onclick="removeItem()"></button>
        </div>
      </div>`;
    numberCart.innerText = parseInt(numberCart.textContent) + 1;
    cartItem.innerHTML += item;
    totalPayment.innerHTML =
      parseInt(totalPayment.textContent) + parseInt(product_price);
  }
});


//  remove item from cart 
function removeItem() {
  const removeButtons = document.querySelectorAll(".btn-close");
  removeButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
      const cartItem = e.target.closest(".card-item");
      if (cartItem) {
        const productPrice = parseInt(
          cartItem.querySelector(".product-price").textContent.replace("៛", "")
        );
        const quantityValue = parseInt(
          cartItem.querySelector(".quantity-value").textContent
        );
        totalPayment.innerHTML =
          parseInt(totalPayment.textContent) - productPrice * quantityValue;
        numberCart.innerText = parseInt(numberCart.textContent) - 1;
        cartItem.remove();
      }
    });
  });
}
// end remove item from cart

// Fetch products from your JSON data
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

// Render products along with data attributes for cart operations
function displayProduct(data) {
  container.innerHTML =
    data.length > 0
      ? data
          .map(
            ({
              product_id,
              product_name,
              product_price,
              product_image,
              category,
            }) => {
              return `
         <div class="col cart-product" data-id="${product_id}">
            <div class="card menu-card border-0 shadow-sm">
              <img src="./views/components/product/${product_image}" class="img" alt="${product_name}" />
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">${product_name}</h5>
                <p class="price mb-1">${product_price} ៛</p>
                <span class="category-badge mb-3">${category}</span>
                <button class="btn add-to-cart-btn text-white mt-auto w-100 bg-primary">Add to Cart</button>
              </div>
            </div>
         </div>`;
            }
          )
          .join("")
      : "<h2 class='w-100 mb-lg-5 text-center text-break'>There are no products available.</h2>";
}

// Render category buttons
function displaybutton(data) {
  const buttonContainer = document.querySelector(".btn-container");
  const buttons = ["All", ...new Set(data.map((item) => item.category))];
  buttonContainer.innerHTML = buttons
    .map((b) => `<button class="btn-category" data-id="${b}">${b}</button>`)
    .join("");

  const allButtons = document.querySelectorAll(".btn-category");
  allButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const inputSearchElem = document.getElementById("searchInput");
      inputSearchElem.value = "";
      const category = this.dataset.id;
      const filterData =
        category === "All"
          ? data
          : data.filter((item) => item.category === category);
      displayProduct(filterData);
      // Reattach cart event listeners after re-rendering products
      attachCartEventListeners();
    });
  });
}

// Search filter for products (unchanged)
function searchfilter(data) {
  const inputSearchElem = document.getElementById("searchInput");
  inputSearchElem.addEventListener("keyup", () => {
    const query = inputSearchElem.value.toLowerCase();
    const filterArray = data.filter((item) =>
      item.product_name.toLowerCase().includes(query)
    );
    displayProduct(filterArray);
    attachCartEventListeners();
  });
}

// Helper: Reattach cart event listeners after product re-rendering.
// function attachCartEventListeners() {
//   const addToCartButtons = document.querySelectorAll(".add-to-cart-btn");
//   addToCartButtons.forEach((button) => {
//     button.addEventListener("click", (e) => {
//       const productCard = e.target.closest(".cart-product");
//       if (!productCard) return;
//       const productName = productCard.querySelector(".card-title").textContent;
//       const productPrice = productCard.querySelector(".price").textContent;
//       const productImage = productCard.querySelector(".img").src;
//       addTocart(productName, productPrice, productImage);
//     });
//   });
// }

// menu plural
const menuModerm = document.querySelector(".menu-modern");
// import * as img from "./img/promo-3.png";
const data = [
  {
    id: 1,
    tittle: "Checken",
    des: "  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident quisquam dolores?",
    img: "./img/food-menu-1.png",
  },

  {
    id: 2,
    tittle: "Checken",
    des: "  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident quisquam dolores?",
    img: "./img/promo-3.png",
  },

  {
    id: 3,
    tittle: "Checken",
    des: "  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident quisquam dolores?",
    img: "./img/promo-4.png",
  },

  {
    id: 4,
    tittle: "Checken",
    des: "  Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia provident quisquam dolores?",
    img: "./img/promo-5.png",
  },
];

const modern = data
  .map(({ tittle, des, img }) => {
    return `  <article class="food-modern">
        <h3 class="promot">${tittle}</h3>
        <p class="txt mg-top">
        ${des}
        </p>
        <div class="image">
          <img src="${img}" alt="modern" />
        </div>
      </article>`;
  })
  .join("");

menuModerm.innerHTML = modern;
