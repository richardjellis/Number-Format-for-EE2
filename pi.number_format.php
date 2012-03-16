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
		if (!empty($direct) && 0.0 != floatval($direct)) {
			// data directly from Publish
			// $number set in if clause
			$number = floatval($direct);
		} else if (
			NULL !== $this->EE->TMPL->fetch_param('number', NULL) &&
			0.0 != floatval($this->EE->TMPL->fetch_param('number', NULL))
		) {
			// data directly from the "number" paramater
			// $number set in if clause;
			$number = $this->EE->TMPL->fetch_param('number', NULL);
		} else if (
			'' != $this->EE->TMPL->tagdata &&
			0.0 != floatval($this->EE->TMPL->tagdata)
		) {
			// data from inside the tag contents
			// $number set in if clause;
			$number = $this->EE->TMPL->tagdata;
		}

		$decimals = $this->EE->TMPL->fetch_param('decimals', NULL);
		$dec_point = $this->EE->TMPL->fetch_param('dec_point', NULL);
		$thousands_sep = $this->EE->TMPL->fetch_param('thousands_sep', NULL);

		$this->return_data = number_format('', $decimals, $dec_point, $thousands_sep);
	}
}
