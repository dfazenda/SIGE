<!-- PAGE-HEADER -->
<div class="page-header">
    <?php if($_SESSION['nivelAcesso'] <=2){?>
    <h1 class="page-title">Classes <a data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#addClasse" class='modal-effect btn btn-sm btn-primary' title="Adicionar classe" style='float:right; left:100%;'><h6><b>+</b></h6></a></h1>
    <?php } ?> 
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Classes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem de Classe</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

            <div class="row row-cards">
            <?=$gestaoInterna->listarClasses()?> 
                
             <!-- COL END -->
            </div>
<!-- End Row -->
