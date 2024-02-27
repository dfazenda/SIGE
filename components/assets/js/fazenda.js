 //JSON para cadastrar aluno

 $(".form_cadastro").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Operação', 'efectuada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});


 $(".form_mensalidade").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Mensalidade', 'efectuada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});


  $(".form_inscricao").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Aluno', 'inscrito com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});

  /* $(".form_matricula").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Aluno', 'matriculado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});  */

$(".form_matricula").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
        console.log(response);
        let objecto = JSON.parse(response);
        var success = objecto.success;
        var msg = objecto.msg;
        var htmlContent = objecto.htmlContent; // Verifique se o campo "htmlContent" está presente

        if (success) {
            swal('Aluno', 'matriculado com sucesso', 'success');
               setTimeout(() => {
                    location.reload();
                }, 1000);
               
            // Redirecione para a página "matricula_informacao.php" e transmita os dados
            window.location.href = "matricula_informacao.php?htmlContent=" + encodeURIComponent(htmlContent);
        } else {
            swal('', msg, 'error');
        }
       }
    });
});

$(".form_cadastro_professor").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
        console.log(response);
        let objecto = JSON.parse(response);
        var success = objecto.success;
        var msg = objecto.msg;
        var htmlProfessor = objecto.htmlProfessor; // Verifique se o campo "htmlProfessor" está presente

        if (success) {
            swal('Professor', 'cadastrado com sucesso', 'success');
              setTimeout(() => {
                    location.reload();
                }, 1000);
               
            // Redirecione para a página "matricula_informacao.php" e transmita os dados
            window.location.href = "cadastro_professor_informacao.php?htmlProfessor=" + encodeURIComponent(htmlProfessor);
        } else {
            swal('', msg, 'error');
        }
       }
    });
});

$(".form_cadastro_inscricao").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
        console.log(response);
        let objecto = JSON.parse(response);
        var success = objecto.success;
        var msg = objecto.msg;
        var htmlAlunoInscrito = objecto.htmlAlunoInscrito; // Verifique se o campo "htmlAlunoInscrito" está presente

        if (success) {
            swal('Aluno', 'inscrito com sucesso', 'success');
            setTimeout(() => {
                    location.reload();
                }, 1000);
               
            // Redirecione para a página "matricula_informacao.php" e transmita os dados
            window.location.href = "inscricao_informacao.php?htmlAlunoInscrito=" + encodeURIComponent(htmlAlunoInscrito);
        } else {
            swal('', msg, 'error');
        }
       }
    });
});


//Editar ou alterar aluno
$(".form_edicao").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/update.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                swal('Registo', 'alterado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
});

