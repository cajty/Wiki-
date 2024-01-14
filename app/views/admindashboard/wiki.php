
            <div class="col-md-9 p-4">
                <h1 class="mb-4">Wiki </h1>
                <h2>FOR visibility IF 1 visible and 0 invisible </h2>
                <div class="row">
                    <?php foreach ( $w as $row) { ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row->title  ?>  <br> visibility:<?=$row->visibility?> </h5>
                                            <p class="card-text"><?= $row->content ?></p>
                                            <a class='btn btn-primary btn-sm' href="http://localhost/Wiki-/public/Admin/visible/<?= $row->id ?>" ">Visible</a>
                                            <a class='btn btn-warning btn-sm' href="http://localhost/Wiki-/public/Admin/invisible/<?= $row->id ?>" ">Invisible</a>
                                            <a class='btn btn-danger btn-sm' href="http://localhost/Wiki-/public/Admin/deleteWiki/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
