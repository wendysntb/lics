@foreach($lics as $lic)
<div class="modal fade" id="showModal{{$lic->id}}" tabindex="-1" aria-labelledby="showModalLabel{{$lic->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="showModalLabel{{$lic->id}}">Licitação</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{ csrf_field() }}
        <div class="row">
            <div class="col">
                <label for="id" class="form-label">Id</label>
                <input type="text" name="id" id="id" value="{{$lic->id}}" class="form-control" disabled/>
            </div>
            <div class="col">
                <label for="nu_fase" class="form-label">Fase</label>
                <select class="form-select" aria-label="Fase" name="nu_fase" id="nu_fase" disabled>
                    @switch($lic->nu_fase)
                    @case(-1)
                        <option value="-1" selected>Em Edição</option>
                        @break
                    @case(1)
                        <option value="1"selected>Processada</option>
                        @break
                    @case(0)
                        <option value="0" selected>Descartada</option>
                    @endswitch
                </select>
            </div>
            
            <div class="col">
                <label for="nu_edital" class="form-label">Edital</label>
                <input type="text" value="{{$lic->nu_edital}}" name="nu_edital" class="form-control" placeholder="Edital" disabled>
            </div>
            <div class="col">
                <label for=" data_abertura" class="form-label">Data de Abertura</label>
                <input id="data_abertura" name="data_abertura" value="{{ Carbon\Carbon::parse($lic->data_abertura)->format('Y-m-d')}}" class="form-control" type="date" disabled>  
            </div> 
        </div> 
         
        <div class="row mt-3">
            <div class="col">
                <label for="modalidade" class="form-label">Modalidade</label>
                <textarea class="form-control overflow-auto"  name="modalidade" rows="4" maxlength="255" disabled>{{$lic->modalidade}}</textarea>
            </div>
        
            <div class="col">
                <label for="nome_licitador" class="form-label">Licitador</label>
                <textarea class="form-control overflow-auto" name="nome_licitador"  rows="4" maxlength="512" disabled>{{$lic->nome_licitador}}</textarea>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col">
                <label for="cnpj_licitador" class="form-label">CNPJ do Licitador</label>
                <input type="text" class="form-control" value="{{$lic->cnpj_licitador}}" name="cnpj_licitador" placeholder="CNPJ" disabled>
            </div>
            <div class="col">
                <label for="prioridade" class="form-label">Prioridade</label>
                <input type="number" class="form-control" value="{{$lic->prioridade}}" name="prioridade" maxlength="3200" placeholder="prioridade" disabled>
            </div>
            <div class="col">
                <label for="objeto" class="form-label">Objeto</label>
                <input type="text" class="form-control" value="{{$lic->objeto}}" name="objeto" maxlength="3200" placeholder="objeto" disabled>
            </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  id="btncloseshow"data-bs-dismiss="modal">Fechar</button>
      </div> 
    </div>
  </div>
</div>
@endforeach