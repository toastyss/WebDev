function init()
{
    let input = document.getElementById("quantity_selector");
    let price = document.getElementById("price");
    input.value = 1;
    input.addEventListener('input', function () {
        console.log(input.value);
        document.getElementById("item_cost").innerHTML="$"+ input.value * price.innerHTML;
    });
}

init();