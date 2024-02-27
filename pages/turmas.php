<!-- PAGE-HEADER -->
 <?php
    $q = isset($_GET['q']) ? $_GET['q'] : '';
 ?>

 
<div class="page-header">
    <?php if($_SESSION['nivelAcesso'] <=2){?>
    <h1 class="page-title">Turmas <a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#addTurma" class='modal-effect btn btn-sm btn-primary' title="Adicionar turma" style='float:right; left:100%;'><h6><b>+</b></h6></a></h1>
    <?php } ?>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Turmas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem de turmas</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<!-- PAGE-HEADER END -->
        <?php if($_SESSION['nivelAcesso'] <=2 ){?>
            <div class="row row-cards w-12" >               
              <?=$gestaoInterna->listarTurmas($q)?>    
            </div>
       <?php } ?>

        <?php if($_SESSION['nivelAcesso'] == 3 ){?>
            <div class="row row-cards w-12" >               
              <?=$gestaoInterna->listarTurmaSimples($q)?>    
            </div>
       <?php } ?>
<!-- End Row -->
