function setTable(Table $table) {
    $this-validateTable($table);
    $this->_table = $table;
    $this->_tableClass = get_class($table);
    $this->_connected = true;
}
