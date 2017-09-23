<?php

$title = $arr_lang['cat_manage'];

$xtemplate->path = 'com_catalogue_introduce/';

$content = $xtemplate->load('ListCatalogueTree');

$sql = "SELECT categoriesintroduce_id,
				   categoriesintroduce_name,
				   parentintroduce_id 
			FROM   categoriesintroduce 
			WHERE  languageintroduce ='" . $_SESSION['lag'] . "' ORDER BY sortintroduce_order";

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$catsTree = '';

for ($i = 0; $i < $n; ++$i) {
    $id = $row[$i]['categoriesintroduce_id'];

    $parent = $row[$i]['parentintroduce_id'];

    $name = $row[$i]['categoriesintroduce_name'];

    if ($parent == '0') {
        $catsTree .="d.add($id,$parent,'<b>$name</b>','./?show=CatalogueOpt_introduce&id=$id','$name');";
    } else {
        $total = get_total_product($id);

        $catsTree .="d.add($id,$parent,'$name ($total)','./?show=CatalogueOpt_introduce&id=$id','$name');";
    }
}

$content = $xtemplate->replace($content, array(
    'catsTree' => $catsTree,
    'viewlist' => $arr_lang['viewlist'],
    'cat_managertree' => $arr_lang['cat_managertree'],
    'expand' => $arr_lang['expand'],
    'collapse' => $arr_lang['collapse'],
        ));

$script = $xtemplate->get_block_from_str($content, "SCRIPT");

$content = $xtemplate->assign_blocks_content($content, array("SCRIPT" => ''));
?>