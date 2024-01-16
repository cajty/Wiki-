<div class="container-fluid" <div class="p-4">
    <div class="container-fluid ">
        <h1 class="mb-4">wiki</h1>
        <div class="col-md-3 " id="sticky">
            <div  class="input-group">
                <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                <input type="text" id="searchInput" oninput="search()" placeholder="Search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
        <div class="row p-4" id="wikisforuser">
            <?php foreach ($r as $row) { ?>
                <div class="col-md-4" >
                    <div class="card m-2" style="width: 20rem;">
                        <img src="assestes/img/wiki.jfif" class="card-img-top" alt="wiki">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row->title ?> </h5>
                            <p class="card-text"><?= $row->content ?></p>
                            <a class='btn btn-outline-dark' href="http://localhost/Wiki-/Detail/edait/<?= $row->id ?>" ">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
             
    </div>
    <script>
        function search() {

            let input = document.getElementById("searchInput").value;
            let url = `?uri=Accueil/searchtwo&search=${input}`;

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
  