//Editar ou alterar professor
$(".form_edicaoProfessor").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/update.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                swal('Registo', 'alterado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
});




       //Funcao para alterar a foto ao carregar
       $(document).ready(function () {
            $('.form_edicao .form-control').attr('disabled',true);
            $('.form_edicao .botao').attr('hidden',true);
            //$('#url_foto').hide();
           // $('#lbl_url_foto').hide();

           
    // __________MODAL
    // showing modal with effect
    $('.modal-effect').on('click', function (e) {
        e.preventDefault();
        var effect = $(this).attr('data-bs-effect');
        $('.modalGerenciamento').addClass(effect);
    });
    // hide modal with effect
    $('.modalGerenciamento').on('hidden.bs.modal', function (e) {
        $(this).removeClass(function (index, className) {
            return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
        });
    });

        //Forçar marcar a listar onde clicamos
        var currentPageName = location.pathname.split('/').pop();
        $('.' + currentPageName).addClass('active');
        $('.' + currentPageName).closest('ul').closest('li').addClass('is-expanded')
               

       })
       
       var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
       };

       $('#output').on('click', function(event) {
            $('#url_foto').click();
       });

            
       $('.estadoBotao').on('click', function(){
        var id = $(this).attr('id');
        var estado = $(this).attr('estado');
        var elemento = $(this)
        var controlador = $(this).attr('controlador');
        $.ajax({
            type: "POST",
            url: "includes/update.php",
            data: {id:id,estado:estado,controlador:controlador},
            success: function (response) {
                console.log(response)
                let objecto = JSON.parse(response)
                var success = objecto.success
                var msg = objecto.msg
                if (success) {
                    if(estado=='activo'){
                        $(elemento).closest('tr').css('opacity',0.6);
                        $(elemento).find('i').removeClass('fa-toggle-on').addClass('fa-goggle-off')
                        $(elemento).removeClass('btn-success').addClass('btn-danger')
                        $(elemento).attr('estado','inactivo')
                    }else{
                        $(elemento).closest('tr').css('opacity',1);
                        $(elemento).find('i').removeClass('fa-toggle-off').addClass('fa-goggle-on')
                        $(elemento).removeClass('btn-danger').addClass('btn-success')
                        $(elemento).attr('estado','activo')
                    }
                }else{
                    swal('',msg, 'error');
                }
             
            }
        });
       
       })

       $('.alterar_tema').on('click', function(){
        var controlador = $(this).attr('controlador');
        $.ajax({
            type: "POST",
            url: "includes/update.php",
            data: {controlador:controlador},
            success: function (response) {
                console.log(response)
                let objecto = JSON.parse(response)
                var success = objecto.success
                var msg = objecto.msg
                if (success) {
                        notif({
                        type: "success",
                        msg: msg,
                        position: "right",
                        opacity: 0.8
                    });
                    }else{
                    swal('',msg, 'error');
                }
             
            }
        });
       
       })


       //Evento de matricula do aluno
        $('.matriculaBotao').on('click', function(){
        var id = $(this).attr('id');
        var classe = $(this).attr('classe');
        var stamp = $(this).attr('stamp');
        var nome = $(this).attr('nome');
        var notaInformativa = $(this).attr('notaInformativa');
        var anexoDocumento = $(this).attr('anexoDocumento');
        var interno = $(this).attr('interno');
        var elemento = $(this)
        var controlador = $(this).attr('controlador');
        $('#matricularAluno').modal('show')
        $('#classe').val(classe)
        $('#stamp').val(stamp)
        $('#nome').val(nome)
        $('#interno').val(interno)
        $('#anexoDocumento').attr('href',anexoDocumento)
        //if(interno)
        //$('#notaInformativa').hide()
        //else
        $('#notaInformativa').attr('href',notaInformativa)
        $('#controlador').val(controlador)
        $('#controlador').val(controlador)
            $.ajax({
            type: "POST",
            url: "includes/listar.php",
            data: {controlador:'buscarTurma', classe:classe},
            success: function (response) {
                console.log(response)
                let objecto = JSON.parse(response)
                var success = objecto.success
                var msg = objecto.msg
                if (success) {
                  $('#turmaMatricula').html(msg)

                }else{
                    swal('',msg, 'error');
                }
             
            }
        });
       
       })

      
        $('#alterar_senha').on('click', function(){
        $('#alterar_senhaModal').modal('show')
       })
        $('.alterar_senha').submit(function(e){
            e.preventDefault();
            if($('#senha').val() != $('#Confsenha').val()){
                swal('','As senhas digitadas não são iguais.', 'error');
            }else{
                var senha = $('#senha').val(); 
                   $.ajax({
                    type: "POST",
                    url: "includes/update.php",
                    data: {controlador:'alterar_senha',senha:senha},
                    success: function (response) {
                        console.log(response)
                        let objecto = JSON.parse(response)
                        var success = objecto.success
                        var msg = objecto.msg
                        if (success) {
                            $('#alterar_senhaModal').modal('hide')
                             swal('',msg, 'success');
                            }else{
                            swal('',msg, 'error');
                        }
                     
                    }
                });
            }
        })

        $('.redefinir_senha_usuario').on('click', function(){
        var elemento = $(this)
        var controlador = $(this).attr('controlador');
        var usuario = $(this).attr('usuario');
            swal({
            title: "Alerta",
            text: "Pretendes enviar pedido de redefinição de senha para este utilizador?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: "Sim",
            concelButtonText: "Não, abortar",
            closeOnConfirm: false,
            closeOnCancel: false
        },function(isConfirm){
            if(isConfirm){
                $.ajax({
                type: "POST",
                url: "includes/redefinir_senha.php",
                data: {controlador: controlador, usuario:usuario},
                success: function (response) {
                console.log(response)
                let objecto = JSON.parse(response)
                var success = objecto.success
                var msg = objecto.msg
                if (success) {
                  swal('',msg, 'success');

                }else{
                    swal('',msg, 'error');
                }
             
            }
        });
     }
   });     
    
})


       $(".criarUsuario").click(function (e) {
        e.preventDefault();

        var email = $(this).data('email');
        var stamp = $(this).data('stamp');

        // Populate the form fields
        $("#criarUsuario input[name='email']").val(email);
        $("#criarUsuario input[name='stamp']").val(stamp);

        // Show the modal
        $("#criarUsuario").modal('show');
    });

        $(".form_criar_usuario").submit(function (e) {
         e.preventDefault();
         var stamp = $(this).find('input[name="stamp"]').val();
         var nome = $(this).find('input[name="nome"]').val();
         var email = $(this).find('input[name="email"]').val();
         var nivelAcesso = $(this).find('select[name="nivelAcesso"]').val();

        $.ajax({
            type: "POST",
            url: "includes/insert.php",
            data: new FormData(this),
            contentType: false,
            processData: false,

            success: function (response) {
                console.log(response)
                let objecto = JSON.parse(response)
                var success = objecto.success
                var msg = objecto.msg
                if (success) {
                    
                    swal('Usuario', 'criado com sucesso', 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                   
                }else{
                    swal('',msg, 'error');
                 
                }
             
            }
        });
    }); 


       $('#editarAluno').on('click', function(event){
            
        $('.form_edicao .form-control').attr('disabled',false);
        $('.form_edicao .botao').attr('hidden',false);

        notif({
            type: "warning",
            msg: "Ecrã habilitada para modo de edição",
            position: "center",
            opacity: 0.8
        });
       })

        $('#editarProfessor').on('click', function(event){
            
        $('.form_edicao .form-control').attr('disabled',false);
        $('.form_edicao .botao').attr('hidden',false);

        notif({
            type: "warning",
            msg: "Ecrã habilitada para modo de edição",
            position: "center",
            opacity: 0.8
        });
       })

        $('#editarFuncionario').on('click', function(event){
            
        $('.form_edicao .form-control').attr('disabled',false);
        $('.form_edicao .botao').attr('hidden',false);

        notif({
            type: "warning",
            msg: "Ecrã habilitada para modo de edição",
            position: "center",
            opacity: 0.8
        });
       })

           $('#editarDadosPessoais').on('click', function(event){
            notif({
            type: "warning",
            msg: "Ecrã habilitada para modo de edição",
            position: "center",
            opacity: 0.8
        });   
        $('#url_foto').attr('disabled',false);
        $('#email').attr('disabled',false);
        $('#contacto').attr('disabled',false);
        $('#morada').attr('disabled',false);
        $('.form_edicao .botao').attr('hidden',false);

       })




//JSON para cadastrar funcionario 
$(".funcionario_cadastro").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                alert(msg)
            }else{
                alert(msg)
            }
         

        }
    });
});


