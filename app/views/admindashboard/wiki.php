<div class="col-md-9 p-4">
    </nav>
    <h1 class="mb-4">Wiki </h1>
    <div class="row">
    <?php if (!empty($w)) { ?>
        <?php foreach ($w as $row) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                        <?= $row->title  ?> <br> visibility:<?= $row->visibility ?> </h5>
                        <a class='btn btn-outline-dark' href="http://localhost/Wiki-/Detail/edait/<?= $row->id ?>" ">Detail</a>
                        <?php if ( $row->visibility == 0) { ?>
                        <a class='btn btn-primary btn-sm' href="http://localhost/Wiki-/public/Admin/visible/<?= $row->id ?>" ">Visible</a>
                        <?php } ?>
                        <?php if ( $row->visibility == 1) { ?>
                        <a class='btn btn-warning btn-sm' href=" http://localhost/Wiki-/public/Admin/invisible/<?= $row->id ?>" ">Invisible</a>
                        <?php } ?>
                        <a class='btn btn-danger btn-sm' href=" http://localhost/Wiki-/public/Admin/deleteWiki/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php } ?>
    </div>
</div>
</div>
</div>