const md1 = document.getElementById("md1");
const md2 = document.getElementById("md2");
const md3 = document.getElementById("md3");

const modal1 = document.getElementById("filterModal1");
const modal2 = document.getElementById("filterModal2");
const modal3 = document.getElementById("filterModal3");

const modalTitle1 = document.getElementById("filterModalLabel1");
const modalTitle2 = document.getElementById("filterModalLabel2");
const modalTitle3 = document.getElementById("filterModalLabel3");

const category = document.getElementById("Category");
const title = document.getElementById("Title");
const ingredients = document.getElementById("Ingredients");


var recipeInputStartDish = document.getElementById("recipeInputStartDish");
  var recipeInputDish = document.getElementById("recipeInputDish");
  var recipeInputDessert = document.getElementById("recipeInputDessert");


  console.log(AllRecipes);

  recipeInputStartDish.addEventListener("click", function () {
    filterRecipesByCategoryId([1, 2]);
  });

  recipeInputDish.addEventListener("click", function () {
    filterRecipesByCategoryId([3]);
  });

  recipeInputDessert.addEventListener("click", function () {
    filterRecipesByCategoryId([4]);
  });

  function filterRecipesByCategoryId(categoryIds) {
    var filteredRecipes = AllRecipes.filter(function (recipe) {
    return recipe.CA_ID['categoryIds']
  });

    displayFilteredRecipes(filteredRecipes);
    var bsModal = new bootstrap.Modal(modal1);
    bsModal.hide();
  }

  function displayFilteredRecipes(filteredRecipes) {
    console.log(filteredRecipes);
  }

var recipeInput = document.getElementById("recipeInput");
var recipeList = document.getElementById("recipeListForTitle");

AllRecipes.forEach(function (recipe) {
  var option = document.createElement("option");
  option.value = recipe.RE_TITLE;
  recipeList.appendChild(option);
});


recipeInput.addEventListener("keydown", function (event) {
  if (event.key === "Enter" && recipeInput.value.trim() !== "") {
    var inputValue = recipeInput.value.toLowerCase();
    recipeInput.value = "";
    var isRecipeExists = AllRecipes.some(function (recipe) {
      return recipe.RE_TITLE.toLowerCase() === inputValue;
    });
  }
  if(isRecipeExists){
    recipeInput.value = "";
  }
});
