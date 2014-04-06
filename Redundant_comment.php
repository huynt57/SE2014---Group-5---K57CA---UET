/**
*If the cleandata array is empty
*this is an INSERT of o new row
*Otherwise, it is an UPDATE
*/

If (empty($this->cleandata())){
	return $this->do_insert();
} else {
	return $this->do_update();
}