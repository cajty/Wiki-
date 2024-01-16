

<style>
    @media screen and (max-width: 765px) {
        #sticky {
            display: flex;
            width: 100%;
            gap: 20px;
            z-index: 100;
            background-color: white;
            height: 200px;
            margin-top: -110px;
        }
    }
</style>


<div class="container ">
    <div class="row mt-4">
        <div class="col-md-3 " id="sticky">
            <div>
                <input type="text" id="searchInput" oninput="search()" placeholder="Search">
            </div>

          
           
        </div>
        <div class="col-md-9 ">

        <div id="wikisforuser">

        </div>

           



    <script>
        function search() {

            let input = document.getElementById("searchInput").value;
            let url = `?uri=accu/searchtwo&search=${input}`;

            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("wikisforuser").innerHTML = xml.responseText;
                }
            };
            xml.open("GET", url, true);
            xml.send();

        }


        function searchByCategory(id) {
            let url = `?uri=wiki/searchByCategory&category=${id}`;

            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("wikisforuser").innerHTML = xml.responseText;
                }
            };
            xml.open("GET", url, true);
            xml.send();
        }

        function searchByTag(id) {
            let url = `?uri=wiki/searchByTag&tag=${id}`;

            let xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("wikisforuser").innerHTML = xml.responseText;
                }
            };
            xml.open("GET", url, true);
            xml.send();
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>