<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="modalCategoriasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-title">
          <i class="fa fa-tags" aria-hidden="true"></i>
          <h4 class="modal-title">Categorias</h4>
          <!-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> -->
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hove">
          <thead>
            <tr>
              <th scope="col">Título</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody id="table-list-category">
            <?php
              $list = list_category(0);
              foreach ($list as $cat) {
                echo '
                <tr>
                  <td>'.$cat["categoria"].'</td>
                  <td class="tab-link">'.$cat["delete"].'</td>
                </tr>';
              }

            ?>
          </tbody>
        </table>
        <div class="btn-group btn-group-sm float-right" role="group" aria-label="Pagination">
          <button type="button" class="btn btn-light" id="load_category_newer"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
          <button type="button" class="btn btn-light" id="load_category_older"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
      </div>
      <div class="modal-footer">
        <form class="form-inline" id="form-new-categoria">
          <input class="form-control mr-sm-1" type="text" id="categoria-nome" placeholder="Adicionar Categoria" aria-label="Adicionar Categoria">
          <button class="btn btn-jftv my-1 my-sm-0" type="submit">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="wrapper-alert">
</div>