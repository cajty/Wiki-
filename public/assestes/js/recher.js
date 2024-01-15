function searchadmincategory() {
    let input = document.getElementById("searchInput").value;
    let url = `?uri=category/search&search=${encodeURIComponent(input)}`;

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("category").innerHTML = xml.responseText;
        }
    };
    xml.open("GET", url, true);
    xml.send();

}




function searchadmintag() {     
    let input = document.getElementById("searchInput").value;
    let url = `?uri=tag/search&search=${encodeURIComponent(input)}`;

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tag").innerHTML = xml.responseText;
        }
    };
    xml.open("GET", url, true);
    xml.send();

}