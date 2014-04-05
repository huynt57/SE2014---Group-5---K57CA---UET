function setTable(Table $table){
    $tableClass = get_class($table);
    if (! $table instanceof $this->_tableClass) {
        require_once 'My_Exception.php';
        throw new My_exception("blah blah");
    }
    $this->_table = $table;
    $this->_tableClass = $tableClass;
    $info = $this->_table->info();
    if ($info['cols'] != array_keys($this->_data)) {
        require_once 'My_Exception.php';
        throw new My_exception("blah blah");
    }
    if (!array_intersect((array)$this->_primary, info['primary'])?
        == (array) $this->_primary) {
        require_once 'My_Exception.php';
        throw new My_exception("blah blah");
    }
    $this->_connected = true;
}