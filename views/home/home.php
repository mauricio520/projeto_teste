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
<h2>REGRA DE NEGÓCIO:</h2>
<hr>
<br>
<input type="text" name="input-filter" class=form-control id="input-filter" onkeyup="myFunction()"placeholder="Filter nome">
<hr>
<br>
    <table id="tablehome"style="width: 64rem;" data-filter-control="select" >

        <thead>

            <tr>
                <th>id</th>
                <th>PRODUTOS</th>
                <th>PREÇOS</th>
                <th>COR</th>
               
            </tr>

        </thead>
        <tbody style="width:100%">
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>


<script>

    $(document).ready(function(){
  $("#input-filter").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablehome tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

    exemple();

    function exemple() {
        $.ajax({
            url: "<?php echo INCLUDE_PATH; ?>views/home/rotina/home.php",
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'buscar',
                
            },
            success: function(data) {
                for (let i = 0; i < data.length; i++) {

                    if(data[i].cor_prod == 'VERMELHO' && data[i].preco > 50.00){
                        var porcentagem = data[i].preco*0.05;
                    }else{
                        var porcentagem = data[i].preco*0.2;
                    }

                    if(data[i].cor_prod == 'AZUL' ){
                        var porcentagem = data[i].preco*0.2;
                    }
                    if(data[i].cor_prod == 'AMARELO' ){
                        var porcentagem = data[i].preco*0.1;
                    }

                    const valorFormatado = Intl.NumberFormat('pt-br', {
            style: 'currency',
            currency: 'BRL'
          }).format(porcentagem)
                    $('#tablehome').append(
                        '<tr>' +
                        '<td style="font-size: 15px;">' + data[i].id_prod + '</td>' +
                        '<td style="font-size: 15px; ">' + data[i].nome_prod + '</td>' +
                        '<td style="font-size: 15px; ">' + valorFormatado + '</td>' +
                        '<td style="font-size: 15px; ">' + data[i].cor_prod + '</td>' +
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
</script>