//JSON para cadastrar professor 
$(".professor_cadastro").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                alert(msg)
            }else{
                alert(msg)
            }
         

        }
    });
});

//Chamar Modal de inscricao de aluno interno
$('#alunoInterno').on('click', function(){
    $('#alunoInternoModal').modal('show')
})

$('.buscar_aluno').submit(function (e){
    e.preventDefault();
        $.ajax({
        type: "POST",
        url: "includes/listar.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                notif({
                    type: "success",
                     msg: "Aluno encontrado com sucesso",
                     position: "right",
                     opacity: 0.8
                     }); 
            
                $('#nome').val(msg.nome)
                $('#dataDeNascimento').val(msg.dataDeNascimento)
                $('#tipoDeDocumento').val(msg.tipoDeDocumento)
                $('#numeroDeDocumento').val(msg.numeroDeDocumento)
                $('#locala_emissao_doc').val(msg.localDeEmissao)
                $('#data_emissao_doc').val(msg.data_emissao_doc)
                $('#sexo').val(msg.sexo)
                $('#morada').val(msg.morada)
                $('#email').val(msg.email)
                $('#contacto').val(msg.contacto)
                //$('#classe').val(msg.classe)
                $('#interno').val(1)

                $('#nome').attr('readonly','readonly')
                $('#dataDeNascimento').attr('readonly','readonly')
                $('#tipoDeDocumento').attr('readonly','readonly')
                $('#numeroDeDocumento').attr('readonly','readonly')
                $('#locala_emissao_doc').attr('readonly','readonly')
                $('#data_emissao_doc').attr('readonly','readonly')
                $('#sexo').attr('readonly','readonly')
                //$('#classe').attr('readonly','readonly')
                $('#notaInformativaDiv').hide()
                $('#notaInformativa').removeAttr('required')
                $('#alunoInternoModal').modal('show')
                console.log(msg.nome)
                      
                              
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
   
   })

