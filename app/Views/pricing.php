<?=$this->extend('layouts/default_layout'); ?>
<?=$this->section('content'); ?>
<div class="d-flex justify-content-center">
    <div id="loader" class="spinner-grow text-primary" style="width: 6rem; height: 6rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="container-fluid bootstrap-iso">
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
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#modal_departments" data-id="medicamento"><?=$medicamento;?></a>
                        Medicamentos
                      </font>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-danger">
                      <font size=3px>
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#modal_departments" data-id="perfumaria"><?=$perfumaria;?></a>
                        Perfumaria
                      </font>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-danger">
                      <font size=3px>
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#modal_departments" data-id="não medicamento"><?=$nao_medicamento;?></a>
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
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-2">
              <div class="card-header py-3"><h7 class="m-0 font-weight-bold text-primary">Competividade por Concorrente</h6></div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 mb-3">
                          <h4 class="small font-weight-bold">Drogaraia<span
                                  class="float-right"><?=$losing_drogaraia?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-success" role="progressbar" style="width: <?=$losing_drogaraia?>%"
                                  aria-valuenow="<?=$losing_drogaraia?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-6 mb-3">
                          <h4 class="small font-weight-bold">Beleza na Web<span
                                  class="float-right"><?=$losing_belezanaweb?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-light" role="progressbar" style="width: <?=$losing_belezanaweb?>%"
                                  aria-valuenow="<?=$losing_belezanaweb?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 mb-3">
                          <h4 class="small font-weight-bold">Drogaria São Paulo<span
                                  class="float-right"><?=$losing_drogariasp?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: <?=$losing_drogariasp?>%"
                                  aria-valuenow="<?=$losing_drogariasp?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-6 mb-3">
                          <h4 class="small font-weight-bold">Drogasil<span
                                  class="float-right"><?=$losing_drogasil?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: <?=$losing_drogasil?>%"
                                  aria-valuenow="<?=$losing_drogasil?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 mb-2">
                          <h4 class="small font-weight-bold">Onofre<span
                                  class="float-right"><?=$losing_onofre?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: <?=$losing_onofre?>%"
                                  aria-valuenow="<?=$losing_onofre?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                          <h4 class="small font-weight-bold">Pague Menos<span
                                  class="float-right"><?=$losing_paguemenos?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: <?=$losing_paguemenos?>%"
                                  aria-valuenow="<?=$losing_paguemenos?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 mb-2">
                          <h4 class="small font-weight-bold">Ultrafarma<span
                                  class="float-right"><?=$losing_ultrafarma?>%</span></h4>
                          <div class="progress mb-4">
                              <div class="progress-bar bg-secondary" role="progressbar" style="width: <?=$losing_ultrafarma?>%"
                                  aria-valuenow="<?=$losing_ultrafarma?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                          <h4 class="small font-weight-bold">Panvel<span
                                  class="float-right"><?=$losing_panvel?>%</span></h4>
                          <div class="progress">
                              <div class="progress-bar bg-dark" role="progressbar" style="width: <?=$losing_panvel?>%"
                                  aria-valuenow="<?=$losing_panvel?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-lg-3 mb-0">
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-success">SKU's</h4>
                    <div class="alert alert-success" role="alert">
                        <a href="#" title="Total de SKU's Geral" class="alert-link"
                           data-toggle="modal" data-target="#modal_blister_skus" data-id="sku_"><?=$skus?></a>=<a href="#"
                           title="Total de SKU's da Curva A"
                           class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="sku_a"><?=$skus_a?>(A)</a>+<a href="#"
                           title="Total de SKU's da Curva B" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="sku_b"><?=$skus_b?>(B)</a>+<a href="#"
                           title="Total de SKU's da Curva C" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="sku_c"><?=$skus_c?>(C)</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-warning">Produtos em Ruptura</h4>
                    <div class="alert alert-warning" role="alert">
                        <a href="#" title="Total de SKU's em Ruptura" class="alert-link"
                           data-toggle="modal" data-target="#modal_blister_skus" data-id="break_"><?=$break?></a> = <a href="#"
                           title="Total de SKU's em Ruptura da Curva A"
                           class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="break_a"><?=$break_a?>(A)</a> + <a href="#"
                           title="Total de SKU's em Ruptura da Curva B" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="break_b"><?=$break_b?>(B)</a> + <a href="#"
                           title="Total de SKU's em Ruptura da Curva C" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="break_c"><?=$break_c?>(C)</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-danger">Produtos Abaixo do Custo</h4>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" title="Total de SKU's Abaixo do Custo" class="alert-link"
                           data-toggle="modal" data-target="#modal_blister_skus" data-id="under_cost_"><?=$under_cost?></a> = <a href="#"
                           title="Total de SKU's Abaixo do Custo da Curva A"
                           class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="under_cost_a"><?=$under_cost_a?>(A)</a> + <a href="#"
                           title="Total de SKU's Abaixo do Custo da Curva B" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="under_cost_b"><?=$under_cost_b?>(B)</a> + <a href="#"
                           title="Total de SKU's Abaixo do Custo da Curva C" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="under_cost_c"><?=$under_cost_c?>(C)</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-info">Produtos com Estoque Exclusivo</h4>
                    <div class="alert alert-info" role="alert">
                        <a href="#" title="Total de SKU's com Estoque Exclusivo" class="alert-link"
                           data-toggle="modal" data-target="#modal_blister_skus" data-id="exclusive_stock_"><?=$exclusive_stock?></a> = <a href="#"
                           title="Total de SKU's com Estoque Exclusivo da Curva A"
                           class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="exclusive_stock_a"><?=$exclusive_stock_a?>(A)</a> + <a href="#"
                           title="Total de SKU's com Estoque Exclusivo da Curva B" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="exclusive_stock_b"><?=$exclusive_stock_b?>(B)</a> + <a href="#"
                           title="Total de SKU's com Estoque Exclusivo da Curva C" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="exclusive_stock_c"><?=$exclusive_stock_c?>(C)</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h4 class="m-0 small font-weight-bold text-danger">Produtos que estamos perdendo para todos</h4>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" title="Total de SKU's que estamos perdendo para todos" class="alert-link"
                           data-toggle="modal" data-target="#modal_blister_skus" data-id="losing_all_"><?=$losing_all?></a> = <a href="#"
                           title="Total de SKU's que estamos perdendo para todos da Curva A"
                           class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="losing_all_a"><?=$losing_all_a?>(A)</a> + <a href="#"
                           title="Total de SKU's que estamos perdendo para todos da Curva B" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="losing_all_b"><?=$losing_all_b?>(B)</a> + <a href="#"
                           title="Total de SKU's que estamos perdendo para todos da Curva C" class="alert-link" data-toggle="modal"
                           data-target="#modal_blister_skus" data-id="losing_all_c"><?=$losing_all_c?>(C)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-2">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" id="margin_title">Margem</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Departamentos</div>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="changeMarginChartView('medicamento');">Medicamentos</a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="changeMarginChartView('perfumaria');">Perfumaria</a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="changeMarginChartView('nao_medicamento');">Não Medicamentos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="changeMarginChartView();">Geral</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <input type="date" class="form-control" onchange="changeMarginChart();" value="<?=date('Y-m-d');?>" id="margin_date" placeholder="DD/MM/YYYY">
                    </div>
                    <div class="pt-2 pb-2">
                        <canvas id="myPieChart_geral" style='display:none;' height="200"></canvas>
                        <canvas id="myPieChart_medicamento" style='display:none;' height="240"></canvas>
                        <canvas id="myPieChart_naomedicamento" style='display:none;' height="240"></canvas>
                        <canvas id="myPieChart_perfumaria" style='display:none;' height="240"></canvas>
                    </div>
                    <div class="mt-4 text-center small" style='display:none;'>
                        <span class="mr-2" id="geral_total_sales_value_day"></span>
                        <span class="mr-2" id="geral_total_sales_qtd_day"></span>
                    </div>
                    <div class="mt-4 text-center small" style='display:none;'>
                        <span class="mr-2" id="medicamento_total_sales_value_day"></span>
                        <span class="mr-2" id="medicamento_total_sales_qtd_day"></span>
                    </div>
                    <div class="mt-4 text-center small" style='display:none;'>
                        <span class="mr-2" id="nao_medicamento_total_sales_value_day"></span>
                        <span class="mr-2" id="nao_medicamento_total_sales_qtd_day"></span>
                    </div>
                    <div class="mt-4 text-center small" style='display:none;'>
                        <span class="mr-2" id="perfumaria_total_sales_value_day"></span>
                        <span class="mr-2" id="perfumaria_total_sales_qtd_day"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-0">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary" id="margin_fat_title">Faturamento X Margem</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Departamentos</div>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="chartMargin('medicamento');">Medicamentos</a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="chartMargin('perfumaria');">Perfumaria</a>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="chartMargin('nao_medicamento');">Não Medicamentos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="cursor: pointer;" onclick="chartMargin();">Geral</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart_geral" height="400"></canvas>
                        <canvas id="myAreaChart_medicamento" style='display:none;' height="400"></canvas>
                        <canvas id="myAreaChart_naomedicamento" style='display:none;' height="400"></canvas>
                        <canvas id="myAreaChart_perfumaria" style='display:none;' height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('modals/modalDepartment'); ?>
