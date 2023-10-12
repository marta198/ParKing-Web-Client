<?php  
function sortByPriceAsc($a, $b) {
        return $a["price"] > $b["price"];
}
function sortByPriceDesc($a, $b) {
    return $a["price"] < $b["price"];
}

?>