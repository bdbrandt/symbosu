<?php

class SpecProcNlpParserLBCCBryophyte extends SpecProcNlpParserLBCCCommon {

	function __construct($catalogNumber="") {
		parent::__construct($catalogNumber);
	}

	protected function getLabelInfo($str) {
		if($str) {
			if($this->isFontinalaceaeExsiccataeLabel($str)) return $this->doFontinalaceaeExsiccataeLabel($str);
			else if($this->isKryptogamaeExsiccatiVindobonensiLabel($str)) return $this->doKryptogamaeExsiccatiVindobonensiLabel($str);
			else if($this->isFryeMossExsiccatiLabel($str)) return $this->doFryeMossExsiccatiLabel($str);
			else if($this->isHepaticaeEuropeaeExsiccatiaeLabel($str)) return $this->doHepaticaeEuropeaeExsiccatiaeLabel($str);
			else if($this->isBryophytaTerraNovLabradorLabel($str)) return $this->doBryophytaTerraNovLabradorLabel($str);
			else if($this->isBryophytaNeotropicaExsiccataLabel($str)) return $this->doBryophytaNeotropicaExsiccataLabel($str);
			else if($this->isBryophytaSelectaExsiccataLabel($str)) return $this->doBryophytaSelectaExsiccataLabel($str);
			else if($this->isHepaticaeJaponicaeExsiccataeLabel($str)) return $this->doHepaticaeJaponicaeExsiccataeLabel($str);
			else if($this->isBryophytorumTyporumExsiccataLabel($str)) return $this->doBryophytorumTyporumExsiccataLabel($str);
			else if($this->isSphagnaBorealiAmericanaExsiccataLabel($str)) return $this->doSphagnaBorealiAmericanaExsiccataLabel($str);
			else if($this->isMossesOfTheInteriorHighlandsExsiccataeLabel($str)) return $this->doMossesOfTheInteriorHighlandsExsiccataeLabel($str);
			else if($this->isCryptogamaeGermaniaeExsiccataeLabel($str)) return $this->doCryptogamaeGermaniaeExsiccataeLabel($str);
			else if($this->isBryophytaArcticaExsiccataLabel($str)) return $this->doBryophytaArcticaExsiccataLabel($str);
			else if($this->isBryophytaHawaiicaExsiccataLabel($str)) return $this->doBryophytaHawaiicaExsiccataLabel($str);
			else if($this->isPlantaeUruguayensesExsiccataeLabel($str)) return $this->doPlantaeUruguayensesExsiccataeLabel($str);
			else if($this->isOrthotrichaceaeBorealiAmericanaeExsiccataeLabel($str)) return $this->doOrthotrichaceaeBorealiAmericanaeExsiccataeLabel($str);
			else if($this->isReliquiaeFlowersianaeLabel($str)) return $this->doReliquiaeFlowersianaeLabel($str);
			else return $this->doGenericLabel($str);
		}
		return array();
	}

	private function isFontinalaceaeExsiccataeLabel($s) {
		$pat = "/.*F[O0Q]NT[1Il!|]NA[1Il!|]A[CGOQ]EAE EXS[1Il!|][CGOQ]{2}AT.*/is";
		if(preg_match($pat, $s)) return true;
		else return false;
	}

	private function doFontinalaceaeExsiccataeLabel($s) {
		$pattern =
			array
			(
				"/.?F[O0Q]NT[1Il!|]NA[1Il!|]A[CGOQ]EAE EXS[1Il!|][CGOQ]{2}AT.{0,3}/i",
				"/Ed[1Il!|]t[ce]d b[yv] Bru[ce]{2} A[1Il!|]{2}[ce]n/i",
				"/D[1Il!|]str[1Il!|]but[ce]d b[yv] M[1Il!|][s5]{2}our[1Il!|] B[o0]tan[1Il!|]ca[1Il!|] [CGOQ]ard[ce]n/i"
			);
		$replacement =
			array
			(
				"",
				"",
				""
			);
		return $this->doGenericLabel(str_replace("\n\n", "\n", trim(preg_replace($pattern, $replacement, $s, -1))), "48");
	}

	private function isFryeMossExsiccatiLabel($s) {
		$pat = "/.*Frye. M.[S5$]{2} Exs[1Il!|][CG]{2}at[1Il!|].*/is";
		if(preg_match($pat, $s)) return true;
		else return false;
	}

	private function doFryeMossExsiccatiLabel($s) {
		$pattern =
			array
			(
				"/.?Frye. M.[S5$]{2} Exs[1Il!|][CG]{2}at[1Il!|]/i"
			);
		$replacement =
			array
			(
				""
			);
		return $this->doGenericLabel(str_replace("\n\n", "\n", trim(preg_replace($pattern, $replacement, $s, -1))), "109");
	}

	private function isHepaticaeEuropeaeExsiccatiaeLabel($s) {
		if(preg_match("/.*H[ce]patica[ce] [ce]ur[o0]pa[ce]a[ce] [ce]xsi[ce]{2}ata?.*/is", $s)) return true;
		else if(preg_match("/[S5][ce]hiffn[ce]r. H[ce]pat[1Il!|]ca[ce] [ce]ur[o0]pa[ce]a[ce] [ce].*/is", $s)) return true;
		else return false;
	}

	private function doHepaticaeEuropeaeExsiccatiaeLabel($s) {
		$pattern =
			array
			(
				"/(?:[VW][.,] )?[S5][ce]hiffn[ce]r. H[ce]patica[ce] [ce]ur[o0]pa[ce]a[ce] [ce]xsi[ce]{2}ata?.?/i",
			);
		$replacement =
			array
			(
				""
			);
		return $this->doGenericLabel(str_replace("\n\n", "\n", trim(preg_replace($pattern, $replacement, $s, -1))), "64");
	}

	private function isBryophytaTerraNovLabradorLabel($s) {
		if(preg_match("/.*BRY[0O]PHYTA EX[S5][1Il!|][CG]{2}ATA TERRAE.*Bra[s5]{2}ard.*/is", $s)) return true;
		else if(preg_match("/.*A EX[S5][1Il!|][CG]{2}ATA TERRAE-NOVAE.{1,6}LABRAD[0O]R[1Il!|][CG]AE Ed[1Il!|]t[ce]d b[yv] [CG]uy R. Bra[s5]{2}ard.*/is", $s)) return true;
		else return false;
	}

	private function doBryophytaTerraNovLabradorLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/BRY[0O]PHYTA EX[S5][1Il!|][CG]{2}ATA TERRAE.+Bra[s5]{2}ard/i",
				"/BRY[0O]PHYTA EX[S5][1Il!|][CG]{2}ATA TERRAE-NOVAE.{1,6}LABRAD[0O]R[1Il!|][CG]AE\\sEd[1Il!|]t[ce]d b[yv] Guy R. Bra[s5]{2}ard/is",
				"/BRY[0O]PHYTA EX[S5][1Il!|][CG]{2}ATA TERRAE-NOVAE.{1,6}LABRAD[0O]R[1Il!|][CG]AE/i",
				"/Ed[1Il!|]t[ce]d b[yv] Guy R. Bra[s5]{2}ard/i",
				"/\\bCanada[,.] (Newf[0o]und[1Il!|]and|Labrad[0o]r)[:;]/i",
				"/Distributed by Memorial University of Newfoundland/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"",
				"\n\${1}:",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "346", array('country' => 'Canada', 'stateProvince' => 'Newfoundland and Labrador'));
	}

	private function isBryophytaNeotropicaExsiccataLabel($s) {
		if(preg_match("/.*RY[0O]PHYTA NE[0O]TR[0O]P[1Il!|]CA EX[S5][1Il!|][CG]{2}AT.*/is", $s)) return true;
		else return false;
	}

	private function doBryophytaNeotropicaExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.RY[0O]PHYTA NE[0O]TR[0O]P[1Il!|]CA EX[S5][1Il!|][CG]{2}AT./i",
				"/Fascicle [1Il!|]{1,3} (19..)[,.]? ?/i",
				"/[ce]d[1Il!|]t[ce]d b[yv] [S5]. R[0o]b Gradst[ce][1Il!|]n d[1Il!|]str[1Il!|]but[ce]d b[yv] th[ce] [1Il!|]nst[1Il!|]tut[ce] of [S5]yst[ce]mat[1Il!|][ce] B[0o]tan[yv], Utr[ce]{2}ht./i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "5");
	}

	private function isBryophytaSelectaExsiccataLabel($s) {
		if(preg_match("/.*RY[0O]PHYTA [S5]ELECTA EX[S5][1Il!|][CG]{2}AT.*/is", $s)) return true;
		else return false;
	}

	private function doBryophytaSelectaExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/(?:H. [1Il!|]n[0o]u[ce][;:,.] ?)?.RY[0O]PHYTA [S5]ELECTA EX[S5][1Il!|][CG]{2}AT./i",
				"/\\n{2,}/"
			),
			array(
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "6");
	}

	private function isSphagnaBorealiAmericanaExsiccataLabel($s) {
		if(preg_match("/.*[S5]PHA[CG]N.{2}B ?[0OQ][RB]E ?A[1Il!|]{1,2}.{1,3}ME ?R[1Il!|] ?[CGO] ?AN.{1,3}EX[S5][1Il!|][CG]{2}AT.*/is", $s)) return true;
		if(preg_match("/.*[S5]PHA[CG]NA ?BO.*[1Il!|]{1,2} AMER[1Il!|][CG]AN.{1,3}EX[S5][1Il!|][CG]{2}AT.*/i", $s)) return true;
		if(preg_match("/.*[S5]PHA[CG]NA B[0OQ][RB]EA[1Il!|]{1,2}-AMER[1Il!|][CG].{3,6}EX[S5][1Il!|][CG]{2}AT.*/i", $s)) return true;
		if(preg_match("/.*[S5]PHA[CG]NA.{1,3}O ?R.{1,3}[1Il!|]{1,2}-AM.R[1Il!|][CG]AN.{2,4}EX[S5][1Il!|][CG]{2}ATA.*/i", $s)) return true;
		return false;
	}

	private function doSphagnaBorealiAmericanaExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.?[S5]PHA[CG]N.{2}B ?[0OQ][RB]E ?A[1Il!|]{1,2}.{1,3}ME ?R[1Il!|] ?[CGO] ?AN.{1,3}EX[S5][1Il!|][CG]{2}AT.{1,3}/i",
				"/.?[S5]PHA[CG]NA ?BO.*[1Il!|]{1,2} AMER[1Il!|][CG]AN.{1,3}EX[S5][1Il!|][CG]{2}AT.{1,3}/i",
				"/.?[S5]PHA[CG]NA B[0OQ][RB]EA[1Il!|]{1,2}-AMER[1Il!|][CG].{3,6}EX[S5][1Il!|][CG]{2}AT.{1,3}/i",
				"/.?[S5]PHA[CG]NA.{1,3}O ?R.{1,3}[1Il!|]{1,2}-AM.R[1Il!|][CG]AN.{2,4}EX[S5][1Il!|][CG]{2}ATA.{0,2}/i",
				"/[CG]urav[ec]runt D[,.] ?[CG][,.] ?Eat[0o]n ?[ec]t ?E[,.] ?Fax[0o]n[,.]?/i",
				"/\\n(\\d{1,3})\\. [S58]\\. ([A-Za-z])/",
				"/\\n(\\d{1,3}\\. Sphagnum [A-Za-z]{3,}[,.]? .{3,})\\n(?:V|[l1|I].)(?i)ar\\.? /s",
				"/\\bpal.escens\\b/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"",
				"",
				"\n\${1}. Sphagnum \${2}",
				"\n\${1} var ",
				"pallescens",
				"\n"
			),
			$s
		));//echo "\nline 5120, s:\n".$s."\n";
		$fields = array();
		$foundSciName = false;
		$lines = explode("\n", $s);
		foreach($lines as $line) {
			if(preg_match("/^[0-9]{1,3}[,.] .+/", $line, $mats)) {
				$psn = $this->processSciName(trim($line, " \"\',"));
				if($psn != null) {
					$scientificName = "";
					if(array_key_exists('scientificName', $psn)) {
						$scientificName = $psn['scientificName'];
						$fields['scientificName'] = $scientificName;
						$s = str_replace("\n\n", "\n", str_replace($line, "", $s));
					}
					if(array_key_exists('verbatimAttributes', $psn)) $fields['verbatimAttributes'] = $psn['verbatimAttributes'];
					if(array_key_exists('associatedTaxa', $psn)) $fields['associatedTaxa'] = $psn['associatedTaxa'];
					if(array_key_exists('recordNumber', $psn)) $fields['exsNumber'] = $psn['recordNumber'];
					if(array_key_exists('taxonRemarks', $psn)) $fields['taxonRemarks'] = $psn['taxonRemarks'];
					if(array_key_exists('substrate', $psn)) $fields['substrate'] = $psn['substrate'];
					$foundSciName = true;
					if(array_key_exists('taxonRank', $psn)) {
						$taxonRank = $psn['taxonRank'];
						$fields['taxonRank'] = $taxonRank;
						if(array_key_exists('infraspecificEpithet', $psn)) {
							$infraspecificEpithet = $psn['infraspecificEpithet'];
							$fields['infraspecificEpithet'] = $infraspecificEpithet;
							$line = trim(substr($line, stripos($line, $infraspecificEpithet)+strlen($infraspecificEpithet)));
						}
					} else if(strlen($scientificName) > 0) $line = trim(substr($line, stripos($line, $scientificName)+strlen($scientificName)));
					if(preg_match("/(.{3,}), ([A-Za-z]{3,}(?: [A-Za-z]{3,})?)[,.]?$/", $line, $mats)) {
						$firstPart = trim($mats[1]);
						$lastPart = trim($mats[2]);
						$sp = $this->getStateOrProvince($lastPart);
						if(count($sp) > 0) {
							$stateProvince = $sp[0];
							$countyMatches = $this->findCounty($firstPart, $stateProvince);
							if($countyMatches != null) {
								$fields['county'] = trim($countyMatches[1]);
								$fields['locality'] = trim($countyMatches[0]);
							} else $fields['locality'] = $firstPart;
							$fields['stateProvince'] = $stateProvince;
							$fields['country'] = $sp[1];
							break;
						}
					}
				}
			} else if($foundSciName) {
				if(preg_match("/(.{3,}), ([A-Za-z]{3,}(?: [A-Za-z]{3,})?)[,.]?$/", $line, $mats)) {//$i=0;foreach($mats as $mat) echo "\nmats[".$i++."] = ".$mat."\n";
					$firstPart = trim($mats[1]);
					$lastPart = trim($mats[2]);
					$sp = $this->getStateOrProvince($lastPart);
					if(count($sp) > 0) {
						$stateProvince = $sp[0];
						$countyMatches = $this->findCounty($firstPart, $stateProvince);
						if($countyMatches != null) {//$i=0;foreach($countyMatches as $countyMatche) echo "\ncountyMatches[".$i++."] = ".$countyMatche."\n";
							$fields['county'] = trim($countyMatches[1]);
							$fields['locality'] = trim($countyMatches[0]);
						} else $fields['locality'] = $firstPart;
						$fields['stateProvince'] = $stateProvince;
						$fields['country'] = $sp[1];
						$s = str_replace("\n\n", "\n", str_replace($line, "", $s));
					}
				}
				break;
			}
		}
		return $this->doGenericLabel($s, "212", $fields);
	}

	private function isHepaticaeJaponicaeExsiccataeLabel($s) {
		if(preg_match("/.*EPAT[1Il!|][CG]A.{1,2}JAP[0O]N[1Il!|][CG]A.{1,2}EX[S5][1Il!|][CG]{2}AT.*/is", $s)) return true;
		else return false;
	}

	private function doHepaticaeJaponicaeExsiccataeLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.{1,2}EPAT[1Il!|][CG]A.{1,2}JAP[0O]N[1Il!|][CG]A.{1,2}EX[S5][1Il!|][CG]{2}AT.{1,3}(?:s[ec]r[,.] \([1Il!|]9\\d{2}\) Edit[ec]d by [S5]. Hattor[1Il!|]?)?/i",
				"/(?:s[ec]r[,.] \([1Il!|]9\\d{2}\) Edit[ec]d b[yv] [S5]. Hattor[1Il!|]?)/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "68");
	}

	private function isBryophytorumTyporumExsiccataLabel($s) {
		if(preg_match("/.*RY[0O]PHYT[0O]RUM TYP[0O]RUM EX[S5][1Il!|][CG]{2}AT.*/is", $s)) return true;
		else return false;
	}

	private function doBryophytorumTyporumExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.{1,2}RY[0O]PHYT[0O]RUM TYP[0O]RUM EX[S5][1Il!|][CG]{2}AT./i",
				"/Ed[1Il!|]t[ec]d b[yv] W[1Il!|]{3,5}am R. Buck D[1Il!|]str[1Il!|]but[ec]d b[yv] ?/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "11");
	}

	private function isCryptogamaeGermaniaeExsiccataeLabel($s) {
		if(preg_match("/.*r[yv]pt[0o][gyj]a.{1,2}a[ec] [CG][ec].man ?[1Il!|]a.{1,2}[,.] A.{1,2}[s5]t[rx][1Il!|]a[ec] [ec]. ?(?:H|[1Il!|]{2})[ec][1Il!|]v[ec]t[1Il!|]a[ec] [ec]x[s5][1Il!|][ec]{2}at.*/is", $s)) return true;
		else return false;
	}

	private function doCryptogamaeGermaniaeExsiccataeLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/[^\n]{0,2}(?:W[,.].{1,4}[CG]ULA[,.] )?.{1,2}r[yv]pt[0o][gyj]a.{1,2}a[ec] [CG][ec].man ?[1Il!|]a.{1,2}[,.] A.{1,2}[s5]t[rx][1Il!|]a[ec] [ec]. ?(?:H|[1Il!|]{2})[ec][1Il!|]v[ec]t[1Il!|]a[ec] [ec]x[s5][1Il!|][ec]{2}at.[^\n]{1,3}+/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "36");
	}

	private function isBryophytaArcticaExsiccataLabel($s) {
		if(preg_match("/.*RY[0OQ]P(?:H|li)YTA AR[CG] ?T[1Il!|][CG] ?A EX[S5]I[CG]{2}ATA.*/is", $s)) return true;
		if(preg_match("/.*Bry[o0]p(?:h|li)yta Ar[ec].[1Il!|][ec]a Exsi[ec]{2}ata.*/is", $s)) return true;
		return false;
	}

	private function doBryophytaArcticaExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.{1,2}RY[0OQ]P(?:H|li)YTA AR[CG]T[1Il!|][CG]A EX[S5]I[CG]{2}ATA.{1,2}/i",
				"/Ed[1Il!|]t[ce]d b[yv] W[1Il!|]{3,5}a(?:m|rn) [CG][,.] [S5]t[ce]{2}r[ce] and K[ji][ce][1Il!|]d A[,.] H[o0][1Il!|]m[ce]n/i",
				"/Bry[o0]p(?:h|li)yta Ar[ec].[1Il!|][ec]a Exsi[ec]{2}ata/i",
				"/Ed[1Il!|]t[ce]d b[yv] W[1Il!|]{3,5}a(?:m|rn) [CG][,.] [S5]t[ce]{2}r[ce][,.] K[ji][ce][1Il!|]d A[,.] H[o0][1Il!|]m[ce]n and G[ce]rt [S5][,.] M[o0]g[ce]ns[ce]n/i",
				"/D[1Il!|][s5]tr[1Il!|]but[ce]d b[yv] th[ce] B[o0]tan[1Il!|][ce]a[1Il!|] Mu[s5][ce]u(?:m|rn)[,.] [CG][o0]p[ce]nhag[ce]n, and /is",
				"/D[1Il!|][s5]tr[1Il!|]but[ce]d b[yv]\\sand B[o0]tan[1Il!|][ce]a[1Il!|] Mu[s5][ce]u(?:m|rn)[,.] [CG][o0]p[ce]nhag[ce]n /is",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"",
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 5120, s:\n".$s."\n";
		$fields = array();
		$exsnumber = "";
		$foundSciName = false;
		$lines = explode("\n", $s);
		foreach($lines as $line) {
			if(preg_match("/^[0-9]{1,3}[,.] .+/", $line, $mats)) {
				$psn = $this->processSciName(trim($line, " \"\',"));
				if($psn != null) {
					$scientificName = "";
					if(array_key_exists('scientificName', $psn)) {
						$scientificName = $psn['scientificName'];
						$fields['scientificName'] = $scientificName;
						$s = str_replace("\n\n", "\n", str_replace($line, "", $s));
					}
					if(array_key_exists('verbatimAttributes', $psn)) $fields['verbatimAttributes'] = $psn['verbatimAttributes'];
					if(array_key_exists('associatedTaxa', $psn)) $fields['associatedTaxa'] = $psn['associatedTaxa'];
					if(array_key_exists('recordNumber', $psn)) {
						$exsnumber = $psn['recordNumber'];
						$fields['exsNumber'] = $exsnumber;
					}
					if(array_key_exists('taxonRemarks', $psn)) $fields['taxonRemarks'] = $psn['taxonRemarks'];
					if(array_key_exists('substrate', $psn)) $fields['substrate'] = $psn['substrate'];
					$foundSciName = true;
					if(array_key_exists('taxonRank', $psn)) {
						$taxonRank = $psn['taxonRank'];
						$fields['taxonRank'] = $taxonRank;
						if(array_key_exists('infraspecificEpithet', $psn)) {
							$infraspecificEpithet = $psn['infraspecificEpithet'];
							$fields['infraspecificEpithet'] = $infraspecificEpithet;
							$line = trim(substr($line, stripos($line, $infraspecificEpithet)+strlen($infraspecificEpithet)));
						}
					} else if(strlen($scientificName) > 0) $line = trim(substr($line, stripos($line, $scientificName)+strlen($scientificName)));
					break;
				}
			}
		}
		$ometid = "";
		$iExsNumber = 0;
		$exsnumber = str_replace(" ", "", $exsnumber);
		if(is_numeric($exsnumber)) $iExsNumber = intval($exsnumber);
		else if(strlen($exsnumber) > 1) {//remove the last character and see if the remainder is numeric
			$temp = trim(substr($exsnumber, 0, strlen($exsnumber)-1));
			if(is_numeric($temp)) $iExsNumber = intval($temp);
		}
		if($iExsNumber > 0) {
			if($iExsNumber > 50) $ometid = "349";
			else $ometid = "348";
		} else $ometid = "348";
		return $this->doGenericLabel($s, $ometid, $fields);
	}

	private function isBryophytaHawaiicaExsiccataLabel($s) {
		if(preg_match("/.*RY[0O]PHYTA HA[WV]A[1Il!| ]{2,3}CA EX[S5][1Il!|][CG]{2}ATA.*/is", $s)) return true;
		return false;
	}

	private function doBryophytaHawaiicaExsiccataLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/.{1,2}RY[0O]PHYTA HA[WV]A[1Il!| ]{2,3}CA EX[S5][1Il!|][CG]{2}ATA.?/is",
				"/\\n{2,}/"
			),
			array(
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "4", array('country' => "United States", 'stateProvince' => "Hawaii"));
	}

	private function isOrthotrichaceaeBorealiAmericanaeExsiccataeLabel($s) {
		if(preg_match("/.*TH[0OQ]TR[1Il!|][CG]HA[CG]EA. B[0OQ]. ?E ?AL ?[1Il!|].?AMER[1Il!|][CG]ANA. EX[S5][1Il!|][CG]{2}ATA.*/is", $s)) return true;
		return false;
	}

	private function doOrthotrichaceaeBorealiAmericanaeExsiccataeLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/[^\n]+TH[0OQ]TR[1Il!|][CG]HA[CG]EA. B[0OQ]. ?EAL ?[1Il!|].?AMER[1Il!|][CG]ANA. EX[S5][1Il!|][CG]{2}ATA[^\n ]* ?/i",
				"/Ed[1Il!|]t[ce]d b[yv] Da[1Il!|][ce] H. V[1Il!|].{1,2} ?/i",
				"/ ?[0OD][1Il!|][s5]tr[1Il!|]but[ce]d b[yv] .h[ce] Un[1Il!|]v[ce]r[s5][1Il!|]ty of A[1Il!|]b[ce]rta/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 5293, s:\n".$s."\n";
		return $this->doGenericLabel($s, "350");
	}

	private function isPlantaeUruguayensesExsiccataeLabel($s) {
		if(preg_match("/.*P[1Il!|]ANTA. [UV]R[UV][CG][UV]A[YV]EN[S5]E[S5] EX[S5]I[CG]{2}ATA.*/is", $s)) return true;
		return false;
	}

	private function doPlantaeUruguayensesExsiccataeLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/[^\n]?P[1Il!|]ANTA. [UV]R[UV][CG][UV]A[YV]EN[S5]E[S5] EX[S5]I[CG]{2}ATA.?/is",
				"/[O0Q].{1,2}A[S5] ED. (?:Prof[,.] )?DR. (?:W|Guil)[,.] (?:G[,.] )?HERTE., M[O0Q]NTEVIDE[O0Q], URU[CG]UA[YV]/i",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "197");
	}

	private function isMossesOfTheInteriorHighlandsExsiccataeLabel($s) {
		if(preg_match("/.*[0O][s5]{2}[ec][s5] ?[0O]. ?th[ec] ?[1Il!|]nt[ec]r[1Il!|][0O]r ?H[1Il!|]gh[1Il!|]and[s5] ?Ex[s5]i[ec]{2}at.*/is", $s)) return true;
		else return false;
	}

	private function doMossesOfTheInteriorHighlandsExsiccataeLabel($s) {
		$s = trim(preg_replace
		(
			array(
				"/[^\n]{1,2}[0O][s5]{2}[ec][s5] ?[0O]. ?th[ec] ?[1Il!|]nt[ec]r[1Il!|][0O]r ?H[1Il!|]gh[1Il!|]and[s5] ?Ex[s5]i[ec]{2}at[^\n]{2,3}+/i",
				//"/[^\n]?M[0O][s5]{2}[ec][s5] ?[0O]. ?th[ec] ?[1Il!|]nt[ec]r[1Il!|][0O]r ?H[1Il!|]gh[1Il!|]and[s5] ?Ex[s5]i[ec]{2}at[^\n]{2,3}+/i",
				"/Ed[1Il!|]t[ec]d b[yv] Pau[1Il!|] Red.[ec]a(?:m|rn)[,.] Bru[ec]{2} A[1Il!|]{2}[ec]n & R[0o]b[ec]rt.{1,3}ag[1Il!| ]{1,4}+/i",
				"/[^\n]?D[1Il!|][s5]tr[1Il!|]but[ec]d ?b[yv] ?M[1Il!|][s5]{2}[0o]ur[1Il!|] ?B[0o]tan[1Il!|][ec]a[1Il!|] ?[CG]ard[ec].*/is",
				"/\\n{2,}/"
			),
			array(
				"",
				"",
				"",
				"\n"
			),
			$s
		));//echo "\nline 4941, s:\n".$s."\n";
		return $this->doGenericLabel($s, "347");
	}

	private function isReliquiaeFlowersianaeLabel($s) {
		$pat = "/.*Re[1Il!|]{2}[qgO]u[1Il!|]a[ec]\\s?F[1Il!|][O0Q]wers[1Il!|]ana.*/is";
		//$pat = "/.*RELIQUIAE\\sFLOWERSIANA.*/is";
		if(preg_match($pat, $s)) return true;
		else return false;
	}

	protected function countPotentialHabitatWords($pHab) {//echo "\ninput to countPotentialHabitatWords: ".$pHab."\n";
		//$pHab = preg_quote(preg_replace(array("/[\r\n]/m", "/\\s{2,}/m"), " ", $pHab), '/');
		$pHab = trim(preg_replace(array("/[\r\n]/m", "/\\s{2,}/m"), " ", $pHab));
		$hWords = array("rocks?", "quercus", "(?:hard)?woods?", "abundant", "aspens?", "marsh", "juniper(?:us|s)?", "p[l1|I!]ants?", "humus",
			"understory", "grass(?:[l1|I!]and|es)?", "meadows?", "(?<!(?:National) )forest(?:ed)?", "ground", "mixed", "(?<!Jessie\\s)sa[l1|I!]ix", "acer ",
			"a[l1|I!]ders?", "tundra","abies", "calcareous", "outcrops?", "boulders?", "Granit(?:e|ic)", "limestone", "sandstone", "stand", "chert",
			"sand[ys]?", "cedars?", "trees?", "shrubs?", "(?:(?:sub)?al)?pine", "soi[l1|I!]s?", "(?:white)?bark", "open", "deciduous", "expos(?:ure|ed)",
			"aspect", "facing", "pinus", "habitat", "degrees?", "conifer(?:(?:ou)?s)?", "spruces?", "maples?", "substrate", "th[uv]ja", "shad(?:y|ed?)",
			"(?:[a-z]{2,})?berry", "box elders?", "dry", "damp", "moist", "wet", "firs?", "basalt(?:ic)?", "Liriodendron", "Juglans", "A[l1|I!]nus",
			"f[l1|I!][0o]{2}dp[l1|I!]ain", "gneiss", "moss(?:es|y)?", "crust", "(?:sage|brush|sagebrush)", "pocosin", "bog", "swamp", "branches",
			"Picea", "savanna", "Magno[l1|I!]ia", "Rhododendron", "[l1|I!]{2}ex", "Carpinus", "ta[l1|I!]us", "Nyssa", "bottom(?:[l1|I!]ands?)?",
			"w[l1|I!]{3}[0o]ws?", "riperian", "Fraxinus", "Betu[l1|I!]a", "Persea", "Carya", "ravine", "Aesculus", "cypress(?:es)?", "Empetrum",
			"Taxodium", "sparse(?:ly)?", "chaparra[l1|I!]", "temperate", "hemlocks?", "Myrica", "[l1|I!]odgepo[l1|I!]e", "Cornus", "trunks?",
			"myrt[l1|I!]es?", "Gordonia", "Liquidamber", "cottonwoods?", "pasture", "stump", "palmetto", "(?:mica)?schist(?:ose)?", "[l1|I!]itter",
			"scrub", "spp", "rotten", "logs?", "quartz(?:ite)?", "travertine", "grave[l1|I!](?:[l1|I!]y)?", "duff", "seepage", "submerged",
			"graminoids", "forbs", "mound", "ferns?", "mahogany", "cherry", "regenerating", "introduced", "(?:Pseudo)?tsuga", "timber(?:line)?",
			"flood ?plain", "terraces?", "thicket", "moraines?", "heath(?:er)?", "metamorphic", "vegetation", "quarry");
		$result = 0;
		foreach($hWords as $hWord) if(preg_match("/\\b".$hWord."\\b/i", $pHab)) {/*echo "\nhabitat matched: ".$hWord."\n";*/$result++;}
		return $result/(count(explode(" ", $pHab))*count($hWords));
		//return $result/count(explode(" ", $pHab));
	}

	private function containsVerbatimAttribute($pAtt) {
		$vaWords = array("atranorin", "fatty acids?", "cortex", "areolate", "medullae?", "podeti(?:a|um)(?! ?\\/)",
			"(?:(?:a|hy)po|epi)theci(?:a|um)(?! ?(?:\\/|color))", "thall(?:us|i)", "strain", "peristome",
			"squamul(?:es?|ose)", "soredi(?:a(?:te)?|um)", "fruticose", "fruit(?:icose|s)?", "crust(?:ose)?", "corticolous", "saxicolous",
			"terricolous", "Synoicous", "chemotype", "terpene", "isidi(?:a(?:te)?|um)", "TLC", "monoicous", "dioicous", "sporangi(?:a|um)",
			"parietin", "anthraquinone", "pigment(?:s|ed)?", "ostiole", "epiphyt(?:e|ic)", "sorali(?:a|um)", "spor(?:ophyt)?es?",
			"antheridi(?:a|um)", "archegoni(?:a|um)", "androeci(?:a|um)", "gynoeci(?:a|um)", "Autoicous", "Paroicous", "Heteroicous",
			"cladautoicous", "Gametangi(?:a|um)", "paraphyses(?! ?branched\\/)", "pruinose");
		//foreach($vaWords as $vaWord) if(stripos($word, $vaWord) !== FALSE) return true;
		foreach($vaWords as $vaWord) if(preg_match("/\\b".$vaWord."\\b/i", $pAtt)) return true;
		return false;
	}

	private function doReliquiaeFlowersianaeLabel($s) {
		$pattern =
			array
			(
				"/Re[1Il!|]{2}[qgO]u[1Il!|]a[ec]\\s?F[1Il!|][O0Q]wers[1Il!|]anae(?:\\s?ex\\s?herb[.,](?:\\s?UT)?)?/i",
				"/University\\s?[O0]f\\s?C[O0]l[O0]rad[O0](?:\\s?\(C[O0]L[O0]\))?/i",
				"/University\\s?[O0]f\\s?T[ec]nn[ec][s5]{2}[ec]{2}(?:\\s?\(TENN\))?/i",
				"/C[O0]L[O0]-B-[^ ]{2,9}/i",
				"/TENN-B-[^ ]{2,10}/i",
				"/WTU-B-[^ ]{2,10}/i",
				"/U\\.\\s?Wash[1Il!|]ngt[O0]n\\s?Herbar[1Il!|]um(?:\\s?\(?WTU?\)?)?/i",
				"/U\\.\\s?S\\.\\s?A\\.\\s(\\d{2,})/",
				"/U\\.\\s?S\\.\\s?A\\.\\s([a-zA-Z]{6,})/",
				"/\\sBritish Columbia/i",
				"/S.LT LAKE C[O0]\\.:/i"
			);
		$replacement =
			array
			(
				"",
				"",
				"",
				"",
				"",
				"",
				"",
				"U. S. A.\n\${1}",
				"U. S. A.\n\${1}",
				"\nBritish Columbia",
				"Salt Lake CO.:"
			);

		$s = trim(preg_replace($pattern, $replacement, $s, -1));
		$state_province = "";
		$location = "";
		$firstPart = "";
		$county = "";
		$habitat = "";
		$taxonRemarks = "";
		$countyMatches = $this->findCounty($s, "");
		if($countyMatches) {//$i=0;foreach($countyMatches as $countyMatche) echo "\nline 7015, countyMatches[".$i++."] = ".$countyMatche."\n";
			$firstPart = $countyMatches[0];
			$state_province = trim($countyMatches[4]);
			$country = $countyMatches[2];
			$county = $countyMatches[1];
			$location = trim($countyMatches[3]);
			//sometimes the colon after "Co." is misinterpreted as "i"
			if(strcasecmp(substr($location, 0, 2), "i ") == 0) $location = trim(substr($location, 1));
		} else {
			if(preg_match("/^(?:.+\\n)?CANADA\\n(.+)/is", $s, $mats)) {
				$country = "Canada";
				$temp = trim($mats[1]);
				if(preg_match("/(.*)\\n([a-zA-Z]+(?:\\s[a-zA-Z]+(?:\\s[a-zA-Z]+)?)?):\\s(.+)/s", $temp, $mats2)) {
					$temp2 = trim($mats2[2]);
					if($this->isStateOrProvince($temp2)) {
						$state_province = $temp2;
						$firstPart = trim($mats2[1]);
						$location = trim($mats2[3]);
						if(preg_match("/^(on\\s[a-zA-Z ]{6,}),\\s/i", $location, $mats3)) {
							$location = trim($mats3[2]);
							$habitat = trim($mats3[1]);
						} else if(preg_match("/(.+);\\s(.+)/", $location, $mats3)) {
							$location = trim($mats3[1]);
							$habitat = trim($mats3[2]);
							if(preg_match("/(.+)\\s((?:on\\s).+)/", $habitat, $mats4)) {
								$location .= ", ".trim($mats4[1]);
								$habitat = trim($mats4[2]);
							}
						} else if(preg_match("/(.+),\\s(on\\s.+)/", $location, $mats3)) {
							$location = trim($mats3[1]);
							$habitat = trim($mats3[2]);
						}
					}
				}
			}
		}
		if(strlen($firstPart) > 0 || strlen($location) > 0) {//echo "\nline 7058, location: ".$location."\nhabitat: ".$habitat."\n";
			$scientificName = "";
			$infraspecificEpithet = "";
			$taxonRank = "";
			$verbatimAttributes = "";
			$associatedTaxa = "";
			$recordNumber = "";
			$associatedCollectors = "";
			$recordedBy = "";
			$recordedById = "";
			$substrate = "";
			$elevation = "";
			$elevationArray = $this->getElevation($location);
			if($elevationArray != null && count($elevationArray) > 0) {
				$elevation = $elevationArray[1];
				$location = trim(preg_replace("/".preg_quote($elevation, '/')."(?:\\.?[;,]?\\salt\\.?)?/", "", $location), " ,.;:");
			}
			if(strlen($elevation) == 0) {
				$elevationArray = $this->getElevation($habitat);
				if($elevationArray != null && count($elevationArray) > 0) {
					$elevation = $elevationArray[1];
					$habitat = trim(preg_replace("/".preg_quote($elevation, '/')."(?:\\.?[;,]?\\salt\\.?)?/", "", $habitat), " ,.;:");
				}
			}
			$identifiedBy = "";
			$otherCatalogNumbers = "";
			$dateIdentified = array();
			$identifiedBy = "";
			$collectorInfo = $this->getCollector($location);
			if($collectorInfo != null) {
				if(array_key_exists('collectorName', $collectorInfo)) {
					$recordedBy = str_replace(" . ", ", ", $collectorInfo['collectorName']);
					$location = preg_replace("/".preg_quote($recordedBy, '/')."/", "", $location);
				}
				if(array_key_exists('collectorNum', $collectorInfo)) $recordNumber = $collectorInfo['collectorNum'];
				if(array_key_exists('collectorID', $collectorInfo)) $recordedById = $collectorInfo['collectorID'];
				if(array_key_exists('identifiedBy', $collectorInfo)) $identifiedBy = $collectorInfo['identifiedBy'];
				if(array_key_exists('otherCatalogNumbers', $collectorInfo)) $otherCatalogNumbers = $collectorInfo['otherCatalogNumbers'];
				if(array_key_exists('associatedCollectors', $collectorInfo)) $associatedCollectors = $collectorInfo['associatedCollectors'];
			} else {
				$collectorInfo = $this->getCollector($s);
				if($collectorInfo != null) {
					if(array_key_exists('collectorName', $collectorInfo)) {
						$recordedBy = str_replace(" . ", ", ", $collectorInfo['collectorName']);
						$location = preg_replace("/".preg_quote($recordedBy, '/')."/", "", $location);
						$habitat = preg_replace("/".preg_quote($recordedBy, '/')."/", "", $habitat);
					}
					if(array_key_exists('collectorNum', $collectorInfo)) $recordNumber = $collectorInfo['collectorNum'];
					if(array_key_exists('collectorID', $collectorInfo)) $recordedById = $collectorInfo['collectorID'];
					if(array_key_exists('identifiedBy', $collectorInfo)) $identifiedBy = $collectorInfo['identifiedBy'];
					if(array_key_exists('otherCatalogNumbers', $collectorInfo)) $otherCatalogNumbers = $collectorInfo['otherCatalogNumbers'];
					if(array_key_exists('associatedCollectors', $collectorInfo)) $associatedCollectors = $collectorInfo['associatedCollectors'];
				}
			}
			$possibleMonths = "Jan(?:\\.|(?:uary))|Feb(?:\\.|(?:ruary))|Mar(?:\\.|(?:ch))|Apr(?:\\.|(?:il))?|May|Jun[.e]?|Jul[.y]|Aug(?:\\.|(?:ust))?|Sep(?:\\.|(?:t\\.?)|(?:tember))?|Oct(?:\\.|(?:ober))?|Nov(?:\\.|(?:ember))?|Dec(?:\\.|(?:ember))?";
			$identifier = $this->getIdentifier($s, $possibleMonths);
			if($identifier != null) {
				if(strlen($identifiedBy) == 0) $identifiedBy = $identifier[0];
				$dateIdentified = $identifier[1];
			}
			if(preg_match("/^(.+\\n.+)\\n.*/", $location, $mats)) $location = trim($mats[1], " ,.;:");
			$pos = strpos($location, "\n");
			if($pos !== FALSE) {
				$temp1 = trim(substr($location, 0, $pos));
				$temp2 = trim(substr($location, $pos+1));
				$pos = strpos($temp2, "\n");
				if($pos !== FALSE) $temp2 = trim(substr($temp2, 0, $pos));
				$hCount1 = $this->countPotentialHabitatWords($temp1);
				$hCount2 = $this->countPotentialHabitatWords($temp2);
				$lCount1 = $this->countPotentialLocalityWords($temp1);
				$lCount2 = $this->countPotentialLocalityWords($temp2);
				//echo "\nline 7102, temp1: ".$temp1."\ntemp2: ".$temp2."\nlCount2: ".$lCount2."\nhCount1: ".$hCount1."\nhCount2: ".$hCount2."\nlCount1: ".$lCount1."\n";
				if($hCount1 > $lCount1) {
					$habitat = $temp1;
					$location = "";
					if(preg_match("/(.+),\\s(on\\s.+)/i",$habitat , $mats)) {
						$temp1 = trim($mats[1]);
						$temp2 = trim($mats[2]);
						if($this->countPotentialHabitatWords($temp2) > 0) {
							$habitat = $temp2;
							$location = $temp1;
						}
					}
				} else $location = $temp1;
				if($lCount2 > 0) {
					if(strlen($location) == 0) $location = $temp2;
					else if(stripos($location, $temp2) === FALSE) $location .= " ".$temp2;
				} else if($hCount2 > 0) {
					if(strlen($habitat) == 0) $habitat = $temp2;
					else if(stripos($habitat, $temp2) === FALSE) $habitat .= " ".$temp2;
					if(preg_match("/(.+),\\son$/i", $location, $mats)) {
						$location = trim($mats[1]);
						$pos = strpos($habitat, ";");
						if($pos === FALSE) $pos = strpos($habitat, ",");
						if($pos !== FALSE) {
							$substrate = "on ".trim(substr($habitat, 0, $pos));
							$habitat = trim(substr($habitat, $pos+1));
						} else {
							$substrate = "on ".$habitat;
							$habitat = "";
						}
					} else if(preg_match("/(.+),\\s(on\\s[a-zA-Z]+(?:\\s[a-zA-Z]+)?(?:\\s[a-zA-Z]+)?)$/i", $location, $mats)) {
						$location = trim($mats[1]);
						$substrate = trim($mats[2]);
						if(preg_match("/^([a-zA-Z]+)\\s(in\\s.+)/i", $habitat, $mats2)) {
							$substrate .= " ".trim($mats2[1]);
							$habitat = trim($mats2[2]);
						} else if(preg_match("/^([a-zA-Z]+(?:\\s(?:(?:&|and)\\s)?[a-zA-Z]+)?),\\s(.+)/i", $habitat, $mats2)) {
							$substrate .= " ".trim($mats2[1]);
							$habitat = trim($mats2[2]);
						}
					}
				}
			}
			$pos = strrpos($location, ", ");
			if($pos === FALSE) $pos = strrpos($location, "; ");
			if($pos !== FALSE) {
				$temp1 = trim(substr($location, 0, $pos));
				$temp2 = trim(substr($location, $pos+1));
				$hCount1 = $this->countPotentialHabitatWords($temp1);
				$hCount2 = $this->countPotentialHabitatWords($temp2);
				$lCount1 = $this->countPotentialLocalityWords($temp1);
				$lCount2 = $this->countPotentialLocalityWords($temp2);
				//echo "\nline 7102, temp1: ".$temp1."\ntemp2: ".$temp2."\nlCount2: ".$lCount2."\nhCount1: ".$hCount1."\nhCount2: ".$hCount2."\nlCount1: ".$lCount1."\n";
				if($hCount1 > $lCount1) {
					if(strlen($habitat) == 0) $habitat = $temp1;
					else if(stripos($habitat, $temp1) === FALSE) $habitat .= " ".$temp1;
					if($lCount2 > 0) $location = $temp2;
				} else if($hCount2 > $lCount2) {
					if(strlen($habitat) == 0) $habitat = $temp2;
					else if(stripos($habitat, $temp2) === FALSE) $habitat .= " ".$temp2;
					if($lCount1 > 0) $location = $temp1;
				} else {
					$pos = strrpos($habitat, ", ");
					if($pos === FALSE) $pos = strrpos($habitat, "; ");
					if($pos !== FALSE) {
						$temp1 = trim(substr($habitat, 0, $pos));
						$temp2 = trim(substr($habitat, $pos+1));
						$hCount1 = $this->countPotentialHabitatWords($temp1);
						$hCount2 = $this->countPotentialHabitatWords($temp2);
						$lCount1 = $this->countPotentialLocalityWords($temp1);
						$lCount2 = $this->countPotentialLocalityWords($temp2);
						if($hCount1 > $lCount1) {
							if(stripos($habitat, $temp1) === FALSE) $habitat = $temp1." ".$habitat;
							if($lCount2 > 0 && stripos($location, $temp2) === FALSE) $location .= " ".$temp2;
						} else if($hCount2 > $lCount2) {
							if(stripos($habitat, $temp2) === FALSE) $habitat = $temp2." ".$habitat;
							if($lCount1 > 0 && stripos($location, $temp1) === FALSE) $location .= " ".$temp1;
						}
					}
				}
			}
			//echo "\nline 7111, location: ".$location."\nhabitat: ".$habitat."\n";
			$lines = explode("\n", $firstPart);
			foreach($lines as $line) {//echo "\nline 6784, line: ".$line."\n";
				$line = trim($line);
				if(strlen($line) > 6 && !$this->isMostlyGarbage($line, 0.60)) {
					$psn = $this->processSciName($line);
					if($psn != null) {
						if(array_key_exists('scientificName', $psn)) $scientificName = $psn['scientificName'];
						if(array_key_exists('infraspecificEpithet', $psn)) $infraspecificEpithet = $psn['infraspecificEpithet'];
						if(array_key_exists('taxonRank', $psn)) $taxonRank = $psn['taxonRank'];
						if(array_key_exists('verbatimAttributes', $psn)) $verbatimAttributes = $psn['verbatimAttributes'];
						if(array_key_exists('associatedTaxa', $psn)) $associatedTaxa = $psn['associatedTaxa'];
						if(array_key_exists('recordNumber', $psn) && strlen($recordNumber) == 0) $recordNumber = $psn['recordNumber'];
						if(array_key_exists('substrate', $psn)) $substrate = $psn['substrate'];
						if(array_key_exists('taxonRemarks', $psn)) $substrate = $psn['taxonRemarks'];
						break;
					}
				}
			}
			return array
			(
				'scientificName' => $this->formatSciName($scientificName),
				'stateProvince' => $state_province,
				'country' => trim($country, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'county' => ucfirst(trim($county, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-")),
				'locality' => trim($location, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'verbatimElevation' => trim($elevation, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'verbatimAttributes' => trim($verbatimAttributes, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'infraspecificEpithet' => trim($infraspecificEpithet, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'taxonRank' => trim($taxonRank, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'taxonRemarks' => trim($taxonRemarks, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'associatedTaxa' => trim($associatedTaxa, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'otherCatalogNumbers' => trim($otherCatalogNumbers, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'habitat' => trim($habitat, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'identifiedBy' => trim($identifiedBy, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'dateIdentified' => $dateIdentified,
				'substrate' => trim($substrate, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_"),
				'recordedBy' => trim($recordedBy, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'recordedById' => trim($recordedById, " \t\n\r\0\x0B,:;!\"\'\\~@#$%^&*_-"),
				'recordNumber' => trim($recordNumber, " \t\n\r\0\x0B,:;.!\"\'\\~@#$%^&*_-"),
				'associatedCollectors' => trim($associatedCollectors, " \t\n\r\0\x0B,:;.!\"\'\\~@#$%^&*_-")
			);
		} else return $this->doGenericLabel($s);
	}
}
?>