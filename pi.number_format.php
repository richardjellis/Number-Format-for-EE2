<?php

// Wrapper for the PHP number_format() function
// Original: Robert Wallis - SmilingRob@gmail.com - 2010-08-27

class number_format
{
	function number_format($direct='')
	{
		$this->EE =& get_instance();
		
		// support all three ways of passing a number
		$number = 0.0;
		if (!empty($direct) && 0.0 != ($number=floatval($direct))) {
			// data directly from Publish
			// $number set in if clause
		} else if (
			NULL != ($number=$this->EE->TMPL->fetch_param('number', NULL)) &&
			0.0 != floatval($number)
		) {
			// data directly from the "number" paramater
			// $number set in if clause;
		} else if (
			'' != ($number=$this->EE->TMPL->tagdata) &&
			0.0 != floatval($number)
		) {
			// data from inside the tag contents
			// $number set in if clause;
		}
		
		$decimals = $this->EE->TMPL->fetch_param('decimals', NULL);
		$dec_point = $this->EE->TMPL->fetch_param('dec_point', NULL);
		$thousands_sep = $this->EE->TMPL->fetch_param('thousands_sep', NULL);
		
		$this->return_data = number_format($number, $decimals, $dec_point, $thousands_sep);
	}
}
