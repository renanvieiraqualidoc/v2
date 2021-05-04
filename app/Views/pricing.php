<?=$this->extend('layouts/default_layout'); ?>
<?=$this->section('content'); ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">PRICING</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Perdendo</div>
                  <div class="h5 mb-0 font-weight-bold text-danger">
                      <font size=3px>
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal_medicamento"><?=$medicamento;?></a>
                        Medicamentos
                      </font>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-danger">
                      <font size=3px>
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal_perfumaria"><?=$perfumaria;?></a>
                        Perfumaria
                      </font>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-danger">
                      <font size=3px>
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal_nao_medicamento"><?=$nao_medicamento;?></a>
                        Não Medicamentos
                      </font>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-sort-amount-down fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Demonstração Financeira
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$estoque?><font size=2px> (estoque)</font></div>
                            <div class="h5 mb-0 font-weight-bold text-primary"><font size=3px><?=$custo?></font><font size=2px> (custo)</font></div>
                            <div class="h5 mb-0 font-weight-bold text-warning"><font size=3px><?=$receita?></font><font size=2px> (receita)</font></div>
                            <div class="h5 mb-0 font-weight-bold text-success"><font size=3px><?=$lucro_bruto?></font><font size=2px> (lucro bruto)</font></div>
                            <div class="h5 mb-0 font-weight-bold text-info"><font size=3px><?=$cashback?></font><font size=2px> (cashback)</font></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Média Margem de Operação</div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=number_to_amount($margem_bruta_geral, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_bruta_geral?>;"
                                        aria-valuenow="<?=$margem_bruta_geral?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-primary"><?=number_to_amount($margem_bruta_geral_a, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_bruta_geral_a?>;"
                                        aria-valuenow="<?=$margem_bruta_geral_a?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-warning"><?=number_to_amount($margem_bruta_geral_b, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_bruta_geral_b?>;"
                                        aria-valuenow="<?=$margem_bruta_geral_b?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-danger"><?=number_to_amount($margem_bruta_geral_c, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_bruta_geral_c?>;"
                                        aria-valuenow="<?=$margem_bruta_geral_c?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percent fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Margem Dif. Menor Preço</div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=number_to_amount($margem_menor_geral, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_menor_geral?>;"
                                        aria-valuenow="<?=$margem_menor_geral?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-primary"><?=number_to_amount($margem_menor_geral_a, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_menor_geral_a?>;"
                                        aria-valuenow="<?=$margem_menor_geral_a?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-warning"><?=number_to_amount($margem_menor_geral_b, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_menor_geral_b?>;"
                                        aria-valuenow="<?=$margem_menor_geral_b?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                            <div class="row no-gutters align-items-center">
                               <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-danger"><?=number_to_amount($margem_menor_geral_c, 2, 'pt_BR')."%"?></div>
                               </div>
                               <div class="col">
                                 <div class="progress progress-sm mr-2">
                                   <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?=$margem_menor_geral_c?>;"
                                        aria-valuenow="<?=$margem_menor_geral_c?>" aria-valuemin="0" aria-valuemax="100">
                                   </div>
                                 </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percent fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 mb-2">
            <div class="card shadow mb-2">
              <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Produtos que estamos perdendo</h6></div>
              <div class="card-body">
                  <h4 class="small font-weight-bold">Drogaraia<span
                          class="float-right"><?=$losing_drogaraia?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-success" role="progressbar" style="width: <?=$losing_drogaraia?>%"
                          aria-valuenow="<?=$losing_drogaraia?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Beleza na Web<span
                          class="float-right"><?=$losing_belezanaweb?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-light" role="progressbar" style="width: <?=$losing_belezanaweb?>%"
                          aria-valuenow="<?=$losing_belezanaweb?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Drogaria São Paulo<span
                          class="float-right"><?=$losing_drogariasp?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: <?=$losing_drogariasp?>%"
                          aria-valuenow="<?=$losing_drogariasp?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Drogasil<span
                          class="float-right"><?=$losing_drogasil?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$losing_drogasil?>%"
                          aria-valuenow="<?=$losing_drogasil?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Onofre<span
                          class="float-right"><?=$losing_onofre?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$losing_onofre?>%"
                          aria-valuenow="<?=$losing_onofre?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Pague Menos<span
                          class="float-right"><?=$losing_paguemenos?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$losing_paguemenos?>%"
                          aria-valuenow="<?=$losing_paguemenos?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Ultrafarma<span
                          class="float-right"><?=$losing_ultrafarma?>%</span></h4>
                  <div class="progress mb-4">
                      <div class="progress-bar bg-secondary" role="progressbar" style="width: <?=$losing_ultrafarma?>%"
                          aria-valuenow="<?=$losing_ultrafarma?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Panvel<span
                          class="float-right"><?=$losing_panvel?>%</span></h4>
                  <div class="progress">
                      <div class="progress-bar bg-dark" role="progressbar" style="width: <?=$losing_panvel?>%"
                          aria-valuenow="<?=$losing_panvel?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-success">SKU's</h4>
                    <div class="alert alert-success" role="alert">
                        Total SKUs: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$skus?></a>
                        // Curva A: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$skus_a?></a>
                        // Curva B: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$skus_b?></a>
                        // Curva C: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$skus_c?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-warning">Produtos em Ruptura</h4>
                    <div class="alert alert-warning" role="alert">
                        Total SKUs: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$break?></a>
                        // Curva A: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$break_a?></a>
                        // Curva B: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$break_b?></a>
                        // Curva C: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$break_c?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-danger">Produtos Abaixo do Custo</h4>
                    <div class="alert alert-danger" role="alert">
                        Total SKUs: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$under_cost?></a>
                        // Curva A: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$under_cost_a?></a>
                        // Curva B: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$under_cost_b?></a>
                        // Curva C: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$under_cost_c?></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-info">Produtos com Estoque Exclusivo</h4>
                    <div class="alert alert-info" role="alert">
                        Total SKUs: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$exclusive_stock?></a>
                        // Curva A: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$exclusive_stock_a?></a>
                        // Curva B: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$exclusive_stock_b?></a>
                        // Curva C: <a href="#" class="alert-link" data-toggle="modal" data-target="#totalprodutosmodal"><?=$exclusive_stock_c?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection(); ?>
