<!-- PAGE-HEADER -->
<div class="page-header">
    <?php if($_SESSION['nivelAcesso'] <=2){?>
    <h1 class="page-title">Disciplinas <a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#addDisciplina" class='modal-effect btn btn-sm btn-primary' title="Adicionar disciplina" style='float:right; left:100%;'><h6><b>+</b></h6></a></h1>
    <?php } ?> 
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Disciplinas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem de Disciplina</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

            <div class="row row-cards" >
              <?=$gestaoInterna->listarDisciplinas()?>      
             <!-- COL END -->
            </div>
<!-- End Row -->
