<?php
// header('Content-Type: application/json');

function getElementsByClassName($dom, $ClassName, $tagName=null, $id = null) {
    if($tagName){
        $Elements = $dom->getElementsByTagName($tagName);
    }
    else {
        $Elements = $dom->getElementsByTagName("*");
    }
    $Matched = array();
    for($i=0;$i<$Elements->length;$i++) {
        if($Elements->item($i)->attributes->getNamedItem('class')){
            if($Elements->item($i)->attributes->getNamedItem('class')->nodeValue == $ClassName) {
                $Matched[]=$Elements->item($i);
            }
        }
    }
    // libxml_use_internal_errors(true);
    // libxml_clear_errors();
    $json = array();
    foreach($Matched as $item) {
        $json [] = $item->textContent;
    }

    $data = json_encode($json);
    $data = $json;
    return $data;
}

