<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Relatorio extends BaseController
{
	public function index() {
			ini_set('memory_limit', '-1');
			date_default_timezone_set('America/Sao_Paulo');
			$fileName = "";

			switch($_GET['type']) {
					case "perdendo":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['department']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->losing($_GET['department']);
							break;
					case "total_skus":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['curve']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->allSkus('', $_GET['curve']);
							break;
					case "ruptura":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['curve']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->allSkus($_GET['type'], $_GET['curve']);
							break;
					case "abaixo_custo":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['curve']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->allSkus($_GET['type'], $_GET['curve']);
							break;
					case "estoque_exclusivo":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['curve']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->allSkus($_GET['type'], $_GET['curve']);
							break;
					case "perdendo":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['curve']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->allSkus($_GET['type'], $_GET['curve']);
							break;
					case "grupos_produtos":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['group']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->groups($_GET['group']);
							break;
					case "vendidos":
							$fileName = "relatorio_{$_GET['type']}_{$_GET['department']}_".date('d-m-Y_h.i', time()).".xlsx";
							$spreadsheet = $this->sales($_GET['department']);
							break;
			}

			$writer = new Xlsx($spreadsheet);
      $writer->save("relatorios/$fileName");
      return $this->response->download("relatorios/$fileName", null);
	}

	public function losing($department) {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'SKU');
      $sheet->setCellValue('B1', 'VENDA_ACUMULADA');
      $sheet->setCellValue('C1', 'EAN');
      $sheet->setCellValue('D1', 'NOME');
      $sheet->setCellValue('E1', 'PRINCIPIO_ATIVO');
      $sheet->setCellValue('F1', 'APRESENTACAO');
			$sheet->setCellValue('G1', 'DEPARTAMENTO');
			$sheet->setCellValue('H1', 'CATEGORIA');
			$sheet->setCellValue('I1', 'SITUACAO');
			$sheet->setCellValue('J1', 'STATUS');
			$sheet->setCellValue('K1', 'ESTOQUE_RMS');
			$sheet->setCellValue('L1', 'ESTOQUE_OCC');
			$sheet->setCellValue('M1', 'DIFERENCA_OCC_RMS');
			$sheet->setCellValue('N1', 'PRECO_TABELADO');
			$sheet->setCellValue('O1', 'SUGESTAO_TABELADO');
			$sheet->setCellValue('P1', 'MENOR_PRECO');
			$sheet->setCellValue('Q1', 'CONCORRENTE_MENOR_PRECO');
			$sheet->setCellValue('R1', 'QTD_CONCORRENTES');
			$sheet->setCellValue('S1', 'QTD_CONCORRENTES_ATIVOS');
			$sheet->setCellValue('T1', 'CUSTO');
			$sheet->setCellValue('U1', 'MARGEM_BRUTA');
			$sheet->setCellValue('V1', 'PRECO_DE_VENDA');
			$sheet->setCellValue('W1', 'PAGUE_APENAS');
			$sheet->setCellValue('X1', 'DROGASIL');
			$sheet->setCellValue('Y1', 'ULTRAFARMA');
			$sheet->setCellValue('Z1', 'BELEZA_NA_WEB');
			$sheet->setCellValue('AA1', 'DROGARAIA');
			$sheet->setCellValue('AB1', 'DROGARIASP');
			$sheet->setCellValue('AC1', 'ONOFRE');
			$sheet->setCellValue('AD1', 'PAGUE_MENOS');
			$sheet->setCellValue('AE1', 'PANVEL');
			$sheet->setCellValue('AF1', 'MENOR_PRECO_POR_AI');
			$sheet->setCellValue('AG1', 'MARGEM_VALOR');
			$sheet->setCellValue('AH1', 'CASHBACK');
			$sheet->setCellValue('AI1', 'MARGEM_APOS_CASHBACK');
			$sheet->setCellValue('AJ1', 'MARGEM_BRUTA_PORCENTO');
			$sheet->setCellValue('AK1', 'DIFERENCA_PARA_O_MENOR_CONCORRENTE');
			$sheet->setCellValue('AL1', 'CURVA');
			$sheet->setCellValue('AM1', 'PBM');
			$sheet->setCellValue('AN1', 'SITUACAO_DESCONTINUADO');
			$sheet->setCellValue('AO1', 'MARCA');
			$sheet->setCellValue('AP1', 'FABRICANTE');
			$sheet->setCellValue('AQ1', 'OTC');
			$sheet->setCellValue('AR1', 'DESCONTINUADO');
			$sheet->setCellValue('AS1', 'CONTROLADO');
			$sheet->setCellValue('AT1', 'ATIVO');
			$sheet->setCellValue('AU1', 'ACAO');
			$rows = 2;
			$db = \Config\Database::connect();
			$products = $db->query("Select vendas.sku as SKU, sum(vendas.qtd) as VENDA_ACUMULADA,  Products.reference_code as EAN, Products.title as NOME,
															  principio_ativo.principio_ativo as PRINCIPIO_ATIVO, principio_ativo.apresentacao as APRESENTACAO, Products.department as DEPARTAMENTO,
															 Products.category as CATEGORIA, Situation.situation as SITUACAO, Status.status as STATUS, REPLACE(Products.qty_stock_rms,'.',',') as ESTOQUE_RMS,
															 Products.qty_stock as ESTOQUE_OCC, (Products.qty_stock - Products.qty_stock_rms) as DIFERENCA_OCC_RMS,
															 REPLACE(tabulated_price, '.', ',' ) as PRECO_TABELADO, REPLACE(tabulated_price_suggestion, '.', ',' )  as SUGESTAO_TABELADO,
															  REPLACE(lowest_price, '.', ',' ) AS MENOR_PRECO,
															 Products.lowest_price_competitor AS CONCORRENTE_MENOR_PRECO, Products.qty_competitors as QTD_CONCORRENTES,
															 Products.qty_competitors_available as QTD_CONCORRENTES_ATIVOS, REPLACE(Products.price_cost, '.', ',' ) AS CUSTO,
															  REPLACE(Products.margin, '.', ',' ) AS MARGEM_BRUTA,
															 REPLACE(Products.sale_price, '.', ',' ) AS PRECO_DE_VENDA, REPLACE(Products.current_price_pay_only, '.', ',' ) AS PAGUE_APENAS,
															 REPLACE(Products.drogasil, '.', ',' ) AS DROGASIL,
															 REPLACE(Products.ultrafarma, '.', ',' ) AS ULTRAFARMA,
															 REPLACE(Products.belezanaweb, '.', ',' ) AS BELEZA_NA_WEB,
															 REPLACE(Products.drogaraia, '.', ',' ) AS DROGARAIA,
															 REPLACE(Products.drogariasp, '.', ',' ) AS DROGARIASP,
															 REPLACE(Products.onofre, '.', ',' ) AS ONOFRE,
															 REPLACE(Products.paguemenos, '.', ',' ) AS PAGUE_MENOS,
															 REPLACE(Products.panvel, '.', ',' ) AS PANVEL,
															  REPLACE(Products.current_less_price_around, '.',',') as MENOR_PRECO_POR_AI,
															  REPLACE(Products.current_margin_value, '.',',') as MARGEM_VALOR, REPLACE(Products.current_cashback, '.',',') as CASHBACK,
															 REPLACE(current_gross_margin, '.', ',' ) AS MARGEM_APOS_CASHBACK, REPLACE(Products.current_gross_margin_percent, '.',',') as MARGEM_BRUTA_PORCENTO,
															  REPLACE(Products.diff_current_pay_only_lowest, '.',',') as DIFERENCA_PARA_O_MENOR_CONCORRENTE,
															 Products.curve as CURVA, Products.pbm as PBM, descontinuado.situation as SITUACAO_DESCONTINUADO,
															 marca.marca as MARCA, marca.fabricante as FABRICANTE, Products.otc as OTC, Products.descontinuado as DESCONTINUADO,
															  Products.controlled_substance as CONTROLADO, Products.active as ATIVO, Products.acao as ACAO from vendas inner join Products on Products.sku=vendas.sku
															  INNER JOIN Situation on Products.situation_code_fk = Situation.code INNER JOIN Status on Products.status_code_fk = Status.code
															 INNER JOIN principio_ativo ON principio_ativo.sku = Products.sku INNER JOIN descontinuado on Products.sku = descontinuado.sku
															  INNER JOIN marca on Products.sku = marca.sku WHERE Products.diff_current_pay_only_lowest < 0 and Products.department = '".str_replace("_", " ", $department)."' group by sku")->getResult();
			foreach ($products as $val){
					$sheet->setCellValue('A' . $rows, $val->SKU);
					$sheet->setCellValue('B' . $rows, $val->VENDA_ACUMULADA);
					$sheet->setCellValue('C' . $rows, $val->EAN);
					$sheet->setCellValue('D' . $rows, $val->NOME);
					$sheet->setCellValue('E' . $rows, $val->PRINCIPIO_ATIVO);
					$sheet->setCellValue('F' . $rows, $val->APRESENTACAO);
					$sheet->setCellValue('G' . $rows, $val->DEPARTAMENTO);
					$sheet->setCellValue('H' . $rows, $val->CATEGORIA);
					$sheet->setCellValue('I' . $rows, $val->SITUACAO);
					$sheet->setCellValue('J' . $rows, $val->STATUS);
					$sheet->setCellValue('K' . $rows, $val->ESTOQUE_RMS);
					$sheet->setCellValue('L' . $rows, $val->ESTOQUE_OCC);
					$sheet->setCellValue('M' . $rows, $val->DIFERENCA_OCC_RMS);
					$sheet->setCellValue('N' . $rows, $val->PRECO_TABELADO);
					$sheet->setCellValue('O' . $rows, $val->SUGESTAO_TABELADO);
					$sheet->setCellValue('P' . $rows, $val->MENOR_PRECO);
					$sheet->setCellValue('Q' . $rows, $val->CONCORRENTE_MENOR_PRECO);
					$sheet->setCellValue('R' . $rows, $val->QTD_CONCORRENTES);
					$sheet->setCellValue('S' . $rows, $val->QTD_CONCORRENTES_ATIVOS);
					$sheet->setCellValue('T' . $rows, $val->CUSTO);
					$sheet->setCellValue('U' . $rows, $val->MARGEM_BRUTA);
					$sheet->setCellValue('V' . $rows, $val->PRECO_DE_VENDA);
					$sheet->setCellValue('W' . $rows, $val->PAGUE_APENAS);
					$sheet->setCellValue('X' . $rows, $val->DROGASIL);
					$sheet->setCellValue('Y' . $rows, $val->ULTRAFARMA);
					$sheet->setCellValue('Z' . $rows, $val->BELEZA_NA_WEB);
					$sheet->setCellValue('AA' . $rows, $val->DROGARAIA);
					$sheet->setCellValue('AB' . $rows, $val->DROGARIASP);
					$sheet->setCellValue('AC' . $rows, $val->ONOFRE);
					$sheet->setCellValue('AD' . $rows, $val->PAGUE_MENOS);
					$sheet->setCellValue('AE' . $rows, $val->PANVEL);
					$sheet->setCellValue('AF' . $rows, $val->MENOR_PRECO_POR_AI);
					$sheet->setCellValue('AG' . $rows, $val->MARGEM_VALOR);
					$sheet->setCellValue('AH' . $rows, $val->CASHBACK);
					$sheet->setCellValue('AI' . $rows, $val->MARGEM_APOS_CASHBACK);
					$sheet->setCellValue('AJ' . $rows, $val->MARGEM_BRUTA_PORCENTO);
					$sheet->setCellValue('AK' . $rows, $val->DIFERENCA_PARA_O_MENOR_CONCORRENTE);
					$sheet->setCellValue('AL' . $rows, $val->CURVA);
					$sheet->setCellValue('AM' . $rows, $val->PBM);
					$sheet->setCellValue('AN' . $rows, $val->SITUACAO_DESCONTINUADO);
					$sheet->setCellValue('AO' . $rows, $val->MARCA);
					$sheet->setCellValue('AP' . $rows, $val->FABRICANTE);
					$sheet->setCellValue('AQ' . $rows, $val->OTC);
					$sheet->setCellValue('AR' . $rows, $val->DESCONTINUADO);
					$sheet->setCellValue('AS' . $rows, $val->CONTROLADO);
					$sheet->setCellValue('AT' . $rows, $val->ATIVO);
					$sheet->setCellValue('AU' . $rows, $val->ACAO);
			    $rows++;
			}
			return $spreadsheet;
	}

	public function allSkus($type, $curve) {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'SKU');
			$sheet->setCellValue('B1', 'VENDA_ACUMULADA');
			$sheet->setCellValue('C1', 'FATURAMENTO');
			$sheet->setCellValue('D1', 'CUSTO_TOTAL');
			$sheet->setCellValue('E1', 'MARGEM_BRUTA_TOTAL');
			$sheet->setCellValue('F1', 'EAN');
			$sheet->setCellValue('G1', 'NOME');
			$sheet->setCellValue('H1', 'PRINCIPIO_ATIVO');
			$sheet->setCellValue('I1', 'APRESENTACAO');
			$sheet->setCellValue('J1', 'DEPARTAMENTO');
			$sheet->setCellValue('K1', 'CATEGORIA');
			$sheet->setCellValue('L1', 'SITUACAO');
			$sheet->setCellValue('M1', 'STATUS');
			$sheet->setCellValue('N1', 'ESTOQUE_RMS');
			$sheet->setCellValue('O1', 'ESTOQUE_OCC');
			$sheet->setCellValue('P1', 'DIFERENCA_OCC_RMS');
			$sheet->setCellValue('Q1', 'PRECO_TABELADO');
			$sheet->setCellValue('R1', 'SUGESTAO_TABELADO');
			$sheet->setCellValue('S1', 'CONCORRENTE_MENOR_PRECO');
			$sheet->setCellValue('T1', 'QTD_CONCORRENTES');
			$sheet->setCellValue('U1', 'QTD_CONCORRENTES_ATIVOS');
			$sheet->setCellValue('V1', 'MENOR_PRECO');
			$sheet->setCellValue('W1', 'CUSTO');
			$sheet->setCellValue('X1', 'MARGEM_BRUTA');
			$sheet->setCellValue('Y1', 'PRECO_DE_VENDA');
			$sheet->setCellValue('Z1', 'PAGUE_APENAS');
			$sheet->setCellValue('AA1', 'DROGASIL');
			$sheet->setCellValue('AB1', 'ULTRAFARMA');
			$sheet->setCellValue('AC1', 'BELEZA_NA_WEB');
			$sheet->setCellValue('AD1', 'DROGARAIA');
			$sheet->setCellValue('AE1', 'DROGARIASP');
			$sheet->setCellValue('AF1', 'ONOFRE');
			$sheet->setCellValue('AG1', 'PAGUE_MENOS');
			$sheet->setCellValue('AH1', 'PANVEL');
			$sheet->setCellValue('AI1', 'MENOR_PRECO_POR_AI');
			$sheet->setCellValue('AJ1', 'MARGEM_VALOR');
			$sheet->setCellValue('AK1', 'CASHBACK');
			$sheet->setCellValue('AL1', 'MARGEM_APOS_CASHBACK');
			$sheet->setCellValue('AM1', 'MARGEM_BRUTA_PORCENTO');
			$sheet->setCellValue('AN1', 'DIFERENCA_PARA_O_MENOR_CONCORRENTE');
			$sheet->setCellValue('AO1', 'CURVA');
			$sheet->setCellValue('AP1', 'PBM');
			$sheet->setCellValue('AQ1', 'SITUACAO_DESCONTINUADO');
			$sheet->setCellValue('AR1', 'MARCA');
			$sheet->setCellValue('AS1', 'FABRICANTE');
			$sheet->setCellValue('AT1', 'OTC');
			$sheet->setCellValue('AU1', 'DESCONTINUADO');
			$sheet->setCellValue('AV1', 'CONTROLADO');
			$sheet->setCellValue('AW1', 'ATIVO');
			$sheet->setCellValue('AX1', 'ACAO');
			$rows = 2;
			$db = \Config\Database::connect();
			$comp = ($curve != '') ? "and Products.curve = '$curve'" : '';
			$comp_type = '';
			switch($type) {
					case "ruptura":
							$comp_type = "and Products.qty_stock_rms = 0 and Products.active = 1 and Products.descontinuado != 1";
							break;
					case "abaixo_custo":
							$comp_type = "and Products.current_gross_margin_percent < 0 and Products.active = 1 and Products.descontinuado != 1 and Products.qty_stock_rms > 0";
							break;
					case "estoque_exclusivo":
							$comp_type = "and Products.qty_competitors = 0 and Products.active = 1 and Products.descontinuado != 1 and Products.qty_stock_rms > 0";
							break;
					case "perdendo":
							$comp_type = "and Products.price_pay_only > Products.belezanaweb
														and Products.price_pay_only > Products.drogariasp
														and Products.price_pay_only > Products.ultrafarma
														and Products.price_pay_only > Products.paguemenos
														and Products.price_pay_only > Products.panvel
														and Products.price_pay_only > Products.drogaraia
														and Products.price_pay_only > Products.drogasil
														and Products.price_pay_only > Products.onofre
														and Products.active = 1 and Products.descontinuado != 1 and Products.qty_competitors_available > 0";
							break;
			}
			$products = $db->query("Select Products.sku as SKU,
															sum(vendas.qtd) as VENDA_ACUMULADA,
															format(sum(vendas.faturamento),2,'de_DE') as FATURAMENTO,
															format(Products.price_cost * sum(vendas.qtd),2,'de_DE') as CUSTO_TOTAL,
															 format(sum(vendas.faturamento) - Products.price_cost * sum(vendas.qtd),2,'de_DE') as MARGEM_BRUTA_TOTAL,
															 Products.reference_code as EAN,
															 Products.title as NOME,
															 principio_ativo.principio_ativo as PRINCIPIO_ATIVO,
															 principio_ativo.apresentacao as APRESENTACAO,
															 Products.department as DEPARTAMENTO,
															Products.category as CATEGORIA, Situation.situation as SITUACAO,
															Status.status as STATUS, REPLACE(Products.qty_stock_rms,'.',',') as ESTOQUE_RMS,
															Products.qty_stock as ESTOQUE_OCC, (Products.qty_stock - Products.qty_stock_rms) as DIFERENCA_OCC_RMS,
															REPLACE(tabulated_price, '.', ',' ) as PRECO_TABELADO, REPLACE(tabulated_price_suggestion, '.', ',' )  as SUGESTAO_TABELADO,
															Products.lowest_price_competitor AS CONCORRENTE_MENOR_PRECO, Products.qty_competitors as QTD_CONCORRENTES,
															Products.qty_competitors_available as QTD_CONCORRENTES_ATIVOS,REPLACE(lowest_price, '.', ',' ) AS MENOR_PRECO,
															 REPLACE(Products.price_cost, '.', ',' ) AS CUSTO,
															 REPLACE(Products.margin, '.', ',' ) AS MARGEM_BRUTA,
															REPLACE(Products.sale_price, '.', ',' ) AS PRECO_DE_VENDA, REPLACE(Products.current_price_pay_only, '.', ',' ) AS PAGUE_APENAS,
															 REPLACE(Products.drogasil, '.', ',' ) AS DROGASIL,
                               REPLACE(Products.ultrafarma, '.', ',' ) AS ULTRAFARMA,
                               REPLACE(Products.belezanaweb, '.', ',' ) AS BELEZA_NA_WEB,
                               REPLACE(Products.drogaraia, '.', ',' ) AS DROGARAIA,
                               REPLACE(Products.drogariasp, '.', ',' ) AS DROGARIASP,
                               REPLACE(Products.onofre, '.', ',' ) AS ONOFRE,
                               REPLACE(Products.paguemenos, '.', ',' ) AS PAGUE_MENOS,
                               REPLACE(Products.panvel, '.', ',' ) AS PANVEL,
															 REPLACE(Products.current_less_price_around, '.',',') as MENOR_PRECO_POR_AI,
															 REPLACE(Products.current_margin_value, '.',',') as MARGEM_VALOR, REPLACE(Products.current_cashback, '.',',') as CASHBACK,
															REPLACE(current_gross_margin, '.', ',' ) AS MARGEM_APOS_CASHBACK,
															REPLACE(Products.current_gross_margin_percent, '.',',') as MARGEM_BRUTA_PORCENTO,
															 REPLACE(Products.diff_current_pay_only_lowest, '.',',') as DIFERENCA_PARA_O_MENOR_CONCORRENTE,
															Products.curve as CURVA, Products.pbm as PBM, descontinuado.situation as SITUACAO_DESCONTINUADO,
															marca.marca as MARCA, marca.fabricante as FABRICANTE, Products.otc as OTC, Products.descontinuado as DESCONTINUADO,
															 Products.controlled_substance as CONTROLADO, Products.active as ATIVO, Products.acao as ACAO
															 from Products left join vendas on vendas.sku=Products.sku
															 INNER JOIN Situation on Products.situation_code_fk = Situation.code
															 INNER JOIN Status on Products.status_code_fk = Status.code INNER JOIN principio_ativo ON principio_ativo.sku = Products.sku
															 INNER JOIN descontinuado on Products.sku = descontinuado.sku
															 INNER JOIN marca on Products.sku = marca.sku WHERE 1=1 $comp group by sku")->getResult();
			foreach ($products as $val){
					$sheet->setCellValue('A' . $rows, $val->SKU);
					$sheet->setCellValue('B' . $rows, $val->VENDA_ACUMULADA);
					$sheet->setCellValue('C' . $rows, $val->FATURAMENTO);
					$sheet->setCellValue('D' . $rows, $val->CUSTO_TOTAL);
					$sheet->setCellValue('E' . $rows, $val->MARGEM_BRUTA_TOTAL);
					$sheet->setCellValue('F' . $rows, $val->EAN);
					$sheet->setCellValue('G' . $rows, $val->NOME);
					$sheet->setCellValue('H' . $rows, $val->PRINCIPIO_ATIVO);
					$sheet->setCellValue('I' . $rows, $val->APRESENTACAO);
					$sheet->setCellValue('J' . $rows, $val->DEPARTAMENTO);
					$sheet->setCellValue('K' . $rows, $val->CATEGORIA);
					$sheet->setCellValue('L' . $rows, $val->SITUACAO);
					$sheet->setCellValue('M' . $rows, $val->STATUS);
					$sheet->setCellValue('N' . $rows, $val->ESTOQUE_RMS);
					$sheet->setCellValue('O' . $rows, $val->ESTOQUE_OCC);
					$sheet->setCellValue('P' . $rows, $val->DIFERENCA_OCC_RMS);
					$sheet->setCellValue('Q' . $rows, $val->PRECO_TABELADO);
					$sheet->setCellValue('R' . $rows, $val->SUGESTAO_TABELADO);
					$sheet->setCellValue('S' . $rows, $val->CONCORRENTE_MENOR_PRECO);
					$sheet->setCellValue('T' . $rows, $val->QTD_CONCORRENTES);
					$sheet->setCellValue('U' . $rows, $val->QTD_CONCORRENTES_ATIVOS);
					$sheet->setCellValue('V' . $rows, $val->MENOR_PRECO);
					$sheet->setCellValue('W' . $rows, $val->CUSTO);
					$sheet->setCellValue('X' . $rows, $val->MARGEM_BRUTA);
					$sheet->setCellValue('Y' . $rows, $val->PRECO_DE_VENDA);
					$sheet->setCellValue('Z' . $rows, $val->PAGUE_APENAS);
					$sheet->setCellValue('AA' . $rows, $val->DROGASIL);
					$sheet->setCellValue('AB' . $rows, $val->ULTRAFARMA);
					$sheet->setCellValue('AC' . $rows, $val->BELEZA_NA_WEB);
					$sheet->setCellValue('AD' . $rows, $val->DROGARAIA);
					$sheet->setCellValue('AE' . $rows, $val->DROGARIASP);
					$sheet->setCellValue('AF' . $rows, $val->ONOFRE);
					$sheet->setCellValue('AG' . $rows, $val->PAGUE_MENOS);
					$sheet->setCellValue('AH' . $rows, $val->PANVEL);
					$sheet->setCellValue('AI' . $rows, $val->MENOR_PRECO_POR_AI);
					$sheet->setCellValue('AJ' . $rows, $val->MARGEM_VALOR);
					$sheet->setCellValue('AK' . $rows, $val->CASHBACK);
					$sheet->setCellValue('AL' . $rows, $val->MARGEM_APOS_CASHBACK);
					$sheet->setCellValue('AM' . $rows, $val->MARGEM_BRUTA_PORCENTO);
					$sheet->setCellValue('AN' . $rows, $val->DIFERENCA_PARA_O_MENOR_CONCORRENTE);
					$sheet->setCellValue('AO' . $rows, $val->CURVA);
					$sheet->setCellValue('AP' . $rows, $val->PBM);
					$sheet->setCellValue('AQ' . $rows, $val->SITUACAO_DESCONTINUADO);
					$sheet->setCellValue('AR' . $rows, $val->MARCA);
					$sheet->setCellValue('AS' . $rows, $val->FABRICANTE);
					$sheet->setCellValue('AT' . $rows, $val->OTC);
					$sheet->setCellValue('AU' . $rows, $val->DESCONTINUADO);
					$sheet->setCellValue('AV' . $rows, $val->CONTROLADO);
					$sheet->setCellValue('AW' . $rows, $val->ATIVO);
					$sheet->setCellValue('AX' . $rows, $val->ACAO);
					$rows++;
			}
			return $spreadsheet;
	}

	public function groups($group) {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'SKU');
			$sheet->setCellValue('B1', 'NOME');
			$sheet->setCellValue('C1', 'DEPARTAMENTO');
			$sheet->setCellValue('D1', 'CATEGORIA');
			$sheet->setCellValue('E1', 'QTD');
			$sheet->setCellValue('F1', 'VMD_ULT_7');
			$sheet->setCellValue('G1', 'PERCENTUAL_VMD_ULT_7');
			$sheet->setCellValue('H1', 'VMD_ULT_MES');
			$sheet->setCellValue('I1', 'PERCENTUAL_VMD_ULT_MES');
			$sheet->setCellValue('J1', 'VMD_ULT_3_MESES');
			$sheet->setCellValue('K1', 'FATURAMENTO');
			$rows = 2;
			$db = \Config\Database::connect();

			if ($group === "Termolábil") $comp = " and Products.termolabil = 1";
			else if ($group === "OTC") $comp = " and Products.otc = 1";
			else if ($group === "Controlados") $comp = " and Products.controlled_substance = 1";
			else if ($group === "PBM") $comp = " and Products.pbm = 1";
			else if ($group === "Cashback") $comp = " and Products.cashback > 0";
			else if ($group === "Home") $comp = " and Products.home = 1";
			else if ($group === "Ação") $comp = " and Products.acao != '' and Products.acao is not null";
			else if ($group === "Autocuidado") $comp = " and Products.category = 'AUTOCUIDADO'";
			else if ($group === "Similar") $comp = " and Products.category = 'SIMILAR'";
			else if ($group === "Marca") $comp = " and Products.category = 'MARCA'";
			else if ($group === "Genérico") $comp = " and Products.category = 'GENERICO'";
			else if ($group === "Higiene e Beleza") $comp = " and Products.category = 'HIGIENE' OR Products.category = 'HIGIENE E BELEZA'";
			else if ($group === "Mamãe e Bebê") $comp = " and Products.category = 'MAMÃE E BEBÊ'";
			else if ($group === "Dermocosmético") $comp = " and Products.category = 'DERMOCOSMETICO'";
			else if ($group === "Beleza") $comp = " and Products.category = 'BELEZA'";
			else if ($group !== "") $comp = " and Products.marca = '".strtoupper($group)."'";

			$products = $db->query("Select vendas.sku as SKU,
															Products.title as NOME,
															vendas.department as DEPARTAMENTO,
															Products.category as CATEGORIA,
															sum(vendas.qtd) as QTD,
															format(sum(vendas.faturamento),2,'de_DE') as FATURAMENTO
															from Products left join vendas on vendas.sku=Products.sku WHERE 1=1 $comp group by Products.sku")->getResult();
			$skus = implode("', '", array_map(function ($ar) { return $ar->SKU; }, $products));

			// Últimos 7 dias
			$weekly_query = $db->query("Select sku AS SKU, sum(qtd)/7 as weekly
																	from vendas WHERE data >= '".date('Y-m-d', strtotime("-7 days"))."'
																	and data <= '".date('Y-m-d')."'
																	and sku in ('$skus') group by sku", false)->getResult();

			// Últimos 30 dias
			$last_month_query = $db->query("Select sku AS SKU, sum(qtd)/30 as last_month
																			from vendas WHERE data >= '".date('Y-m-d', strtotime("-30 days"))."'
																			and data <= '".date('Y-m-d')."'
																			and sku in ('$skus') group by sku", false)->getResult();

			// Últimos 90 dias
			$last_3_months_query = $db->query("Select sku AS SKU, sum(qtd)/90 as last_3_months
																				 from vendas WHERE data >= '".date('Y-m-d', strtotime("-90 days"))."'
																				 and data <= '".date('Y-m-d')."'
				 																 and sku in ('$skus') group by sku", false)->getResult();

			foreach ($products as $val){
					$sku = $val->SKU;
					$ar = array_filter($weekly_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$weekly = isset(current((array)$ar)->weekly) ? current((array)$ar)->weekly : 0;

					$ar = array_filter($last_month_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$last_month = isset(current((array)$ar)->last_month) ? current((array)$ar)->last_month : 0;

					$ar = array_filter($last_3_months_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$last_3_months = isset(current((array)$ar)->last_3_months) ? current((array)$ar)->last_3_months : 0;

					if($weekly == 0) $percentual_vmd_ult_7 = 0;
					else $percentual_vmd_ult_7 = ($last_month == 0) ? 0 : number_to_amount((($weekly/$last_month) - 1)*100, 2, 'pt_BR');

					if($last_month == 0) $percentual_vmd_ult_mes = 0;
					else $percentual_vmd_ult_mes = ($last_3_months == 0) ? 0 : number_to_amount((($last_month/$last_3_months) - 1)*100, 2, 'pt_BR');

					$sheet->setCellValue('A' . $rows, $val->SKU);
					$sheet->setCellValue('B' . $rows, $val->NOME);
					$sheet->setCellValue('C' . $rows, $val->DEPARTAMENTO);
					$sheet->setCellValue('D' . $rows, $val->CATEGORIA);
					$sheet->setCellValue('E' . $rows, $val->QTD);
					$sheet->setCellValue('F' . $rows, $weekly);
					$sheet->setCellValue('G' . $rows, $percentual_vmd_ult_7."%");
					$sheet->setCellValue('H' . $rows, $last_month);
					$sheet->setCellValue('I' . $rows, $percentual_vmd_ult_mes."%");
					$sheet->setCellValue('J' . $rows, $last_3_months);
					$sheet->setCellValue('K' . $rows, $val->FATURAMENTO);
					$rows++;
			}
			return $spreadsheet;
	}

	public function sales($department) {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$sheet->setCellValue('A1', 'SKU');
			$sheet->setCellValue('B1', 'NOME');
			$sheet->setCellValue('C1', 'DEPARTAMENTO');
			$sheet->setCellValue('D1', 'CATEGORIA');
			$sheet->setCellValue('E1', 'QTD');
			$sheet->setCellValue('F1', 'VMD_ULT_7');
			$sheet->setCellValue('G1', 'PERCENTUAL_VMD_ULT_7');
			$sheet->setCellValue('H1', 'VMD_ULT_MES');
			$sheet->setCellValue('I1', 'PERCENTUAL_VMD_ULT_MES');
			$sheet->setCellValue('J1', 'VMD_ULT_3_MESES');
			$sheet->setCellValue('K1', 'FATURAMENTO');
			$rows = 2;
			$db = \Config\Database::connect();

			$comp = '';
			if ($department !== "geral") $comp = " and vendas.department = '$department'";
			$products = $db->query("Select vendas.sku as SKU,
															Products.title as NOME,
															vendas.department as DEPARTAMENTO,
															Products.category as CATEGORIA,
															sum(vendas.qtd) as QTD,
															format(sum(vendas.faturamento),2,'de_DE') as FATURAMENTO
															 from Products left join vendas on vendas.sku=Products.sku WHERE 1=1 $comp group by Products.sku")->getResult();

			 $skus = implode("', '", array_map(function ($ar) { return $ar->SKU; }, $products));

		  // Últimos 7 dias
		  $weekly_query = $db->query("Select sku AS SKU, sum(qtd)/7 as weekly
		 														  from vendas WHERE data >= '".date('Y-m-d', strtotime("-7 days"))."'
		 														  and data <= '".date('Y-m-d')."'
		 														  and sku in ('$skus') group by sku", false)->getResult();

		  // Últimos 30 dias
		  $last_month_query = $db->query("Select sku AS SKU, sum(qtd)/30 as last_month
		 																  from vendas WHERE data >= '".date('Y-m-d', strtotime("-30 days"))."'
		 																  and data <= '".date('Y-m-d')."'
		 																  and sku in ('$skus') group by sku", false)->getResult();

		  // Últimos 90 dias
		  $last_3_months_query = $db->query("Select sku AS SKU, sum(qtd)/90 as last_3_months
		 																	   from vendas WHERE data >= '".date('Y-m-d', strtotime("-90 days"))."'
		 																	   and data <= '".date('Y-m-d')."'
		 	 																   and sku in ('$skus') group by sku", false)->getResult();
			foreach ($products as $val){
					$sku = $val->SKU;
					$ar = array_filter($weekly_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$weekly = isset(current((array)$ar)->weekly) ? current((array)$ar)->weekly : 0;

					$ar = array_filter($last_month_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$last_month = isset(current((array)$ar)->last_month) ? current((array)$ar)->last_month : 0;

					$ar = array_filter($last_3_months_query, function($item) use($sku) {
							return $item->SKU == $sku;
					});
					$last_3_months = isset(current((array)$ar)->last_3_months) ? current((array)$ar)->last_3_months : 0;

					if($weekly == 0) $percentual_vmd_ult_7 = 0;
					else $percentual_vmd_ult_7 = ($last_month == 0) ? 0 : number_to_amount((($weekly/$last_month) - 1)*100, 2, 'pt_BR');

					if($last_month == 0) $percentual_vmd_ult_mes = 0;
					else $percentual_vmd_ult_mes = ($last_3_months == 0) ? 0 : number_to_amount((($last_month/$last_3_months) - 1)*100, 2, 'pt_BR');

					$sheet->setCellValue('A' . $rows, $val->SKU);
					$sheet->setCellValue('B' . $rows, $val->NOME);
					$sheet->setCellValue('C' . $rows, $val->DEPARTAMENTO);
					$sheet->setCellValue('D' . $rows, $val->CATEGORIA);
					$sheet->setCellValue('E' . $rows, $val->QTD);
					$sheet->setCellValue('F' . $rows, $weekly);
					$sheet->setCellValue('G' . $rows, $percentual_vmd_ult_7."%");
					$sheet->setCellValue('H' . $rows, $last_month);
					$sheet->setCellValue('I' . $rows, $percentual_vmd_ult_mes."%");
					$sheet->setCellValue('J' . $rows, $last_3_months);
					$sheet->setCellValue('K' . $rows, $val->FATURAMENTO);
					$rows++;
			}
			return $spreadsheet;
	}
}
