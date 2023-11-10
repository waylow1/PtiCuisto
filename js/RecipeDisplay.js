class RecipeDisplay {
  constructor(tab) {
    this.tab = tab;
  }

  DisplayForAllRecipes() {

    const container = document.getElementById("container");

this.tab.forEach((element, index) => {
  const recipeContainer = document.createElement("div");
  recipeContainer.className = "collection-item mx-auto";
  recipeContainer.setAttribute("data-bs-toggle", "modal");
  recipeContainer.setAttribute("data-bs-target", `#collectionModal${index}`);

  recipeContainer.innerHTML = `
    <div class="collection-item-caption d-flex align-items-center justify-content-center h-100 w-100">
      <div class="collection-item-caption-content text-center text-white"><i class="fas fa-plus fa-2x"></i></div>
    </div>
    <img class="img-fluid recipe-image smaller-image" alt="Recipe Image" />
  `;

  const recipeImage = recipeContainer.querySelector(".recipe-image");
  recipeImage.src = "../assets/dish/" + element.RE_IMAGE;

  container.appendChild(recipeContainer);

  // Ajout du code du modal
  const recipeModal = document.createElement("div");
  recipeModal.className = "collection-modal modal fade";
  recipeModal.id = `collectionModal${index}`;
  recipeModal.tabIndex = -1;
  recipeModal.setAttribute("aria-labelledby", `collectionModal${index}`);
  recipeModal.setAttribute("aria-hidden", "true");

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
                            <p class="mb-4">${element.RE_CONTENT}</p>
                            <button class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="fas fa-xmark fa-fw"></i>
                                Close Window
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  `;

  document.body.appendChild(recipeModal);
});

    


    

}
}
// const container = document.getElementById("container");

    // this.tab.forEach((element, index) => {
    //   const divTitle = document.createElement("div");
    //   divTitle.textContent = element.RE_TITLE;
    //   divTitle.id = "titleDiv" + index;
    //   container.appendChild(divTitle);

    //   const divSummary = document.createElement("div");
    //   divSummary.textContent = element.RE_SUMMARY;
    //   divSummary.id = "summaryDiv" + index;
    //   container.appendChild(divSummary);

    //   const divContent = document.createElement("div");
    //   divContent.textContent = element.RE_CONTENT;
    //   divContent.id = "contentDiv" + index;
    //   container.appendChild(divContent);

    //   const divImage = document.createElement("div");
    //   const image = document.createElement("img");
    //   divImage.id = "imageDiv" + index;
    //   image.src = "../assets/dish/" + element.RE_IMAGE;
    //   divImage.appendChild(image);
    //   container.appendChild(divImage);