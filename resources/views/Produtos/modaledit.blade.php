<!-- Edit Modal -->
<div class="modal fade" id="editarprodutosmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Editar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
          <form  method="POST" action="{{route('produtos.update')}}" id="editarprodutoform">
            {!! csrf_field() !!}
                  <input type="hidden" name="id" id="id_update" value="" >
                  <label>Categoria</label><br>
                  <input type="text" name="letra_numero" id="letra_numero_update" value="" class="form-control"><br>
                  <label>Nome</label><br>
                  <input type="text" name="nome" id="nome_update" value="" class="form-control" required><br>
                  <label for="tipos_id">Tipos</label><br>
                  <select name="tipos_id" id="tipos_id_update" class="form-control">
                    <option value="">Selecione o tipo</option>
                    @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}"> {{ $tipo->tiponome }}</option>
                    @endforeach
                  </select><br>
                  <label>Preço de Compra</label><br>
                  <input type="number" name="preco_compra" id="preco_compra_update" value="" class="form-control" step="0.01"><br>
                  <label>Preço Estimado de Venda</label><br>
                  <input type="number" name="preco_venda" id="preco_venda_update" value="" class="form-control" step="0.01"><br>
                  <label>Estoque</label><br>
                  <input type="number" name="estoque" id="estoque_update" value="" class="form-control"><br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Salvar alterações</button>
                </div>
          </form>
        </div>
    </div>
  </div>
</div>

