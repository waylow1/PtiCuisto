class RecipeDisplay {
  constructor(tab) {
    this.tab = tab;
  }

  DisplayForAllRecipes() {
    const container = document.getElementById("container");

    this.tab.forEach((element, index) => {
      const divTitle = document.createElement("div");
      divTitle.textContent = element.RE_TITLE;
      divTitle.id = "titleDiv" + index;
      container.appendChild(divTitle);

      const divSummary = document.createElement("div");
      divSummary.textContent = element.RE_SUMMARY;
      divSummary.id = "summaryDiv" + index;
      container.appendChild(divSummary);

      const divContent = document.createElement("div");
      divContent.textContent = element.RE_CONTENT;
      divContent.id = "contentDiv" + index;
      container.appendChild(divContent);

      const divImage = document.createElement("div");
      const image = document.createElement("img");
      divImage.id = "imageDiv" + index;
      image.src = "../assets/dish/" + element.RE_IMAGE;
      divImage.appendChild(image);
      container.appendChild(divImage);
    });
  }
}
