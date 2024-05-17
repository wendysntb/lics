<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="createModalLabel">Nova Licitação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{('/create')}}">
        <div class="modal-body">
          
          @csrf
            <div class="row mt-3">
            
              <div class="col">
                <label for="nu_fase" class="form-label">Fase</label>
                <select class="form-select" aria-label="Fase" name="nu_fase" id="nu_fase">
                  <option selected>Selecione</option>
                  <option value="-1">Em Edição</option>
                  <option value="1">Processada</option>
                  <option value="0">Descartada</option>
                </select>
              </div>
              
              <div class="col">
                <label for="nu_edital" class="form-label">Edital</label>
                <input type="text" name="nu_edital" class="form-control" id="nu_edital" placeholder="Edital">
              </div>

              <div class="col">
                <label for="data_abertura">Data de Abertura</label>
                <input id="data_abertura" name="data_abertura" class="form-control" type="date">
              </div>
            </div> 
            
            <div class="row mt-3">
              <div class="col">
                <label for="modalidade" class="form-label">Modalidade</label>
                <textarea class="form-control overflow-auto" name="modalidade" id="modalidade" rows="4" maxlength="255"></textarea>
              </div>
          
              <div class="col">
                <label for="nome_licitador" class="form-label">Licitador</label>
                <textarea class="form-control overflow-auto" name="nome_licitador" id="nome_licitador" rows="4" maxlength="512"></textarea>
              </div>
            </div>
            
            <div class="row mt-3">
              <div class="col">
                <label for="cnpj_licitador" class="form-label">CNPJ Licitador</label>
                <input type="text" class="form-control" name="cnpj_licitador" id="cnpj_licitador" placeholder="CNPJ">
              </div>

              <div class="col">
                <label for="prioridade" class="form-label">Prioridade</label>
                <input type="number" class="form-control" name="prioridade" id="prioridade" maxlength="3200" placeholder="prioridade">
              </div>

              <div class="col">
                <label for="objeto" class="form-label">Objeto</label>
                <input type="text" class="form-control" name="objeto" id="objeto" maxlength="3200" placeholder="objeto">
              </div>
            </div>  
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div> 
      </form>
      @if($create = session('create'))
        <script>    
          Swal.fire(
            'Sucesso!',
            '{{ $create }}',
            'success'
          ).then((result) => {
              if (result.isConfirmed) {
                window.location = "/";
              }
          });
        </script>
      @endif
    </div>
  </div>
</div>