$('#modalMensalidade').on('click', function(){
    $('#modalMensalidade').modal('show')
})
$('.procurar_aluno').submit(function (e){
    e.preventDefault();
        $.ajax({
        type: "POST",
        url: "includes/listar.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                notif({
                    type: "success",
                     msg: "Aluno encontrado com sucesso",
                     position: "right",
                     opacity: 0.8
                     }); 
            
                $('#nome').val(msg.nome)
                $('#dataDeNascimento').val(msg.dataDeNascimento)
                $('#tipoDeDocumento').val(msg.tipoDeDocumento)
                $('#numeroDeDocumento').val(msg.numeroDeDocumento)
                $('#locala_emissao_doc').val(msg.localDeEmissao)
                $('#data_emissao_doc').val(msg.data_emissao_doc)
                $('#sexo').val(msg.sexo)
                $('#morada').val(msg.morada)
                $('#email').val(msg.email)
                $('#contacto').val(msg.contacto)
                //$('#classe').val(msg.classe)
                $('#interno').val(1)

                $('#nome').attr('readonly','readonly')
                $('#dataDeNascimento').attr('readonly','readonly')
                $('#tipoDeDocumento').attr('readonly','readonly')
                $('#numeroDeDocumento').attr('readonly','readonly')
                $('#locala_emissao_doc').attr('readonly','readonly')
                $('#data_emissao_doc').attr('readonly','readonly')
                $('#sexo').attr('readonly','readonly')
                //$('#classe').attr('readonly','readonly')
                $('#notaInformativaDiv').hide()
                $('#notaInformativa').removeAttr('required')
                $('#alunoInternoModal').modal('show')
                console.log(msg.nome)
                      
                              
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
   
   })


   $('#consultarInscricao').on('click', function(){
    $('#consultarInscricaoModal').modal('show')
})


$('.consultar_inscricao').submit(function (e){
    e.preventDefault();
        $.ajax({
        type: "POST",
        url: "includes/listar.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                notif({
                    type: "success",
                     msg: "Aluno encontrado com sucesso",
                     position: "right",
                     opacity: 0.8
                     });
                     swal('',msg, 'success');
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
   
   })

$('#pagamentoMensalidade').on('click', function(){
    $('#pagamentoMensalidadeModal').modal('show')
})

$('#excluirUsuarios').on('click', function(){
    $('#formExcluirModel').modal('show')
})


// Function to open the payment confirmation modal
function openPaymentConfirmationModal(studentId) {
    // Set the student ID in the modal
    const studentIdPlaceholder = document.getElementById('studentIdPlaceholder');
    studentIdPlaceholder.textContent = studentId;

    // Open the modal for payment confirmation
    $('#paymentConfirmationModal').modal('show');
}