<?php echo view('modals/modalTotalSkus'); ?>
<?php echo script_tag('vendor/jquery/jquery.min.js'); ?>

<script language='javascript'>
    $(document).ready(function() {
        $('#loader').hide();

        // Clique das modais de produtos que estamos perdendo por departamento
        $("#modal_departments").on('show.bs.modal', function(e) {
            $.ajax({
                type: "POST",
                url: "pricing/competitorInfo",
                data: { department: e.relatedTarget.dataset.id },
                beforeSend: function () {
                    $('#loader').show();
                },
                success: function (data) {
                    $('#loader').show();
                    populateDataDepartment(data);
                    $('#loader').hide();
                },
                complete: function () {
                    $('#loader').hide();
                },
            });
        })

        // Clique das modais dos blisters
        $("#modal_blister_skus").on('show.bs.modal', function(e) {
            // $('#loader').show();
            // console.log(e.relatedTarget.dataset.id.substring(0, e.relatedTarget.dataset.id.lastIndexOf('_')) + " " + e.relatedTarget.dataset.id.substr(e.relatedTarget.dataset.id.lastIndexOf('_') + 1, e.relatedTarget.dataset.id.length - 1))
            if(e.relatedTarget.dataset.id.substr(0, e.relatedTarget.dataset.id.lastIndexOf('_')) !== 'sku' &&
               e.relatedTarget.dataset.id.substr(e.relatedTarget.dataset.id.lastIndexOf('_') + 1, e.relatedTarget.dataset.id.length - 1) !== "") $('#skusDataTable').DataTable().destroy();
            alert(e.relatedTarget.dataset.id.substr(e.relatedTarget.dataset.id.lastIndexOf('_') + 1, e.relatedTarget.dataset.id.length - 1))
            populateDataSkus(e.relatedTarget.dataset.id.substr(e.relatedTarget.dataset.id.lastIndexOf('_') + 1, e.relatedTarget.dataset.id.length - 1));
            /*$.ajax({
                type: "POST",
                url: "pricing/blistersInfo",
                data: {
                    type: e.relatedTarget.dataset.id.substring(0, e.relatedTarget.dataset.id.lastIndexOf('_')),
                    curve: e.relatedTarget.dataset.id.substr(e.relatedTarget.dataset.id.lastIndexOf('_') + 1, e.relatedTarget.dataset.id.length - 1)
                },
                beforeSend: function () {
                    $('#loader').show();
                },
                success: function (data) {
                    $('#loader').show();
                    populateDataSkus(data);
                    $('#loader').hide();
                },
                complete: function () {
                    $('#loader').hide();
                },
            });*/
        })

        var myPieChart;
        var data = []
        var labels = []
        var margin_department = []
        var ctx;
        changeMarginChart();
        changeMarginChartView();
        chartMargin();
    })

    function changeMarginChart() {
        Chart.pluginService.register({
          beforeDraw: function(chart) {
            if (chart.config.options.elements.center) {
              // Get ctx from string
              var ctx = chart.chart.ctx;

              // Get options from the center object in options
              var centerConfig = chart.config.options.elements.center;
              var fontStyle = centerConfig.fontStyle || 'Arial';
              var txt = centerConfig.text;
              var color = centerConfig.color || '#000';
              var maxFontSize = centerConfig.maxFontSize || 75;
              var sidePadding = centerConfig.sidePadding || 20;
              var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
              // Start with a base font of 30px
              ctx.font = "30px " + fontStyle;

              // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
              var stringWidth = ctx.measureText(txt).width;
              var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

              // Find out how much the font can grow in width.
              var widthRatio = elementWidth / stringWidth;
              var newFontSize = Math.floor(30 * widthRatio);
              var elementHeight = (chart.innerRadius * 2);

              // Pick a new font size so it will not be larger than the height of label.
              var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
              var minFontSize = centerConfig.minFontSize;
              var lineHeight = centerConfig.lineHeight || 25;
              var wrapText = false;

              if (minFontSize === undefined) {
                minFontSize = 20;
              }

              if (minFontSize && fontSizeToUse < minFontSize) {
                fontSizeToUse = minFontSize;
                wrapText = true;
              }

              // Set font settings to draw it correctly.
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';
              var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
              var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
              ctx.font = fontSizeToUse + "px " + fontStyle;
              ctx.fillStyle = color;

              if (!wrapText) {
                ctx.fillText(txt, centerX, centerY);
                return;
              }

              var words = txt.split(' ');
              var line = '';
              var lines = [];

              // Break words up into multiple lines if necessary
              for (var n = 0; n < words.length; n++) {
                var testLine = line + words[n] + ' ';
                var metrics = ctx.measureText(testLine);
                var testWidth = metrics.width;
                if (testWidth > elementWidth && n > 0) {
                  lines.push(line);
                  line = words[n] + ' ';
                } else {
                  line = testLine;
                }
              }

              // Move the center up depending on line height and number of lines
              centerY -= (lines.length / 2) * lineHeight;

              for (var n = 0; n < lines.length; n++) {
                ctx.fillText(lines[n], centerX, centerY);
                centerY += lineHeight;
              }
              //Draw text in center
              ctx.fillText(line, centerX, centerY);
            }
          }
        });

        $.ajax({
            type: "POST",
            url: "pricing/margin",
            data: {
                date: $('#margin_date').val()
            },
            beforeSend: function () {
                $('#loader').show();
            },
            success: function (data) {
                $('#loader').show();
                if(typeof doughnutChart_geral !== 'undefined') doughnutChart_geral.destroy();
                if(typeof doughnutChart_medicamento !== 'undefined') doughnutChart_medicamento.destroy();
                if(typeof doughnutChart_naomedicamento !== 'undefined') doughnutChart_naomedicamento.destroy();
                if(typeof doughnutChart_perfumaria !== 'undefined') doughnutChart_perfumaria.destroy();
                obj = JSON.parse(data)
                doughnutChart_geral = new Chart(document.getElementById("myPieChart_geral"), {
                  type: 'doughnut',
                  data: {
                    labels: obj.geral_margins.labels,
                    datasets: [{
                      data: obj.geral_margins.data,
                      backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e", "#e74a3b", "#858796", "#f8f9fc", "#5a5c69"],
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                  },
                  options: {
                    elements: {
                      center: {
                        text: obj.geral_margins.total_margin_day,
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 20, // Default is 20 (as a percentage)
                        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
                        lineHeight: 25 // Default is 25 (in px), used for when text wraps
                      }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                      callbacks: {
                        label (t, d) {
                          var value = d.datasets[0].data[t.index].toFixed(2).replace(".", ",") + "%";
                          var lowercase_label = d.labels[t.index].toLowerCase()
                          var label = lowercase_label.charAt(0).toUpperCase() + lowercase_label.slice(1);
                          return label + ": " + value;
                        }
                      }
                    },
                    legend: {
                      display: false
                    },
                    cutoutPercentage: 80,
                  },
                });

                doughnutChart_medicamento = new Chart(document.getElementById("myPieChart_medicamento"), {
                  type: 'doughnut',
                  data: {
                    labels: obj.medicamento_margins.labels,
                    datasets: [{
                      data: obj.medicamento_margins.data,
                      backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e", "#e74a3b", "#858796", "#f8f9fc", "#5a5c69"],
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                  },
                  options: {
                    elements: {
                      center: {
                        text: obj.medicamento_margins.total_margin_day,
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 20, // Default is 20 (as a percentage)
                        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
                        lineHeight: 25 // Default is 25 (in px), used for when text wraps
                      }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                      callbacks: {
                        label (t, d) {
                          var value = d.datasets[0].data[t.index].toFixed(2).replace(".", ",") + "%";
                          var lowercase_label = d.labels[t.index].toLowerCase()
                          var label = lowercase_label.charAt(0).toUpperCase() + lowercase_label.slice(1);
                          return label + ": " + value;
                        }
                      }
                    },
                    legend: {
                      display: false
                    },
                    cutoutPercentage: 80,
                  },
                });

                doughnutChart_naomedicamento = new Chart(document.getElementById("myPieChart_naomedicamento"), {
                  type: 'doughnut',
                  data: {
                    labels: obj.nao_medicamento_margins.labels,
                    datasets: [{
                      data: obj.nao_medicamento_margins.data,
                      backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e", "#e74a3b", "#858796", "#f8f9fc", "#5a5c69"],
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                  },
                  options: {
                    elements: {
                      center: {
                        text: obj.nao_medicamento_margins.total_margin_day,
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 20, // Default is 20 (as a percentage)
                        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
                        lineHeight: 25 // Default is 25 (in px), used for when text wraps
                      }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                      callbacks: {
                        label (t, d) {
                          var value = d.datasets[0].data[t.index].toFixed(2).replace(".", ",") + "%";
                          var lowercase_label = d.labels[t.index].toLowerCase()
                          var label = lowercase_label.charAt(0).toUpperCase() + lowercase_label.slice(1);
                          return label + ": " + value;
                        }
                      }
                    },
                    legend: {
                      display: false
                    },
                    cutoutPercentage: 80,
                  },
                });

                doughnutChart_perfumaria = new Chart(document.getElementById("myPieChart_perfumaria"), {
                  type: 'doughnut',
                  data: {
                    labels: obj.perfumaria_margins.labels,
                    datasets: [{
                      data: obj.perfumaria_margins.data,
                      backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e", "#e74a3b", "#858796", "#f8f9fc", "#5a5c69"],
                      hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                  },
                  options: {
                    elements: {
                      center: {
                        text: obj.perfumaria_margins.total_margin_day,
                        fontStyle: 'Arial', // Default is Arial
                        sidePadding: 20, // Default is 20 (as a percentage)
                        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
                        lineHeight: 25 // Default is 25 (in px), used for when text wraps
                      }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                      callbacks: {
                        label (t, d) {
                          var value = d.datasets[0].data[t.index].toFixed(2).replace(".", ",") + "%";
                          var lowercase_label = d.labels[t.index].toLowerCase()
                          var label = lowercase_label.charAt(0).toUpperCase() + lowercase_label.slice(1);
                          return label + ": " + value;
                        }
                      }
                    },
                    legend: {
                      display: false
                    },
                    cutoutPercentage: 80,
                  },
                });

                $('#geral_total_sales_value_day').text('Fat.: ' + obj.geral_margins.total_sales_value_day);
                $('#geral_total_sales_qtd_day').text('Vendidos.: ' + obj.geral_margins.total_sales_qtd_day);
                $('#medicamento_total_sales_value_day').text('Fat.: ' + obj.medicamento_margins.total_sales_value_day);
                $('#medicamento_total_sales_qtd_day').text('Vendidos.: ' + obj.medicamento_margins.total_sales_qtd_day);
                $('#nao_medicamento_total_sales_value_day').text('Fat.: ' + obj.nao_medicamento_margins.total_sales_value_day);
                $('#nao_medicamento_total_sales_qtd_day').text('Vendidos.: ' + obj.nao_medicamento_margins.total_sales_qtd_day);
                $('#perfumaria_total_sales_value_day').text('Fat.: ' + obj.perfumaria_margins.total_sales_value_day);
                $('#perfumaria_total_sales_qtd_day').text('Vendidos.: ' + obj.perfumaria_margins.total_sales_qtd_day);
                $('#loader').hide();
            },
            complete: function () {
                $('#loader').hide();
            },
        });
    }

    function chartMargin(margin_fat_view = '') {
        if(margin_fat_view == 'medicamento') {
            $('#margin_fat_title').text('Faturamento X Margem (Medicamentos)');
            data_fat = <?='['.implode(',', $medicamento_sales['data_fat_line_chart']).']';?>;
            data_margin = <?='['.implode(',', $medicamento_sales['data_margin_line_chart']).']';?>;
            labels = <?='["'.implode('","', $medicamento_sales['labels_line_chart']).'"]';?>;
            ctx = document.getElementById("myAreaChart_medicamento");
            $('#myAreaChart_medicamento').show();
            $('#myAreaChart_naomedicamento').hide();
            $('#myAreaChart_perfumaria').hide();
            $('#myAreaChart_geral').hide();
        }
        else if(margin_fat_view == 'nao_medicamento') {
            $('#margin_fat_title').text('Faturamento X Margem (Não Medicamentos)');
            data_fat = <?='['.implode(',', $nao_medicamento_sales['data_fat_line_chart']).']';?>;
            data_margin = <?='['.implode(',', $nao_medicamento_sales['data_margin_line_chart']).']';?>;
            labels = <?='["'.implode('","', $nao_medicamento_sales['labels_line_chart']).'"]';?>;
            ctx = document.getElementById("myAreaChart_naomedicamento");
            $('#myAreaChart_medicamento').hide();
            $('#myAreaChart_naomedicamento').show();
            $('#myAreaChart_perfumaria').hide();
            $('#myAreaChart_geral').hide();
        }
        else if(margin_fat_view == 'perfumaria') {
            $('#margin_fat_title').text('Faturamento X Margem (Perfumaria)');
            data_fat = <?='['.implode(',', $perfumaria_sales['data_fat_line_chart']).']';?>;
            data_margin = <?='['.implode(',', $perfumaria_sales['data_margin_line_chart']).']';?>;
            labels = <?='["'.implode('","', $perfumaria_sales['labels_line_chart']).'"]';?>;
            ctx = document.getElementById("myAreaChart_perfumaria");
            $('#myAreaChart_medicamento').hide();
            $('#myAreaChart_naomedicamento').hide();
            $('#myAreaChart_perfumaria').show();
            $('#myAreaChart_geral').hide();
        }
        else {
            $('#margin_fat_title').text('Faturamento X Margem (Geral)');
            data_fat = <?='['.implode(',', $geral_sales['data_fat_line_chart']).']';?>;
            data_margin = <?='['.implode(',', $geral_sales['data_margin_line_chart']).']';?>;
            labels = <?='["'.implode('","', $geral_sales['labels_line_chart']).'"]';?>;
            ctx = document.getElementById("myAreaChart_geral");
            $('#myAreaChart_medicamento').hide();
            $('#myAreaChart_naomedicamento').hide();
            $('#myAreaChart_perfumaria').hide();
            $('#myAreaChart_geral').show();
        }
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: "Margem",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: data_margin,
            },
            {
              label: "Faturamento",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "#1cc88a",
              pointRadius: 3,
              pointBackgroundColor: "#23580e",
              pointBorderColor: "#23580e",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "#1cc88a",
              pointHoverBorderColor: "#1cc88a",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              data: data_fat,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 7
                }
              }],
              yAxes: [{
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function(value, index, values) {
                    return parseFloat(value).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function(tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel + ': ' + parseFloat(tooltipItem.yLabel).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                }
              }
            }
          }
        });
    }

    function changeMarginChartView(margin_view = '') {
        if(margin_view == 'medicamento') {
            $('#margin_title').text('Margem (Medicamentos)');
            $('#geral_total_sales_value_day').parent().hide();
            $('#medicamento_total_sales_value_day').parent().show();
            $('#nao_medicamento_total_sales_value_day').parent().hide();
            $('#perfumaria_total_sales_value_day').parent().hide();
            $('#myPieChart_medicamento').css("display","block");
            $('#myPieChart_naomedicamento').hide();
            $('#myPieChart_perfumaria').hide();
            $('#myPieChart_geral').hide();
        }
        else if(margin_view == 'nao_medicamento') {
            $('#margin_title').text('Margem (Não Medicamentos)');
            $('#geral_total_sales_value_day').parent().hide();
            $('#medicamento_total_sales_value_day').parent().hide();
            $('#nao_medicamento_total_sales_value_day').parent().show();
            $('#perfumaria_total_sales_value_day').parent().hide();
            $('#myPieChart_medicamento').hide();
            $('#myPieChart_perfumaria').hide();
            $('#myPieChart_geral').hide();
            $('#myPieChart_naomedicamento').css("display","block");
        }
        else if(margin_view == 'perfumaria') {
            $('#margin_title').text('Margem (Perfumaria)');
            $('#geral_total_sales_value_day').parent().hide();
            $('#medicamento_total_sales_value_day').parent().hide();
            $('#nao_medicamento_total_sales_value_day').parent().hide();
            $('#perfumaria_total_sales_value_day').parent().show();
            $('#myPieChart_medicamento').hide();
            $('#myPieChart_naomedicamento').hide();
            $('#myPieChart_geral').hide();
            $('#myPieChart_perfumaria').css("display","block");
        }
        else {
            $('#margin_title').text('Margem (Geral)');
            $('#geral_total_sales_value_day').parent().show();
            $('#medicamento_total_sales_value_day').parent().hide();
            $('#nao_medicamento_total_sales_value_day').parent().hide();
            $('#perfumaria_total_sales_value_day').parent().hide();
            $('#myPieChart_medicamento').hide();
            $('#myPieChart_naomedicamento').hide();
            $('#myPieChart_perfumaria').hide();
            $('#myPieChart_geral').css("display","block");
        }
    }
</script>
<style type='text/css'>
    div#loader {
        width: 100px;
      	height: 100px;
      	position: absolute;
      	top:0;
      	bottom: 0;
      	left: 0;
      	right: 0;
        z-index: 100000000000000000000;
      	margin: auto;
    }
</style>
<?=$this->endSection(); ?>
