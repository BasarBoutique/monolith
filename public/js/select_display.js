function showSelect(id){
    var x = document.getElementById(id+'_data');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}