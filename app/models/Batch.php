<?php

class Batch extends \Eloquent {

	protected $table = 'batches';
	// Don't forget to fill this array
	protected $fillable = ['name','description'];

}