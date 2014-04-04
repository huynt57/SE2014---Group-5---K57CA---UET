// Execute cascading updates against dependent tables.
// Do this only if primary key value(s) were changed.
if (count($pkDiffData) > 0) {
    $depTables = $this->_getTable()->getDependentTables();
    if (!empty($depTables)) {
        $pkNew = $this->_getPrimaryKey(true);
        $pkOld = $this->_getPrimaryKey(false);
        foreach ($depTables as $tableClass) {
            $t = $this->_getTableFromString($tableClass);
            $t->_cascadeUpdate($this->getTableClass(),
                 $pkOld, $pkNew);
        }
    }

	.........
	
// Execute cascading updates against dependent tables.
// Do this only if primary key value(s) were changed.
if (count($pkDiffData) > 0) {
    $depTables = $this->_getTable()->getDependentTables();
    if (!empty($depTables)) {
        $pkNew = $this->_getPrimaryKey(true);
        $pkOld = $this->_getPrimaryKey(false);
        foreach ($depTables as $tableClass) {
            $t = $this->_getTableFromString($tableClass);
            $t->_cascadeUpdate($this->getTableClass(),
                 $pkOld, $pkNew);
        }
    }
