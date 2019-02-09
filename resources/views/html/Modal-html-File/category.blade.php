
  
  <!-- Modal -->
  <div class="modal fade modal-form" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" data-toogle="validator">
            @csrf {{ method_field('POST') }}
            <div class="form-group">
                <label for="Categorie_nam">Categorie Name</label>
                <input type="text" class="form-control" name="categorie_name" id="categorie_name" aria-describedby="Categorie_nam" placeholder="Enter Category">
                
              </div>
              
              <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" id="status">
                  <option value=""></option>
                  <option value="active">active</option>
                  <option class="inactive">inactive</option>
                  
                </select>
              </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary insert_btn"  id="insert_btn"></button>
          
        </form>
        </div>
    
      </div>
    </div>
  </div>
  