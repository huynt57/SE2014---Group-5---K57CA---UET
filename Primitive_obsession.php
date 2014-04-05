/**
 * Were any of the changed columns part of the primary key?
 */
$pkDiffData = array_intersect_key(
    $diffData, array_flip((array)$this->_primary));
}

/**
 *It's clever, obscure, therefore error-prone
 */