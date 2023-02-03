const rangeWidth = document.getElementById('range-width');
const rangeHeight = document.getElementById('range-height');
const rangeRadius = document.getElementById('range-radius');
const inputWidth = document.getElementById('input-width');
const inputHeight = document.getElementById('input-height');
const inputRadius = document.getElementById('input-radius');

const insertWidth = (event) => {
    inputWidth.value = event.target.value;
}

const insertHeight = (event) => {
    inputHeight.value = event.target.value;
}
const insertRadius = (event) => {
    inputRadius.value = event.target.value;
}

if (rangeWidth) rangeWidth.addEventListener('change', insertWidth)
if (rangeHeight) rangeHeight.addEventListener('change', insertHeight)
if (rangeRadius) rangeRadius.addEventListener('change', insertRadius)