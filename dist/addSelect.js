const addItemButton = document.querySelector("#addItem");
const removeItemButton = document.querySelector("#removeItem");
const itemsDiv = document.querySelector("#items");

const numberItems = document.querySelector("#nmr");

addItemButton.addEventListener('click', addSelectInput);
removeItemButton.addEventListener('click', removeLastSelect);

function addSelectInput() {
  let lastSelect = itemsDiv.lastElementChild.name;
  let nextSelectElement = itemsDiv.lastElementChild.cloneNode(true);

  nextSelectElement.setAttribute('name', Number(lastSelect) + 1);

  itemsDiv.appendChild(nextSelectElement);
  numberItems.setAttribute('value', Number(lastSelect) + 1);
}
function removeLastSelect() {
  let lastSelect = itemsDiv.lastElementChild;
  let lastSelectName = Number(itemsDiv.lastElementChild.name);

  if (lastSelectName > 1) {
    itemsDiv.removeChild(lastSelect);
    numberItems.setAttribute('value', lastSelectName - 1);
  }
}