// Add a click event listener to all buttons with 'btn-success' class
const successButtons = document.querySelectorAll('.btn-danger');
successButtons.forEach(button => {
    button.addEventListener('click', () => {
        const studentId = button.dataset.studentId;
        openPaymentConfirmationModal(studentId);
    });
});

  // showing modal with effect
  $('.editarTurma').on('click', function(){
    $('.form_edicao .form-control').attr('disabled', false);
    $('#novoAno').attr('disabled', true);
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var ano = $(this).attr('ano');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#novoAno').val(ano)
    $('#novoNomeTurma').val(nome)
    $('#turmaID').val(id)
     var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#editarTurma').modal('show');

   })

   $('.editarClasse').on('click', function(){
    $('.form_edicao_classe .form-control').attr('disabled', false);
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#novoNomeClasse').val(nome)
    $('#classeID').val(id)
     var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#editarClasse').modal('show');

   })

    $('.eliminarTurma').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var ano = $(this).attr('ano');
    var classe = $(this).attr('classe');
    var mensagemEliminar = "Confirma a eliminação da turma  " +nome+" " +ano+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#turmaEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarTurma').modal('show');

   })

   $('.eliminarClasse').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação da  " +nome+ " classe?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#classeEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarClasse').modal('show');

   })

    $('.eliminarMensalidade').on('click', function(){
    var id = $(this).attr('id');
    var stampAluno = $(this).attr('stampAluno');
    var nomeMes = $(this).attr('nomeMes');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Pretende anular a mensalidade de  " +nomeMes+ " do aluno " +nome+ " com stam: " +stampAluno+ "?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#stampAluno').val(id)
    
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarMensalidade').modal('show');

   })
    $(".form_eliminar_mensalidade").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Mensalidade', 'anulada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});




$(".form_eliminar").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Turma', 'eliminada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});

$(".form_eliminar_classe").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Classe', 'eliminada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});

$(".form_eliminar_funcionario").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Funcionario', 'eliminado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});

$(".form_eliminar_usuario").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Usuário', 'eliminado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});

$('.eliminarFuncionario').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação do funcionário " +nome+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#funcionarioEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarFuncionario').modal('show');

   })

$('.eliminarUsuario').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação do usuário " +nome+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#usuarioEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarUsuario').modal('show');

   })

$(".form_eliminar_professor").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Professor', 'eliminado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});



$('.eliminarProfessor').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação do professor " +nome+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#professorEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarProfessor').modal('show');

   })

$(".form_eliminar_aluno").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('aluno', 'eliminado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});

$('.eliminarAluno').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação do aluno " +nome+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#alunoEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarAluno').modal('show');

   })

 
/* $('.pagarMensalidade').on('click', function() {
    // Obter os dados do aluno dos atributos do botão
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var classe = $(this).attr('classe');
    var stampAluno = $(this).attr('stampAluno');
    var nrDoRecibo = $(this).attr('nrDoRecibo');
    var dataDeDeposito = $(this).attr('dataDeDeposito');
    var url_comprovativoo = $(this).attr('url_comprovativoo');
    var nomeMes = $(this).attr('nomeMes');
    var tipoPagamento = $(this).attr('tipoPagamento');
    var valorMensalidade = $(this).attr('valorMensalidade');
    var multa = $(this).attr('multa');
    var diasDeAtraso = $(this).attr('diasDeAtraso');

    // Habilitar os controles do formulário modal
    $('.form_mensalidade .form-control').attr('disabled', false);

    // Adicionar o efeito à classe modalGerenciamento
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);

    // Exibir o modal
    $('#pagarMensalidade').modal('show');

    // Atualizar os campos do formulário com os valores obtidos
    $('#idAluno').val(id);
    $('#campoNomeAluno').val(nome);
    $('#campoClasseAluno').val(classe);
    $('#campoDiasDeAtraso').val(diasDeAtraso);
    $('#campoMulta').val(multa);
    $('#campoValorMensalidade').val(valorMensalidade);
    $('#campoStampAluno').val(stampAluno);
});


  $('.pagarMensalidade').on('click', function(){
    $('.form_mensalidade .form-control').attr('disabled', false);
    $('#novoAno').attr('disabled', true);
    var id = $(this).attr('id');
    var valorMensalidade = $(this).attr('valorMensalidade');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#valorMensalidadeID').val(valorMensalidade)
     $('#mensalidadeID').val(id)
     var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#pagarMensalidade').modal('hide');

   })
*/

