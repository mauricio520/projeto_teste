<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    select {
    word-wrap: normal;
    width: 29rem;
    height: 2rem;
}
</style>


<div class="container" style="width: 70rem; padding-top: 17rem;">
<button onclick="adicionar()" type="button" class="btn btn-dark" data-bs-toggle="tooltip" title="Adicionar">ADICIONAR</i></button>
<hr>
<br>
    <table id="example"style="width: 64rem;">

        <thead>

            <tr>
                <th>id</th>
                <th>PRODUTOS</th>
                <th>PREÇO</th>
                <th>COR</th>
                <th>AÇÕES</th>
            </tr>

        </thead>
        <tbody style="width:100%">
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
<!-- editar -->
<div class="modal fade modaleditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nome_prod" class="col-form-label">Name do produto:</label>
              <input type="text" class="form-control" id="nome_prod">
              <label for="preco" class="col-form-label">Preco do produto:</label>
              <input type="text" class="form-control" id="preco" >
              <label for="cor_prod" class="col-form-label">Cor do produto:</label>
              <input type="text" class="form-control" id="cor_prod" >
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="editar(this.id)" class="btn btn-primary btnmodaleditar">Salvar</button>
        </div>
      </div>
    </div>
  </div>
<!-- adicionar -->
  <div class="modal fade modaladicionar" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"> Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="nome_produto" class="col-form-label">Name do produto:</label>
              <input type="text" class="form-control" id="nome_produto">
              <br>
              <label for="preco_produto" class="col-form-label">Preço do produto:</label>
              <input type="text" class="form-control" id="preco_produto">
              <br>
              <select id='mySelector' class="styled-select slate">
                <option value="">Cor:</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="btnadiconar(this.id)" class="btn btn-primary btnmodaladicionar">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- modal excluir -->
  <div class="modal fade modalexcluir"  tabindex="-1" aria-labelledby="exampleid" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleid">Excluir Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Deseja Realmente Excluir Esse Produto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btnmodalexcluir" onclick="excluir(this.id)">Excluir</button>
        </div>
      </div>
    </div>
  </div>


<script>
    exemple();

    function exemple() {
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'buscar'
            },
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                  const valorFormatado = Intl.NumberFormat('pt-br', {
            style: 'currency',
            currency: 'BRL'
          }).format(data[i].preco)
                    $('#example').append(
                        '<tr>' +
                        '<td style="font-size: 15px;">' + data[i].id_prod + '</td>' +
                        '<td style="font-size: 15px; ">' + data[i].nome_prod + '</td>' +
                        '<td style="font-size: 15px; ">' + valorFormatado + '</td>' +
                        '<td style="font-size: 15px; ">' + data[i].cor_prod + '</td>' +
                        '<td>' +
                        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar" type="button" onclick="modaleditar(' + data[i].id_prod + ')">' +
                        '<i class="fas fa-edit"></i>' +
                        '</a>' +
                        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" type="button" onclick="modalexcluir(' + data[i].id_prod + ')">' +
                        '<i class="fa fa-times-circle" style="color:red" aria-hidden="true"></i>' +
                        '</a>' +
                        '</td>' +
                        '</tr>'
                    )
                }

            },
            error: function(e) {
                alert('erro ao se comunicar com o server')
            }
        });

    }

    $('.card').click(function() {
        $('.card').toggleClass("border-left-style: solid;");

    });

    function adicionar() {

        $('.modaladicionar').modal('show');
    }

    function btnadiconar() {
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'adicionar',
                nome_prod: $('#nome_produto').val(),
                preco: $('#preco_produto').val(),
                cor_prod: $('#mySelector').val(),
            },
            success: function(data) {
                $('#modaladicionar').modal('hide');
                location.reload();
            },
            error: function(e) {
                alert('erro ao se comunicar com o server')
                $('#modaladicionar').modal('hide');
            }
        });
    }

    function modaleditar(editar) {
        $(".modaleditar").attr("id", editar);
        $(".btnmodaleditar").attr("id", editar);
        $("#cor_prod").attr("disabled","true");
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'consulta',
                id_consultar: editar
            },
            success: function(data) {
                $('#cor_prod').val(data[0].cor_prod);
                $('#nome_prod').val(data[0].nome_prod);
                $('#preco').val(data[0].preco);
              
                $('#' + data[0].id_prod).modal('show');

            },
            error: function(e) {
                alert('erro ao se comunicar com o server')
                $('#' + editar).modal('hide');
            }
        });

    }

    function editar(id) {

        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'editar',
                nome_prod: $('#nome_prod').val(),
                preco: $('#preco').val(),
                id_editar: id
            },
            success: function(data) {
                $('#' + id).modal('hide');
                location.reload();
            },
            error: function(e) {
                alert('erro ao se comunicar com o server')
                $('#' + id).modal('hide');
            }
        });

    }

    function modalexcluir(excluir) {
      $(".modalexcluir").attr("id",'id'+excluir);
        $(".btnmodalexcluir").attr("id", excluir);
        $('#id'+ excluir).modal('show');
    }

    function excluir(id) {
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'excluir',
                id_excluir: id
            },
            success: function() {
                $('#' + id).modal('hide');
                location.reload();
            },
            error: function(e) {
                alert('erro ao se comunicar com o server')
                $('#' + id).modal('hide');
            }
        });
    }

    $('#mySelector').click(function() {
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/produto/rotina/produto.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'buscar_cor'
            },
            success: function(data) {
                for (let i = 0; i < data.length; i++) {

                    $('#mySelector').append(
                        '<option value=' + data[i].cor_nome + '>' + data[i].cor_nome + '</option>'
                    )
                }
            }
        })
    })
</script>