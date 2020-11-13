
$(document).ready(function () {

    function action(data,url, method) {
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function (response) {
               alert(response.message);
                window.location.href = response.redirect;
            },
            error: function (xhr) {
                alert(xhr);
            }
        });
    }



    $("#form_contato").submit(function(){
        var contato = {
            id: this.idContato.value,
            nome:this.contato_nome.value,
            email:this.contato_email.value,
            linkedin: this.contato_linkedin.value,
            facebook: this.contato_facebook.value,
            _token : $("#token").val()

        };
       if(this.idContato.value == "") {
           action(contato, '/contato/insert', 'post');
       }else{
           action(contato, '/contato/update', 'put');
       }



    });

    $("#form_contato_telefone").submit(function(){
        var telefone = {
            id: this.idtelefone.value,
            idContato:  $("#idContato").val(),
            idTipoTelefone: this.tipo.value,
            numero:this.numero.value,
            _token : $("#token").val()

        };
        if(this.idtelefone.value == "") {
            action(telefone, '/contato/inserttelefone', 'post');
        }else{
            action(telefone, '/contato/updatetelefone', 'put');
        }



    });




    $(".destroy").click(function () {
          var id = $(this).attr('id')
          var data = {
              _token : $("#token").val(),
              id:id
          }

          var response = window.confirm("Deseja deletar este contato ?");
          if(response == true){
                action(data, '/contato/delete/' + id, 'delete');
                }


            });


    $(".destroy-telefone").click(function () {
        var id = $(this).attr('id')
        var idContato = $(this).parent().attr('id');
        var data = {
            _token : $("#token").val(),
            id:id,
            idContato:idContato
        }

        var response = window.confirm("Deseja deletar este telefone ?");
        if(response == true){
            action(data, '/contato/deletetelefone/' + id +'/'+idContato, 'delete');
        }


    });



});
