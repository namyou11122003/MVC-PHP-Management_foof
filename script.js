const container = document.querySelector(".container-card");
document.addEventListener("DOMContentLoaded", () => {
  fetching();
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
// callback fucntion using and fetch data from database using my sqli it's json file
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
         <div class="col">
                <div class="card menu-card border-0 shadow-sm">
                    <img src="./views/components/product/${product_image}" class="img" alt="${product_name}" />
                    <div class="card-body">
                        <h5 class="card-title">${product_name}</h5>
                        <p class="price mb-1">${product_price}៛</p>
                        <span class="category-badge mb-3">${category}</span>
                        <button class="btn add-to-cart-btn text-white mt-auto w-100 bg-primary">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>`;
            }
          )
          .join("")
      : "<h5 class='w-100 text-center text-break'>There are no sach food</h5>";
}
// display button
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
      const inputSearchElem = document.getElementById("searchInput");
      inputSearchElem.value = "";
      const category = this.dataset.id;
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
    const query = inputSearchElem.value.toLowerCase();
    const filterArray = data.filter((item) => {
      return item.product_name.toLowerCase().includes(query);
    });
    // For example, update the UI:
    displayProduct(filterArray);
  });
}

