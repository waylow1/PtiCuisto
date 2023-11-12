class RecipeDisplay {
  // Constructor to initialize the RecipeDisplay object with a tab parameter
  constructor(tab) {
    this.tab = tab;
  }

  // Method to display recipes for all recipes in the tab
  DisplayForAllRecipes() {
    // Get the container element by ID
    const container = document.getElementById("container");

    // Iterate through each element in the tab
    this.tab.forEach((element, index) => {
      // Create a new recipe container element
      const recipeContainer = document.createElement("div");
      // Set class and attributes for modal
      recipeContainer.className = "collection-item mx-auto";
      recipeContainer.setAttribute("data-bs-toggle", "modal");
      recipeContainer.setAttribute("data-bs-target", `#collectionModal${index}`);

      // Determine tag color based on category title
      let tag_color;
      if (element.CA_TITLE == "Entrée") {
        tag_color = "bg-success";
      } else if (element.CA_TITLE == "Plat") {
        tag_color = "bg-warning";
      } else {
        tag_color = "bg-danger";
      }

      // Determine card color based on index
      let card_color;
      if (index % 2 == 0) {
        card_color = "bg-warning";
      } else {
        card_color = "bg-secondary";
      }

      // Set inner HTML for recipe container
      recipeContainer.innerHTML = `
        <div class="container mx-5 my-2">
          <div class="d-flex flex-row p-3 ${card_color} text-white rounded">
            <img class="img recipe-image smaller-image rounded" alt="Recipe Image" src="../assets/dish/${element.RE_IMAGE}"/>
            <div class="d-flex flex-column px-3">
              <div class="p-2"><h3>${element.RE_TITLE}</h3></div>
              <div class="d-flex flex-column" style="width: min-content;">
                <div class="align-items-center rounded ${tag_color} style="width: min-content;">
                  <p class="fw-bold m-2"> ${element.CA_TITLE} </p>
                </div>
              </div>
              <div class="p-2">${element.RE_SUMMARY}</div>
            </div>
          </div>
        </div>
      `;

      // Set recipe image source
      const recipeImage = recipeContainer.querySelector(".recipe-image");
      recipeImage.src = "../assets/dish/" + element.RE_IMAGE;

      // Append recipe container to the main container
      container.appendChild(recipeContainer);

      // Create a new recipe modal element
      const recipeModal = document.createElement("div");
      // Set class, ID, and attributes for modal
      recipeModal.className = "collection-modal modal fade";
      recipeModal.id = `collectionModal${index}`;
      recipeModal.tabIndex = -1;
      recipeModal.setAttribute("aria-labelledby", `collectionModal${index}`);
      recipeModal.setAttribute("aria-hidden", "true");

      // Set inner HTML for recipe modal
      recipeModal.innerHTML = `
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header border-0">
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pb-5">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-lg-8">
                    <h2 class="collection-modal-title text-secondary text-uppercase mb-0">${element.RE_TITLE}</h2>
                    <div class="divider-custom">
                      <div class="divider-custom-line"></div>
                      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                      <div class="divider-custom-line"></div>
                    </div>
                    <img class="img-fluid rounded mb-5" src="../assets/dish/${element.RE_IMAGE}" alt="Recipe Image" />
                    <p class="mb-2">${element.RE_SUMMARY}</p> <!-- Added description paragraph -->
                    <br>
                    <br>
                    <p class="mb-4 text-black">${element.RE_CONTENT}</p>
                    <button class="btn btn-primary" data-bs-dismiss="modal">
                      <i class="fas fa-xmark fa-fw"></i>
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;

      // Append recipe modal to the document body
      document.body.appendChild(recipeModal);
    });
  }
}