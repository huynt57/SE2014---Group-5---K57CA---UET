private function executeCascadingUpdates($pkDiffData) {
    if (count($pkDiffData) > 0) {
        $depTables = $this->_getTable()->getDependentTables();
        if (!empty($depTables)) {
            $pkNew = $this->_getPrimaryKey(true);
            $pkOld = $this->_getPrimaryKey(false);
            foreach ($depTables as $tableClass) {
                $t = $this->_getTableFromString($tableClass);
                $t->_cascadeUpdate(
                    $this->getTableClass(), $pkOld, $pkNew);
            }
        }
    }
    return array($pkDiffData,$tableClass,
                 $depTables,$pkNew,$pkOld,$t);
}


executeCascadingUpdates($pk_Diff_Data);


.......


executeCascadingUpdates($pk_Diff_Data);