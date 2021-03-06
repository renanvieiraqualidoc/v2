<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model{
    public function getProductsQuantityByDepartmentAndCompetitor($department, $competitor) {
        return $this->db->table('Products')
                        ->select('count(1) as qtd')
                        ->where('diff_pay_only_lowest <', 0)
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->where('department', str_replace("_", " ", $department))
                        ->like('lowest_price_competitor', $competitor)
                        ->get()->getResult()[0]->qtd;
    }

    public function getDataFalteiro($initial_date, $final_date, $initial_limit, $final_limit, $order_column, $sort_order, $search) {
        $comp_search = ($search != '') ? " and produto like '%".strtolower($search)."%'" : '';
        $comp = '';
        if($initial_date != "") $comp .= " and data_cadastro >= '$initial_date'";
        if($final_date != "") $comp .= " and data_cadastro <= '$final_date'";
        $results = $this->db->query("SELECT produto as sku, count(1) as qtd FROM falteiro
                                 WHERE 1=1 $comp $comp_search
                                 GROUP BY produto", false)->getResult();
        return json_encode(array('products' => $results,
                                 'qtd' => count($results)));
    }

    public function getProductsByDepartment($department, $initial_limit, $final_limit, $order_column, $sort_order, $search) {
        $comp_search = ($search != '') ? "and (sku like '%".strtolower($search)."%' or title like '%".strtolower($search)."%')" : '';
        $qtd = $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE diff_pay_only_lowest < 0
                                 and active = 1
                                 and descontinuado != 1
                                 and department = '$department'
                                 $comp_search", false)->getResult()[0]->qtd;
        return json_encode(array('products' => $this->db->query("SELECT sku, title, department, category, qty_stock_rms,
                                                                 qty_competitors_available, price_cost, price_pay_only,
                                                                 current_less_price_around, gross_margin_percent,
                                                                 diff_pay_only_lowest, curve
                                                                 FROM Products
                                                                 WHERE diff_pay_only_lowest < 0
                                                                 and active = 1
                                                                 and descontinuado != 1
                                                                 and department = '$department'
                                                                 $comp_search
                                                                 ORDER BY $order_column $sort_order
                                                                 LIMIT $initial_limit, $final_limit", false)->getResult(),
                                 'qtd' => $qtd));
    }

    public function getProductsCategoriesByDepartment($department) {
        $response = [];
        $data = $this->db->table('Products')
                         ->select('category')
                         ->where('diff_pay_only_lowest <', 0)
                         ->where('active', 1)
                         ->where('descontinuado !=', 1)
                         ->where('category !=', $department)
                         ->where('department', str_replace("_", " ", $department))
                         ->groupBy("category")
                         ->get()->getResult();
        foreach($data as $row) {
            array_push($response, $row->category);
        }
        return $response;
    }

    public function getProductsQuantityByDepartmentAndCategories($department, $category) {
        return $this->db->table('Products')
                        ->select('count(1) as qtd')
                        ->where('diff_pay_only_lowest <', 0)
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->where('department', str_replace("_", " ", $department))
                        ->where('category', $category)
                        ->get()->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingDrogaraia() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE drogaraia < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and drogaraia is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingBelezanaweb() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE belezanaweb < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and belezanaweb is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingDrogariasp() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE drogariasp < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and drogariasp is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingDrogasil() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE drogasil < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and drogasil is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingOnofre() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE onofre < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and onofre is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingPaguemenos() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE paguemenos < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and paguemenos is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingUltrafarma() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE ultrafarma < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and ultrafarma is not null", false)->getResult()[0]->qtd;
    }

    public function getQuantityProductsLosingPanvel() {
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE panvel < price_pay_only
                                     and active = 1
                                     and descontinuado != 1
                                     and panvel is not null", false)->getResult()[0]->qtd;
    }

    public function getTotalStockRMS() {
        return $this->db->table('Products')
                        ->select('sum(qty_stock_rms) as qtd')
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->get()->getResult()[0]->qtd;
    }

    public function getTotalPriceCost() {
        return $this->db->table('Products')
                        ->select('sum(price_cost*qty_stock_rms) as total')
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->get()->getResult()[0]->total;
    }

    public function getTotalPricePayOnly() {
        return $this->db->table('Products')
                        ->select('sum(price_pay_only*qty_stock_rms) as total')
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->get()->getResult()[0]->total;
    }

    public function getTotalCashback() {
        return $this->db->table('Products')
                        ->select('sum(current_cashback*qty_stock_rms) as total')
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->get()->getResult()[0]->total;
    }

    public function getAvgGrossMargin($curve = '', $department = '', $category = '', $group = '', $margin_from = '', $margin_at = '', $disc_from = '', $disc_at = '', $skus = []) {
        $query = $this->db->table('Products')
                          ->select('avg(gross_margin_percent) as margin')
                          ->where('active', 1)
                          ->where('descontinuado !=', 1)
                          ->where('qty_stock_rms >', 0);
        if ($curve != '') $query->where('curve', $curve);
        if ($department != '') $query->where('department', strtoupper($department));
        if ($category != '') $query->where('category', strtoupper($category));
        if ($group == 'perdendo') $query->where('diff_pay_only_lowest <', 0);
        else if($group == 'top') $query->where($group, 1);
        else if($group != '') $query->where($group, 1);
        if($margin_from != "" && $margin_at != "") $query->where('gross_margin_percent >=', floatval($margin_from)/100)->where('gross_margin_percent <=', floatval($margin_at)/100);
        if($disc_from != "" && $disc_at != "") $query->where('diff_pay_only_lowest >=', floatval($disc_from)/100)->where('diff_pay_only_lowest <=', floatval($disc_at)/100);
        if(!empty($skus)) $query->whereIn('sku', explode(",", $skus));
        return $query->get()->getResult()[0]->margin;
    }

    public function getAvgGrossMarginAll($curve = '') {
        $query = $this->db->table('Products')
                          ->select('avg(gross_margin_percent) as margin')
                          ->where('active', 1)
                          ->where('descontinuado !=', 1)
                          ->where('qty_stock_rms >', 0);
        if ($curve != '') $query->where('curve', $curve);
        return $query->get()->getResult()[0]->margin;
    }

    public function getAvgDiffMargin($curve = '') {
        $query = $this->db->table('Products')
                          ->select('avg(diff_pay_only_lowest) as margin')
                          ->where('active', 1)
                          ->where('descontinuado', 1)
                          ->where('qty_stock_rms >', 0);
        if ($curve != '') $query->where('curve', $curve);
        return $query->get()->getResult()[0]->margin;
    }

    public function getTotalBreak($curve = '') {
        $query = $this->db->table('Products')
                          ->select('count(1) as qtd')
                          ->where('active', 1)
                          ->where('qty_stock_rms', 0)
                          ->where('descontinuado !=', 1);
        if ($curve != '') $query->where('curve', $curve);
        return $query->get()->getResult()[0]->qtd;
    }

    public function getTotalUnderCost($curve = '') {
        $query = $this->db->table('Products')
                          ->select('count(1) as qtd')
                          ->where('active', 1)
                          ->where('gross_margin_percent <', 0)
                          ->where('qty_stock_rms >', 0)
                          ->where('descontinuado !=', 1);
        if ($curve != '') $query->where('curve', $curve);
        return $query->get()->getResult()[0]->qtd;
    }

    public function getTotalExclusiveStock($curve = '') {
        $query = $this->db->table('Products')
                          ->select('count(1) as qtd')
                          ->where('active', 1)
                          ->where('qty_competitors', 0)
                          ->where('qty_stock_rms >', 0)
                          ->where('descontinuado !=', 1);
        if ($curve != '') $query->where('curve', $curve);
        return $query->get()->getResult()[0]->qtd;
    }

    public function getTotalLosingAll($curve = '') {
        $comp = $curve != '' ? "and curve = '$curve'" : '';
        return $this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                 WHERE price_pay_only > belezanaweb and price_pay_only > drogariasp
                                 and price_pay_only > ultrafarma and price_pay_only > paguemenos
                                 and price_pay_only > panvel and price_pay_only > drogaraia
                                 and price_pay_only > drogasil
                                 and price_pay_only > onofre
                                 and qty_competitors_available > 0
                                 and active = 1
                                 $comp
                                 and descontinuado != 1", false)->getResult()[0]->qtd;
    }

    public function getFieldsToMarginAndFat($skus) {
        return $this->db->table('Products')
                        ->select('sku as productCode, price_cost')
                        ->where('active', 1)
                        ->where('descontinuado !=', 1)
                        ->whereIn('sku', $skus)
                        ->get()->getResult();
    }

    public function getTotalSkus($type = '', $curve = '', $status = '', $situation = '') {
        $query = $this->db->table('Products')->select('count(1) as qtd');
        if ($type == 'break') $query->where('qty_stock_rms', 0)->where('active', 1)->where('descontinuado !=', 1);
        if ($type == 'under_cost') $query->where('gross_margin_percent <', 0)->where('qty_stock_rms >', 0)->where('active', 1)->where('descontinuado !=', 1);
        if ($type == 'exclusive_stock') $query->where('qty_competitors', 0)->where('qty_stock_rms >', 0)->where('active', 1)->where('descontinuado !=', 1);
        $where = "price_pay_only > belezanaweb and price_pay_only > drogariasp
									and price_pay_only > ultrafarma and price_pay_only > paguemenos
									and price_pay_only > panvel and price_pay_only > drogaraia
									and price_pay_only > drogasil and price_pay_only > onofre
									and active = 1 and descontinuado != 1 and qty_competitors_available > 0";
        if ($type == 'medicamento') $query->where('department', 'MEDICAMENTO')->where($where);
        if ($type == 'perfumaria') $query->where('department', 'PERFUMARIA')->where($where);
        if ($type == 'nao medicamento') $query->where('department', 'NAO MEDICAMENTO')->where($where);
        if ($curve != '') $query->where('curve', $curve);
        if ($status != '') $query->where('status_code_fk', $status);
        if ($situation != '') $query->where('situation_code_fk', $situation);
        return $query->get()->getResult()[0]->qtd;
    }

    public function getSkus($type = '', $curve = '', $initial_limit, $final_limit, $order_column, $sort_order, $search) {
        $comp = ($curve != '') ? "and Products.curve = '$curve'" : '';
        $comp_search = ($search != '') ? "and (Products.sku like '%".strtolower($search)."%' or Products.title like '%".strtolower($search)."%')" : '';
        $comp_type = "";
        if($type != '') {
            switch($type) {
                case "break":
                    $comp_type = "and Products.active = 1 and Products.qty_stock_rms = 0 and Products.descontinuado != 1";
                    break;
                case "under_cost":
                    $comp_type = "and Products.gross_margin_percent < 0 and Products.active = 1 and Products.descontinuado != 1 and Products.qty_stock_rms > 0";
                    break;
                case "exclusive_stock":
                    $comp_type = "and Products.qty_competitors = 0 and Products.active = 1 and Products.descontinuado != 1 and Products.qty_stock_rms > 0";
                    break;
                case "losing_all":
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
        }
        $qtd = count($this->db->query("SELECT COUNT(1) AS qtd FROM Products
                                       INNER JOIN marca ON marca.sku = Products.sku
                                       LEFT JOIN vendas ON vendas.sku = Products.sku
                                       WHERE 1=1
                                       $comp
                                       $comp_search
                                       $comp_type
                                       GROUP BY Products.sku", false)->getResult());
        return json_encode(array('products' => $this->db->query("SELECT Products.sku,Products.title, Products.department, Products.category, Products.price_cost,
                                                                 Products.sale_price, Products.price_pay_only, Products.current_less_price_around,
                                                                 Products.lowest_price_competitor, Products.gross_margin_percent, Products.diff_pay_only_lowest,
                                                                 Products.curve, Products.qty_stock_rms, Products.qty_competitors, marca.marca, sum(vendas.qtd) as vendas,
                                                                 Products.status_code_fk as status, Products.situation_code_fk as situation, Products.acao, pmc.pmc, pmc.preco_fabrica
                                                                 FROM Products
                                                                 INNER JOIN marca ON marca.sku = Products.sku
                                                                 LEFT JOIN vendas ON vendas.sku = Products.sku
                                                                 LEFT JOIN pmc ON pmc.sku = Products.sku
                                                                 WHERE 1=1
                                                                 $comp
                                                                 $comp_search
                                                                 $comp_type
                                                                 GROUP BY Products.sku
                                                                 ORDER BY $order_column $sort_order
                                                                 LIMIT $initial_limit, $final_limit", false)->getResult(),
                                 'qtd' => $qtd));
    }

    public function getDepartments() {
        return $this->db->table('Products')->distinct()->select('department')->where('department !=', "")->where('department !=', "#N/D")->get()->getResult();
    }

    public function getCategories() {
        return $this->db->table('Products')->distinct()->select('category')->where('category !=', "")->where('category !=', "#N/D")->get()->getResult();
    }

    public function getProductsByTitle($titles) {
        return $this->db->table('Products')->select('sku, category, title')->whereIn('title', $titles)->get()->getResult();
    }

    public function getProductsGoogleShopping() {
        return $this->db->table('google_shopping')->select('sku,
                                                            title,
                                                            description,
                                                            link,
                                                            image_link,
                                                            product_type,
                                                            google_product_category,
                                                            brand,
                                                            gtin,
                                                            price,
                                                            cashback')->get()->getResult();
    }

    public function getActiveProducts() {
        return $this->db->table('Products')->select('sku')->where('active', '1')->where('descontinuado !=', '1')->get()->getResult();
    }

    public function checkProductExists($sku) {
        return $this->db->table('google_shopping')->select('count(1) as qtd')->where('sku', $sku)->get()->getResult()[0]->qtd;
    }

    public function updatePriceAndStock($sku) {
        return $this->db->simpleQuery("UPDATE google_shopping SET price = (SELECT price FROM Products WHERE sku = '$sku'),
                                                                  quantity = (SELECT quantity FROM Products WHERE sku = '$sku'),
                                                                  active = (SELECT active FROM Products WHERE sku = '$sku')
                                       WHERE sku = '$sku'");
    }

    public function insertNewProductGoogleXML($sku) {
        return $this->db->simpleQuery("INSERT INTO google_shopping (sku, title, brand, gtin, price, quantity, cashback, active)
                                      (SELECT '$sku', title, marca, reference_code, price_pay_only, qty_stock_rms, IF(cashback > 0, 1, 0), 1 FROM Products WHERE sku = '$sku')");
    }

    public function updateDataInfoGoogleXML($sku, $description, $link, $image_link, $product_type, $google_product_category) {
        return $this->db->simpleQuery("UPDATE google_shopping SET description = '$description', link = '$link', image_link = '$image_link', product_type = '$product_type', google_product_category = $google_product_category WHERE sku = '$sku'");
    }
}
