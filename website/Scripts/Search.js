function init()
{
    let input = document.getElementById("cost");
    document.getElementById("cost_label").innerHTML="Max Price: $"+ input.value;
    input.addEventListener('change', function () {
        document.getElementById("cost_label").innerHTML="Max Price: $"+ input.value;
    });
}

init();