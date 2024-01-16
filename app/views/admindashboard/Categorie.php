

  
            <div class="col-md-9 p-4">
                <h1 class="mb-4">Categorie</h1>
                <form action="http://localhost/Wiki-/public/Admin/creatCategories" method="POST">
                    <label for="name">Categorie Name:</label>
                    <input type="text" name="name" id="name">
                    <input type="submit" name="submit" value="creatCategories">
                </form>

                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($cat as $row) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $row->name ?>
                                        </h5>
                                        <button class='btn btn-primary btn-sm' data-bs-toggle="modal" data-bs-target="#update<?= $row->id ?>">Update</button>
                                        <a class='btn btn-danger btn-sm' href="http://localhost/Wiki-/public/Admin/deleteCategories/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="update<?= $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Categorie</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <form action="http://localhost/Wiki-/public/Admin/updateCategories/<?= $row->id ?>" method="POST">
                                                    <div class="mb-3">
                                                        <label for="categorie_name" class="form-label">Categorie Name:</label>
                                                        <input type="text" class="form-control" id="name" value="<?= $row->name ?>" name="mane" required>
                                                    </div>
                                                    <button type="submit" name="submit" value="creatCategories" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


          
