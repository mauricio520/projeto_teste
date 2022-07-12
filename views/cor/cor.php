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
                <th>COR</th>
            </tr>

        </thead>
        <tbody style="width:100%">
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
<!-- editar -->
<div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="cor_nome" class="col-form-label">Name do produto:</label>
              <input type="text" class="form-control" id="cor_nome">
           
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="editar(this.id)" id="btnmodaleditar"class="btn btn-primary ">Salvar</button>
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
              <label for="cor" class="col-form-label">Name do produto:</label>
              <input type="text" class="form-control" id="cor">
              <br>
              
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
            url: "<?php echo INCLUDE_PATH; ?>views/cor/rotina/cor.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'buscar'
            },
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                 
                    $('#example').append(
                        '<tr>' +
                        '<td style="font-size: 15px;">' + data[i].cor_id + '</td>' +
                        '<td style="font-size: 15px; ">' + data[i].cor_nome + '</td>' +
                        '<td>' +
                        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar" type="button" onclick="modaleditar(' + data[i].cor_id + ')">' +
                        '<i class="fas fa-edit"></i>' +
                        '</a>' +
                        '<a data-bs-toggle="tooltip" data-bs-placement="bottom" title="Excluir" type="button" onclick="modalexcluir(' + data[i].cor_id + ')">' +
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
    url: "<?php echo INCLUDE_PATH; ?>views/cor/rotina/cor.php",
    type: 'POST',
    dataType: 'json',
    data: {
        action: 'adicionar',
        cor_nome: $('#cor').val(),
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
$("#modaleditar").attr('id',editar);
$("#btnmodaleditar").attr('id',editar);
$.ajax({
    url: "<?php echo INCLUDE_PATH; ?>views/cor/rotina/cor.php",
    type: 'POST',
    dataType: 'json',
    data: {
        action: 'consulta',
        id_consultar: editar
    },
    success: function(data) {
        $('#cor_nome').val(data[0].cor_nome);
        $('#' + data[0].cor_id).modal('show');

    },
    error: function(e) {
        alert('erro ao se comunicar com o server')
        $('#' + editar).modal('hide');
    }
});

}

function editar(id) {

$.ajax({
    url: "<?php echo INCLUDE_PATH; ?>views/cor/rotina/cor.php",
    type: 'POST',
    dataType: 'json',
    data: {
        action: 'editar',
        cor_nome: $('#cor_nome').val(),
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
    url: "<?php echo INCLUDE_PATH; ?>views/cor/rotina/cor.php",
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

</script>