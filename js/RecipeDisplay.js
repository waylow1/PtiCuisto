class RecipeDisplay {
  constructor(tab) {
    this.tab = tab;
  }

  DisplayForAllRecipes(format) {

    const container = document.getElementById("container");

    this.tab.forEach((element, index) => {
      const recipeContainer = document.createElement("div");
      recipeContainer.className = "collection-item mx-auto";
      recipeContainer.setAttribute("data-bs-toggle", "modal");
      recipeContainer.setAttribute("data-bs-target", `#collectionModal${index}`);

      //tag color selection
      let tag_color;
      if (element.CA_TITLE == "Entrée") {
        tag_color = "bg-success";
      }
      else if (element.CA_TITLE == "Plat") {
        tag_color = "bg-warning";
      }
      else {
        tag_color = "bg-danger";
      }

      //card color selection
      let card_color;
      if (index % 2 == 0) {
        card_color = "bg-warning";
      }
      else {
        card_color = "bg-secondary";
      }

      let formating = "";
      if(format) {
        formating = "repice-card";
      }

      recipeContainer.innerHTML = `
    <div class="container mx-5 my-2">
      <div class="d-flex flex-row p-3 ${card_color} text-white rounded ${formating}">
        <div class="justify-content-center mr-3">
          <input class="form-check form-check-input" type="radio" name="radioRecipes[]" value="' . $recipes['RE_ID'] .'">
        </div>
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
                            <p class="mb-2">${element.RE_SUMMARY}</p> <!-- Ajout du paragraphe de description -->
                            <br>
                            <br>
                            <p class="mb-4 text-black">${element.RE_CONTENT}</p>
                            <button class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="fas fa-xmark fa-fw"></i>
                                Fermer
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