$('.pagarMensalidade').on('click', function() {
    // Obter os dados do aluno dos atributos do botão
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var classe = $(this).attr('classe');
    var stampAluno = $(this).attr('stampAluno');
    var nrDoRecibo = $(this).attr('nrDoRecibo');
    var dataDeDeposito = $(this).attr('dataDeDeposito');
    var url_comprovativo = $(this).attr('url_comprovativo');
    var nomeMes = $(this).attr('nomeMes');
    var tipoPagamento = $(this).attr('tipoPagamento');
    var valorMensalidade = $(this).attr('valorMensalidade');
    var multa = $(this).attr('multa');
    var diasDeAtraso = $(this).attr('diasDeAtraso');

    // Habilitar os controles do formulário modal
    $('.form_mensalidade .form-control').attr('disabled', false);

    // Adicionar o efeito à classe modalGerenciamento
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);

    // Exibir o modal
    $('#pagarMensalidade').modal('show');

    // Atualizar os campos do formulário com os valores obtidos
    $('#idAluno').val(id);
    $('#campoNomeAluno').val(nome);
    $('#campoClasseAluno').val(classe);
    $('#campoValorMensalidade').val(valorMensalidade);
    $('#campoStampAluno').val(stampAluno);
    // Ajuste para a lógica de dias de atraso e multa
    $('#dob').val(dataDeDeposito);
    calcularDiasAtrasoEMulta();

    // Restante do código (se houver algo específico que você queira adicionar após o cálculo)
    // ...

    // Se precisar realizar alguma ação adicional após o cálculo, adicione aqui.
});


// Função para calcular dias de atraso e multa
function calcularDiasAtrasoEMulta() {
    var dataDeposito = new Date($('#dob').val());
    var diaDeposito = dataDeposito.getDate();
    var valorMensalidade = parseFloat($('#valorMensalidadeID').val());

    // Obter a data atual
    var dataAtual = new Date();
    var diaAtual = dataAtual.getDate();

    // Verificar se a data de depósito está acima do dia 2 do mês atual
    if (diaDeposito > 2 && dataDeposito < dataAtual) {
        // Calcular o número total de dias de atraso
        var diasDeAtraso = diaAtual - diaDeposito;

        // Exibir o número de dias de atraso no campo
        $('#campoDiasDeAtraso').val(diasDeAtraso);

        // Calcular a multa
        var multa = diasDeAtraso * 0.10 * valorMensalidade;

        // Exibir a multa no campo
        $('#campoMulta').val(multa.toFixed(2));
    } else {
        // Se não estiver acima do dia 2, exibir 0 dias de atraso e 0 multa
        $('#campoDiasDeAtraso').val(0);
        $('#campoMulta').val(0);
    }
}


$('#dob').on('change', function() {
    var dataDeDeposito = new Date($(this).val());
    var dataLimitePagamento = new Date(dataDeDeposito.getFullYear(), dataDeDeposito.getMonth(), 2);

    // Verificar se a data de depósito está após o dia 2 do mês a frequentar
    if (dataDeDeposito > dataLimitePagamento) {
        // Calcular o número de dias de atraso após o dia 2
        var diasDeAtraso = Math.floor((dataDeDeposito - dataLimitePagamento) / (1000 * 60 * 60 * 24));

        // Calcular a multa (1% do valorMensalidade para cada dia de atraso)
        var valorMensalidade = Number($('#campoValorMensalidade').val());
        var multa = diasDeAtraso * 0.01 * valorMensalidade;

        // Atualizar os campos de input com os resultados
        $('#campoDiasDeAtraso').val(diasDeAtraso);
        $('#campoMulta').val(multa.toFixed(2));  // Usar toFixed(2) para exibir duas casas decimais
    } else {
        // Se não houver atraso, definir dias de atraso e multa como 0
        $('#campoDiasDeAtraso').val(0);
        $('#campoMulta').val(0);
    }
});


