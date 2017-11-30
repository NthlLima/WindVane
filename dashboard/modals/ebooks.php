<div class="modal fade" id="modalEbooks" tabindex="-1" role="dialog" aria-labelledby="modalEbooksLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-title">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <h4 class="modal-title">Adicionar E-book</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" class="form-control" id="ebook-Name" placeholder="Nome" required="required">
            <form id="upload-PDF" class="label-file">
              <input type="text" name="ebook-namePDF" id="ebook-namePDF" required="required" hidden="hidden">
              <input type="text" name="ebook-PDF" id="ebook-PDF" required="required" hidden="hidden">
              <input type="file" name="arquivo" id="arquivo" hidden="hidden">
              <label id="uploading-pdf" for="arquivo"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span>Carregar PDF</span></label>
            </form>
            <form id="upload-IMG" class="label-file">
              <input type="text" name="ebook-img" id="ebook-img" required="required" hidden="hidden">
              <input type="file" name="img" id="img" hidden="hidden">
              <label id="uploading-img" for="img"><i class="fa fa-camera" aria-hidden="true"></i> <span>Carregar Imagem</span></label>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-jftv" id="btnNewEbook">Adicionar</button>
      </div>
    </div>
  </div>
</div>
<div class="wrapper-alert">
</div>