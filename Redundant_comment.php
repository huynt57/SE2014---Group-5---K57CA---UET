If (empty($this->cleandata())){
	return $this->do_insert();
} else {
	return $this->do_update();
}