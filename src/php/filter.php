<?php
function filterIsValid($item,$filterValue): bool
{
    if ($filterValue=="all") return true;
    if ($filterValue=="distance" && $item["price"] == 0) return true;
    if ($filterValue=="price" && $item["price"] > 0)  return true;
    if ($filterValue=="disabled") return true;
    return false;
}
?>