<div class="col-md-9 p-4">
    <h1 class="mb-4">Wiki </h1>
    <h2>FOR visibility IF 1 visible and 0 invisible </h2>
    <div class="row">
        <?php foreach ($w as $row) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $row->title  ?> <br> visibility:<?= $row->visibility ?> </h5>
                        <p class="card-text"><?= $row->content ?></p>

                        <button class='btn btn-primary btn-sm' data-bs-toggle="modal" data-bs-target="#update<?= $row->id ?>">Update</button>
                        <a class='btn btn-danger btn-sm' href="http://localhost/Wiki-/public/Auteur/deleteWiki/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="update<?= $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Tag</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="http://localhost/Wiki-/public/Auteur/updateWiki/<?= $row->id ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Category</label>
                                        <select class="form-select" name="selectCategorie" id="exampleFormControlSelect1">
                                            <?php foreach ($r as $row) { ?>
                                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <div class="row">
                                            <?php foreach ($t as $row) { ?>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="<?= $row->id; ?>" name="selectTag[]" value="<?= $row->id; ?>">
                                                        <label class="form-check-label" for="<?= $row->name; ?>"><?= $row->name; ?></label>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1"  required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="11" placeholder="" required></textarea>
                                    </div>
                                    <button type="submit" name="submit" value="upWike" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
