
            <?php foreach ($searchResults as $row) { ?>
                <div class="col-md-4">
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
                