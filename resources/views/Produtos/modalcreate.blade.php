<!-- Add Modal -->
<div class="modal fade" id="adicionarprodutos" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="addnewModalLabel">Adicionar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
          <form action="{{ url('produtos/store') }}" method="post">
              {!! csrf_field() !!}
              <label>Categoria</label><br>
              <input type="text" name="letra_numero" id="letra_numero" class="form-control" placeholder="Inserir a categoria."><br>
              <label>Nome</label></br>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Inserir o nome do produto."><br>
              <label for="tipos_id">Tipos</label><br>
              <select name="tipos_id" id="tipos_id" class="form-control">
                <option value="">Selecione o tipo</option>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}"> {{ $tipo->tiponome }}</option>
                @endforeach
              </select><br>
              <label>Preço de Compra</label></br>
              <input type="number" name="preco_compra" id="preco_compra" class="form-control" placeholder="Inserir qual o preço de compra." step="0.01"><br>
              <label>Preço Estimado de Venda</label><br>
              <input type="number" name="preco_venda" id="preco_venda" class="form-control" placeholder="Inserir o possível preço de venda." step="0.01"><br>
              <label>Estoque</label></br>
              <input type="number" name="estoque" id="estoque" class="form-control" placeholder="Inserir a quantidade de estoque do produto."></br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Adicionar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