$('.form_mensalidade').submit(function (e){
    e.preventDefault();
        $.ajax({
        type: "POST",
        url: "includes/listar.php",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                notif({
                    type: "success",
                     msg: "Aluno encontrado com sucesso",
                     position: "right",
                     opacity: 0.8
                     });
                     swal('',msg, 'success');
            }else{
                swal('',msg, 'error');
            }
         
        }
    });
   
   })


 $('.gerarRecibo').on('click', function(){
    var recibo = $(this).attr('recibo');
    var nrDoRecibo = $(this).attr('nrDoRecibo');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#gerarRecibo').modal('show');

   }) 


 $('.gerarExcel').on('click', function(){
    var classe = $(this).attr('classe');
    var turma = $(this).attr('turma');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#gerarExcel').modal('show');

   }) 

 $('.MensalidadeDetalhes').on('click', function() {
    // Obter o stampAluno do atributo 'stampAluno' do botão
    var stampAluno = $(this).attr('stampAluno');
    var nrDoRecibo = $(this).attr('nrDoRecibo');
    var dataDeDeposito = $(this).attr('dataDeDeposito');
    var url_comprovativoo = $(this).attr('url_comprovativoo');
    var nomeMes = $(this).attr('nomeMes');
    var tipoPagamento = $(this).attr('tipoPagamento');
    var valorMensalidade = $(this).attr('valorMensalidade');
    // Habilitar os controles do formulário modal
    $('.form_mensalidade .form-control').attr('disabled', false);
   
    // Adicionar o efeito à classe modalGerenciamento
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
  
    // Exibir o modal
    $('#MensalidadeDetalhes').modal('show');
  
    // Definir o valor do campo 'stampAluno' no formulário modal
    $('#campoStampAluno').val(stampAluno);
}); 

$(".form_cadastro_sala").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/insert.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Sala', 'inserida com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});

   $('.editarSala').on('click', function(){
    $('.form_edicao_sala .form-control').attr('disabled', false);
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#novoNomeSala').val(nome)
    $('#salaID').val(id)
     var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#editarSala').modal('show');

   })
$(".form_edicao_sala").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/update.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success) {
                
                swal('Sala', 'Actualizada com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
               
            }else{
                swal('',msg, 'error');
             
            }
         
        }
    });
});

 $('.eliminarSala').on('click', function(){
    var id = $(this).attr('id');
    var nome = $(this).attr('nome');
    var mensagemEliminar = "Confirma a eliminação da sala  " +nome+ " ?"
    var elemento = $(this)
    var controlador = $(this).attr('controlador');
    $('#salaEliminarID').val(id)
    $('.mensagemEliminar').text(mensagemEliminar)
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#eliminarSala').modal('show');

   })
$(".form_eliminar_sala").submit(function (e) {
    e.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "includes/delete.php",
        data: new FormData(this),
        contentType: false,
        processData: false,

        success: function (response) {
            console.log(response)
            let objecto = JSON.parse(response)
            var success = objecto.success
            var msg = objecto.msg
            if (success==1) {
                swal('Sala', 'eliminado com sucesso', 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }else if(success==2){
                $('.modalGerenciamento').modal('hide')
                swal('',msg, 'warning');
            }
         
        }
    });
});


$('.atribuirProfessor').on('click', function() {
    var professorStamp = $('#professor option:selected').data('professorStamp');
    var turma = $(this).data('turma');
    var classe = $(this).data('classe');
    var professor = $(this).data('professor');
    var disciplina = $(this).data('disciplina');
    var sala = $(this).data('sala');
    $('#turma').val(turma);
    $('#classe').val(classe);
    $('#professor').val(professor);
    $('#disciplina').val(disciplina);
    $('#sala').val(sala);
    $('#professorStamp').val(professorStamp);
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#atribuirProfessor').modal('show');
});


$('.lancarNota').on('click', function() {
   
    var effect = 'effect-super-scaled';
    $('.modalGerenciamento').addClass(effect);
    $('#lancarNota').modal('show');
});
