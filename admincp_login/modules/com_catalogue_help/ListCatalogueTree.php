<?php

$title = $arr_lang['cat_manage'];

$xtemplate->path = 'com_catalogue_help/';

$content = $xtemplate->load('ListCatalogueTree');

$sql = "SELECT categorieshelp_id,
				   categorieshelp_name,
				   parenthelp_id 
			FROM   categorieshelp 
			WHERE  languagehelp ='" . $_SESSION['lag'] . "' ORDER BY sorthelp_order";

$mysql->setQuery($sql);

$row = $mysql->loadAllRow();

$n = count($row);

$catsTree = '';

for ($i = 0; $i < $n; ++$i) {
    $id = $row[$i]['categorieshelp_id'];

    $parent = $row[$i]['parenthelp_id'];

    $name = $row[$i]['categorieshelp_name'];

    if ($parent == '0') {
        $catsTree .="d.add($id,$parent,'<b>$name</b>','./?show=CatalogueOpt_help&id=$id','$name');";
    } else {
        $total = get_total_product($id);

        $catsTree .="d.add($id,$parent,'$name ($total)','./?show=CatalogueOpt_help&id=$id','$name');";
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