/**
 * Were any of the changed columns part of the primary key?
 */
foreach ((array)$this->_primary as $pkName) {
    if (array_key_exists($pkName,$diffData))?
        $pkDiffData[$pkName] = $diffData[$pkName];
}
