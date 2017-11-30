<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-title">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
          <h4 class="modal-title">Adicionar Usuário</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" class="form-control" id="inputUsername" placeholder="Nome" required="required">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required">
            <input type="password" class="form-control" id="inputPass" placeholder="Senha" required="required">
            <input type="password" class="form-control" id="inputRepPass" placeholder="Repetir Senha" required="required">
            <select id="selectFuncao" class="form-control" required="required">
              <option selected>Função</option>
              <option value="2">Administrador</option>
              <option value="3">Editor</option>
              <option value="4">Autor</option>
              <option value="5">Colaborador</option>
           </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-jftv" id="btnNewUser">Adicionar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditUsuarios" tabindex="-1" role="dialog" aria-labelledby="modalEditUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-title">
          <i class="fa fa-wrench" aria-hidden="true"></i>
          <h4 class="modal-title">Editar Usuário</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="inputEditUsername"  readonly="readonly">
        <input type="hidden" class="form-control" id="inputEditId">
        <select id="selectEditFuncao" class="form-control" required="required">
              <option selected>Função</option>
              <option value="2">Administrador</option>
              <option value="3">Editor</option>
              <option value="4">Autor</option>
              <option value="5">Colaborador</option>
           </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnExcluirUser">Excluir</button>
        <button type="button" class="btn btn-jftv" id="btnEditUser">Editar</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modalDeleteUsuarios" tabindex="-1" role="dialog" aria-labelledby="modalDeleteUsuariosLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-header-title">
          <i class="fa fa-question" aria-hidden="true"></i>
          <h4 class="modal-title">Excluir Usuário?</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnExcluirUserCancel">Cancelar</button>
        <button type="button" class="btn btn-jftv" id="btnDeleteUser">Sim</button>
      </div>
    </div>
  </div>
</div>

<div class="wrapper-alert">
</div>