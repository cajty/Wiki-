<div class="container mt-5">
   
    
    <div class="d-grid gap-2 col-6 mx-auto">
    <button type="button" class="  btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add wiki
    </button>
  
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Fill in the Details:</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="http://localhost/Wiki-/public/Auteur/createWiki" method="POST">
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
                            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter the title" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="11" placeholder="Enter the content" required></textarea>
                        </div>
                        <button type="submit" name="submit" value="wikeCreat" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



