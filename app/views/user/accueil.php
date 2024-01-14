
    <div class="container-fluid">
        <div class="row">
            <div class="p-4">
                <h1 class="mb-4">Dashboard</h1>
                <div class="row">
                    <?php foreach ($r as $row) { ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row->title ?> </h5>
                                            <p class="card-text"><?= $row->content ?></p>
                                            <a class='btn btn-outline-dark' href="#<?= $row->id ?>" ">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
  