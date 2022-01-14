<?php
/**
 * SportsPress countries
 *
 * The SportsPress countries class stores continent/country data.
 *
 * @class 		SP_Countries
 * @version   2.7.3
 * @package		SportsPress/Classes
 * @category	Class
 * @author 		ThemeBoy
 */
class SP_Countries {

	/** @var array Array of continents */
	public $continents;

	/** @var array Array of countries */
	public $countries;

	/** @var array Array of legacy 2-letter codes converted to 3-letter codes */
	public $legacy;

	/**
	 * Constructor for the countries class - defines all continents and countries.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		$continents = array(
			__( 'Africa', 'sportspress' ) => array(
				'alg',
				'ang',
				'bdi',
				'ben',
				'bfa',
				'bot',
				'cgo',
				'cha',
				'civ',
				'cmr',
				'cod',
				'com',
				'cpv',
				'cta',
				'dji',
				'egy',
				'eqg',
				'eri',
				'esh',
				'eth',
				'gab',
				'gam',
				'gha',
				'gnb',
				'gui',
				'ken',
				'lbr',
				'lby',
				'les',
				'mad',
				'mar',
				'mli',
				'moz',
				'mri',
				'mtn',
				'nam',
				'nga',
				'nig',
				'rsa',
				'rwa',
				'sdn',
				'sen',
				'sey',
				'sle',
				'som',
				'ssd',
				'stp',
				'swz',
				'tan',
				'tog',
				'tun',
				'uga',
				'zam',
				'zim',
			),
			__( 'Asia', 'sportspress' ) => array(
				'afg',
				'arm',
				'aze',
				'ban',
				'bhr',
				'bhu',
				'bru',
				'cam',
				'chn',
				'cyp',
				'geo',
				'hkg',
				'ind',
				'irn',
				'irq',
				'isr',
				'jor',
				'jpn',
				'kaz',
				'kgz',
				'kor',
				'ksa',
				'kuw',
				'lao',
				'lib',
				'mac',
				'mas',
				'mdv',
				'mng',
				'mya',
				'nep',
				'oma',
				'pak',
				'phi',
				'ple',
				'prk',
				'qat',
				'sin',
				'sri',
				'syr',
				'tha',
				'tjk',
				'tkm',
				'tpe',
				'uae',
				'uzb',
				'vie',
				'yem',
			),
			__( 'Europe', 'sportspress' ) => array(
				'alb',
				'and',
				'aut',
				'bel',
				'bih',
				'blr',
				'bul',
				'cro',
				'cze',
				'den',
				'end',
				'eng',
				'esp',
				'est',
				'fin',
				'fra',
				'fro',
				'gbr',
				'ger',
				'gib',
				'gre',
				'hun',
				'irl',
				'isl',
				'ita',
				'kos',
				'lie',
				'ltu',
				'lux',
				'lva',
				'mco',
				'mda',
				'mkd',
				'mlt',
				'mne',
				'mwi',
				'ned',
				'nir',
				'nor',
				'pol',
				'por',
				'rou',
				'rus',
				'sco',
				'smr',
				'srb',
				'svk',
				'svn',
				'sui',
				'swe',
				'swz',
				'tur',
				'ukr',
				'vat',
				'wal',
			),
			__( 'North America', 'sportspress' ) => array(
				'atg',
				'aia',
				'aru',
				'bah',
				'ber',
				'blz',
				'brb',
				'can',
				'cay',
				'crc',
				'cub',
				'cuw',
				'dma',
				'dom',
				'grn',
				'gua',
				'hai',
				'hon',
				'jam',
				'lca',
				'mex',
				'msr',
				'nca',
				'pan',
				'pur',
				'skn',
				'slv',
				'tca',
				'usa',
				'vgb',
				'vin',
				'vir',
				'wif',
			),
			__( 'Oceania', 'sportspress' ) => array(
				'asa',
				'aus',
				'cok',
				'fij',
				'fsm',
				'gum',
				'idn',
				'kir',
				'mhl',
				'ncl',
				'nru',
				'nzl',
				'plw',
				'png',
				'sam',
				'sol',
				'tah',
				'tga',
				'tls',
				'tuv',
				'van',
			),
			__( 'South America', 'sportspress' ) => array(
				'arg',
				'bol',
				'bra',
				'chi',
				'col',
				'ecu',
				'guy',
				'par',
				'per',
				'sur',
				'tri',
				'uru',
				'ven',
			),
		);

		$this->countries = apply_filters( 'sportspress_countries', array(
			'afg' => __( "Afghanistan", 'sportspress' ),
			'aia' => __( "Anguilla", 'sportspress' ),
			'alb' => __( "Albania", 'sportspress' ),
			'alg' => __( "Algeria", 'sportspress' ),
			'and' => __( "Andorra", 'sportspress' ),
			'ang' => __( "Angola", 'sportspress' ),
			'arg' => __( "Argentina", 'sportspress' ),
			'arm' => __( "Armenia", 'sportspress' ),
			'aru' => __( "Aruba", 'sportspress' ),
			'asa' => __( "American Samoa", 'sportspress' ),
			'atg' => __( "Antigua and Barbuda", 'sportspress' ),
			'aus' => __( "Australia", 'sportspress' ),
			'aut' => __( "Austria", 'sportspress' ),
			'aze' => __( "Azerbaijan", 'sportspress' ),
			'bah' => __( "Bahamas", 'sportspress' ),
			'ban' => __( "Bangladesh", 'sportspress' ),
			'bdi' => __( "Burundi", 'sportspress' ),
			'bel' => __( "Belgium", 'sportspress' ),
			'ben' => __( "Benin", 'sportspress' ),
			'ber' => __( "Bermuda", 'sportspress' ),
			'bfa' => __( "Burkina Faso", 'sportspress' ),
			'bhr' => __( "Bahrain", 'sportspress' ),
			'bhu' => __( "Bhutan", 'sportspress' ),
			'bih' => __( "Bosnia and Herzegovina", 'sportspress' ),
			'blr' => __( "Belarus", 'sportspress' ),
			'blz' => __( "Belize", 'sportspress' ),
			'bol' => __( "Bolivia", 'sportspress' ),
			'bot' => __( "Botswana", 'sportspress' ),
			'bra' => __( "Brazil", 'sportspress' ),
			'brb' => __( "Barbados", 'sportspress' ),
			'bru' => __( "Brunei", 'sportspress' ),
			'bul' => __( "Bulgaria", 'sportspress' ),
			'cam' => __( "Cambodia", 'sportspress' ),
			'can' => __( "Canada", 'sportspress' ),
			'cay' => __( "Cayman Islands", 'sportspress' ),
			'cgo' => __( "Republic of the Congo", 'sportspress' ),
			'cha' => __( "Chad", 'sportspress' ),
			'chi' => __( "Chile", 'sportspress' ),
			'chn' => __( "China", 'sportspress' ),
			'civ' => __( "Ivory Coast", 'sportspress' ),
			'cmr' => __( "Cameroon", 'sportspress' ),
			'cod' => __( "Democratic Republic of the Congo", 'sportspress' ),
			'cok' => __( "Cook Islands", 'sportspress' ),
			'col' => __( "Colombia", 'sportspress' ),
			'com' => __( "Comoros", 'sportspress' ),
			'cpv' => __( "Cape Verde", 'sportspress' ),
			'crc' => __( "Costa Rica", 'sportspress' ),
			'cro' => __( "Croatia", 'sportspress' ),
			'cta' => __( "Central African Republic", 'sportspress' ),
			'cub' => __( "Cuba", 'sportspress' ),
			'cuw' => __( "Curacao", 'sportspress' ),
			'cyp' => __( "Cyprus", 'sportspress' ),
			'cze' => __( "Czechia", 'sportspress' ),
			'den' => __( "Denmark", 'sportspress' ),
			'dji' => __( "Djibouti", 'sportspress' ),
			'dma' => __( "Dominica", 'sportspress' ),
			'dom' => __( "Dominican Republic", 'sportspress' ),
			'ecu' => __( "Ecuador", 'sportspress' ),
			'egy' => __( "Egypt", 'sportspress' ),
			'eng' => __( "England", 'sportspress' ),
			'eqg' => __( "Equatorial Guinea", 'sportspress' ),
			'eri' => __( "Eritrea", 'sportspress' ),
			'esh' => __( "Western Sahara", 'sportspress' ),
			'esp' => __( "Spain", 'sportspress' ),
			'est' => __( "Estonia", 'sportspress' ),
			'eth' => __( "Ethiopia", 'sportspress' ),
			'fij' => __( "Fiji", 'sportspress' ),
			'fin' => __( "Finland", 'sportspress' ),
			'fra' => __( "France", 'sportspress' ),
			'fro' => __( "Faroe Islands", 'sportspress' ),
			'fsm' => __( "Micronesia", 'sportspress' ),
			'gab' => __( "Gabon", 'sportspress' ),
			'gam' => __( "Gambia", 'sportspress' ),
			'gbr' => __( "United Kingdom", 'sportspress' ),
			'geo' => __( "Georgia", 'sportspress' ),
			'ger' => __( "Germany", 'sportspress' ),
			'gha' => __( "Ghana", 'sportspress' ),
			'gib' => __( "Gibraltar", 'sportspress' ),
			'gnb' => __( "Guinea-Bissau", 'sportspress' ),
			'gre' => __( "Greece", 'sportspress' ),
			'grn' => __( "Grenada", 'sportspress' ),
			'gua' => __( "Guatemala", 'sportspress' ),
			'gui' => __( "Guinea", 'sportspress' ),
			'gum' => __( "Guam", 'sportspress' ),
			'guy' => __( "Guyana", 'sportspress' ),
			'hai' => __( "Haiti", 'sportspress' ),
			'hkg' => __( "Hong Kong", 'sportspress' ),
			'hon' => __( "Honduras", 'sportspress' ),
			'hun' => __( "Hungary", 'sportspress' ),
			'idn' => __( "Indonesia", 'sportspress' ),
			'ind' => __( "India", 'sportspress' ),
			'irl' => __( "Ireland", 'sportspress' ),
			'irn' => __( "Iran", 'sportspress' ),
			'irq' => __( "Iraq", 'sportspress' ),
			'isl' => __( "Iceland", 'sportspress' ),
			'isr' => __( "Israel", 'sportspress' ),
			'ita' => __( "Italy", 'sportspress' ),
			'jam' => __( "Jamaica", 'sportspress' ),
			'jor' => __( "Jordan", 'sportspress' ),
			'jpn' => __( "Japan", 'sportspress' ),
			'kaz' => __( "Kazakhstan", 'sportspress' ),
			'ken' => __( "Kenya", 'sportspress' ),
			'kos' => __( "Kosovo", 'sportspress' ),
			'kgz' => __( "Kyrgyzstan", 'sportspress' ),
			'kir' => __( "Kiribati", 'sportspress' ),
			'kor' => __( "South Korea", 'sportspress' ),
			'ksa' => __( "Saudi Arabia", 'sportspress' ),
			'kuw' => __( "Kuwait", 'sportspress' ),
			'lao' => __( "Laos", 'sportspress' ),
			'lbr' => __( "Liberia", 'sportspress' ),
			'lby' => __( "Libya", 'sportspress' ),
			'lca' => __( "Saint Lucia", 'sportspress' ),
			'les' => __( "Lesotho", 'sportspress' ),
			'lib' => __( "Lebanon", 'sportspress' ),
			'lie' => __( "Liechtenstein", 'sportspress' ),
			'ltu' => __( "Lithuania", 'sportspress' ),
			'lux' => __( "Luxembourg", 'sportspress' ),
			'lva' => __( "Latvia", 'sportspress' ),
			'mac' => __( "Macau", 'sportspress' ),
			'mad' => __( "Madagascar", 'sportspress' ),
			'mar' => __( "Morocco", 'sportspress' ),
			'mas' => __( "Malaysia", 'sportspress' ),
			'mco' => __( "Monaco", 'sportspress' ),
			'mda' => __( "Moldova", 'sportspress' ),
			'mdv' => __( "Maldives", 'sportspress' ),
			'mex' => __( "Mexico", 'sportspress' ),
			'mhl' => __( "Marshall Islands", 'sportspress' ),
			'mkd' => __( "North Macedonia", 'sportspress' ),
			'mli' => __( "Mali", 'sportspress' ),
			'mlt' => __( "Malta", 'sportspress' ),
			'mne' => __( "Montenegro", 'sportspress' ),
			'mng' => __( "Mongolia", 'sportspress' ),
			'moz' => __( "Mozambique", 'sportspress' ),
			'mri' => __( "Mauritius", 'sportspress' ),
			'msr' => __( "Montserrat", 'sportspress' ),
			'mtn' => __( "Mauritania", 'sportspress' ),
			'mwi' => __( "Malawi", 'sportspress' ),
			'mya' => __( "Myanmar", 'sportspress' ),
			'nam' => __( "Namibia", 'sportspress' ),
			'nca' => __( "Nicaragua", 'sportspress' ),
			'ncl' => __( "New Caledonia", 'sportspress' ),
			'ned' => __( "Netherlands", 'sportspress' ),
			'nep' => __( "Nepal", 'sportspress' ),
			'nga' => __( "Nigeria", 'sportspress' ),
			'nig' => __( "Niger", 'sportspress' ),
			'nir' => __( "Northern Ireland", 'sportspress' ),
			'nor' => __( "Norway", 'sportspress' ),
			'nru' => __( "Nauru", 'sportspress' ),
			'nzl' => __( "New Zealand", 'sportspress' ),
			'oma' => __( "Oman", 'sportspress' ),
			'pak' => __( "Pakistan", 'sportspress' ),
			'pan' => __( "Panama", 'sportspress' ),
			'par' => __( "Paraguay", 'sportspress' ),
			'per' => __( "Peru", 'sportspress' ),
			'phi' => __( "Philippines", 'sportspress' ),
			'ple' => __( "Palestine", 'sportspress' ),
			'plw' => __( "Palau", 'sportspress' ),
			'png' => __( "Papua New Guinea", 'sportspress' ),
			'pol' => __( "Poland", 'sportspress' ),
			'por' => __( "Portugal", 'sportspress' ),
			'prk' => __( "North Korea", 'sportspress' ),
			'pur' => __( "Puerto Rico", 'sportspress' ),
			'qat' => __( "Qatar", 'sportspress' ),
			'rou' => __( "Romania", 'sportspress' ),
			'rsa' => __( "South Africa", 'sportspress' ),
			'rus' => __( "Russia", 'sportspress' ),
			'rwa' => __( "Rwanda", 'sportspress' ),
			'sam' => __( "Samoa", 'sportspress' ),
			'sco' => __( "Scotland", 'sportspress' ),
			'sdn' => __( "Sudan", 'sportspress' ),
			'sen' => __( "Senegal", 'sportspress' ),
			'sey' => __( "Seychelles", 'sportspress' ),
			'sin' => __( "Singapore", 'sportspress' ),
			'skn' => __( "Saint Kitts and Nevis", 'sportspress' ),
			'sle' => __( "Sierra Leone", 'sportspress' ),
			'slv' => __( "El Salvador", 'sportspress' ),
			'smr' => __( "San Marino", 'sportspress' ),
			'sol' => __( "Solomon Islands", 'sportspress' ),
			'som' => __( "Somalia", 'sportspress' ),
			'srb' => __( "Serbia", 'sportspress' ),
			'sri' => __( "Sri Lanka", 'sportspress' ),
			'ssd' => __( "South Sudan", 'sportspress' ),
			'stp' => __( "Sao Tome and Principe", 'sportspress' ),
			'sui' => __( "Switzerland", 'sportspress' ),
			'sur' => __( "Suriname", 'sportspress' ),
			'svk' => __( "Slovakia", 'sportspress' ),
			'svn' => __( "Slovenia", 'sportspress' ),
			'swe' => __( "Sweden", 'sportspress' ),
			'swz' => __( "Eswatini", 'sportspress' ),
			'syr' => __( "Syria", 'sportspress' ),
			'tah' => __( "Tahiti", 'sportspress' ),
			'tan' => __( "Tanzania", 'sportspress' ),
			'tca' => __( "Turks and Caicos Islands", 'sportspress' ),
			'tga' => __( "Tonga", 'sportspress' ),
			'tha' => __( "Thailand", 'sportspress' ),
			'tjk' => __( "Tajikistan", 'sportspress' ),
			'tkm' => __( "Turkmenistan", 'sportspress' ),
			'tls' => __( "East Timor", 'sportspress' ),
			'tog' => __( "Togo", 'sportspress' ),
			'tpe' => __( "Taiwan", 'sportspress' ),
			'tri' => __( "Trinidad and Tobago", 'sportspress' ),
			'tun' => __( "Tunisia", 'sportspress' ),
			'tur' => __( "Turkey", 'sportspress' ),
			'tuv' => __( "Tuvalu", 'sportspress' ),
			'uae' => __( "United Arab Emirates", 'sportspress' ),
			'uga' => __( "Uganda", 'sportspress' ),
			'ukr' => __( "Ukraine", 'sportspress' ),
			'uru' => __( "Uruguay", 'sportspress' ),
			'usa' => __( "United States", 'sportspress' ),
			'uzb' => __( "Uzbekistan", 'sportspress' ),
			'van' => __( "Vanuatu", 'sportspress' ),
			'vat' => __( "Vatican City", 'sportspress' ),
			'ven' => __( "Venezuela", 'sportspress' ),
			'vgb' => __( "British Virgin Islands", 'sportspress' ),
			'vie' => __( "Vietnam", 'sportspress' ),
			'vin' => __( "Saint Vincent and the Grenadines", 'sportspress' ),
			'vir' => __( "US Virgin Islands", 'sportspress' ),
			'wal' => __( "Wales", 'sportspress' ),
			'wif' => __( "West Indies", 'sportspress' ),
			'yem' => __( "Yemen", 'sportspress' ),
			'zam' => __( "Zambia", 'sportspress' ),
			'zim' => __( "Zimbabwe", 'sportspress' ),
		) );

		$this->legacy = array(
			'ad' => 'and',
			'ae' => 'uae',
			'af' => 'afg',
			'ag' => 'atg',
			'al' => 'alb',
			'am' => 'arm',
			'ao' => 'ang',
			'ar' => 'arg',
			'at' => 'aut',
			'au' => 'aus',
			'az' => 'aze',
			'ba' => 'bih',
			'bb' => 'brb',
			'bd' => 'ban',
			'be' => 'bel',
			'bf' => 'bfa',
			'bg' => 'bul',
			'bh' => 'bhr',
			'bi' => 'bdi',
			'bj' => 'ben',
			'bn' => 'bru',
			'bo' => 'bol',
			'br' => 'bra',
			'bs' => 'bah',
			'bt' => 'bhu',
			'bw' => 'bot',
			'by' => 'blr',
			'bz' => 'blz',
			'ca' => 'can',
			'cd' => 'cod',
			'cf' => 'cta',
			'cg' => 'cgo',
			'ch' => 'swz',
			'ci' => 'civ',
			'cl' => 'chi',
			'cm' => 'cmr',
			'cn' => 'chn',
			'co' => 'col',
			'cr' => 'crc',
			'cu' => 'cub',
			'cv' => 'cpv',
			'cy' => 'cyp',
			'cz' => 'cze',
			'de' => 'ger',
			'dj' => 'dji',
			'dk' => 'den',
			'dm' => 'dma',
			'do' => 'dom',
			'dz' => 'alg',
			'ec' => 'ecu',
			'ee' => 'est',
			'eg' => 'egy',
			'eh' => 'esh',
			'el' => 'gre',
			'en' => 'end',
			'er' => 'eri',
			'es' => 'esp',
			'et' => 'eth',
			'fi' => 'fin',
			'fj' => 'fij',
			'fm' => 'fsm',
			'fr' => 'fra',
			'ga' => 'gab',
			'gb' => 'gbr',
			'gd' => 'grn',
			'ge' => 'geo',
			'gh' => 'gha',
			'gm' => 'gam',
			'gn' => 'gui',
			'gq' => 'eqg',
			'gr' => 'gre',
			'gt' => 'gua',
			'gw' => 'gnb',
			'gy' => 'guy',
			'hk' => 'hkg',
			'hn' => 'hon',
			'hr' => 'cro',
			'ht' => 'hai',
			'hu' => 'hun',
			'id' => 'idn',
			'ie' => 'irl',
			'il' => 'isr',
			'in' => 'ind',
			'iq' => 'irq',
			'ir' => 'irn',
			'is' => 'isl',
			'it' => 'ita',
			'jm' => 'jam',
			'jo' => 'jor',
			'jp' => 'jpn',
			'ke' => 'ken',
			'kg' => 'kgz',
			'kh' => 'cam',
			'ki' => 'kir',
			'km' => 'com',
			'kn' => 'skn',
			'kp' => 'prk',
			'kr' => 'kor',
			'kw' => 'kuw',
			'kz' => 'kaz',
			'la' => 'lao',
			'lb' => 'lib',
			'lc' => 'lca',
			'li' => 'lie',
			'lk' => 'sri',
			'lr' => 'lbr',
			'ls' => 'les',
			'lt' => 'ltu',
			'lu' => 'lux',
			'lv' => 'lva',
			'ly' => 'lby',
			'ma' => 'mar',
			'mc' => 'mco',
			'md' => 'mda',
			'me' => 'mne',
			'mg' => 'mad',
			'mh' => 'mhl',
			'mk' => 'mkd',
			'ml' => 'mli',
			'mm' => 'mya',
			'mn' => 'mng',
			'mo' => 'mac',
			'mr' => 'mtn',
			'mt' => 'mlt',
			'mu' => 'mri',
			'mv' => 'mdv',
			'mw' => 'mwi',
			'mx' => 'mex',
			'my' => 'mas',
			'mz' => 'moz',
			'na' => 'nam',
			'nb' => 'nir',
			'ne' => 'nig',
			'ng' => 'nga',
			'ni' => 'nca',
			'nl' => 'ned',
			'no' => 'nor',
			'np' => 'nep',
			'nr' => 'nru',
			'nz' => 'nzl',
			'om' => 'oma',
			'pa' => 'pan',
			'pe' => 'per',
			'pg' => 'png',
			'ph' => 'phi',
			'pk' => 'pak',
			'pl' => 'pol',
			'pr' => 'pur',
			'ps' => 'ple',
			'pt' => 'por',
			'pw' => 'plw',
			'py' => 'par',
			'qa' => 'qat',
			'ro' => 'rou',
			'rs' => 'srb',
			'ru' => 'rus',
			'rw' => 'rwa',
			'sa' => 'ksa',
			'sb' => 'sol',
			'sc' => 'sey',
			'sd' => 'sdn',
			'se' => 'swe',
			'sf' => 'sco',
			'sg' => 'sin',
			'si' => 'svn',
			'sk' => 'svk',
			'sl' => 'sle',
			'sm' => 'smr',
			'sn' => 'sen',
			'so' => 'som',
			'sr' => 'sur',
			'st' => 'stp',
			'sv' => 'slv',
			'sy' => 'syr',
			'sz' => 'swz',
			'td' => 'cha',
			'tg' => 'tog',
			'th' => 'tha',
			'tj' => 'tjk',
			'tl' => 'tls',
			'tm' => 'tkm',
			'tn' => 'tun',
			'to' => 'tga',
			'tr' => 'tur',
			'tt' => 'tri',
			'tv' => 'tuv',
			'tw' => 'tpw',
			'tz' => 'tan',
			'ua' => 'ukr',
			'uk' => 'gbr',
			'ug' => 'uga',
			'us' => 'usa',
			'uy' => 'uru',
			'uz' => 'uzb',
			'va' => 'vat',
			'vc' => 'vin',
			've' => 'ven',
			'vn' => 'vie',
			'vu' => 'van',
			'wl' => 'wal',
			'ws' => 'sam',
			'ye' => 'yem',
			'za' => 'rsa',
			'zm' => 'zam',
			'zw' => 'zim',
		);

		foreach ( $continents as $continent => $codes ):
			$countries = array_intersect_key( $this->countries, array_flip( $codes ) );
			asort( $countries );
			$continents[ $continent ] = $countries;
		endforeach;

		$this->continents = apply_filters( 'sportspress_continents', $continents );
	}

	/**
	 * Get the base country.
	 *
	 * @access public
	 * @return string
	 */
	public function get_base_country() {
		$default = esc_attr( get_option('sportspress_default_country') );
		$country = ( ( $pos = strrpos( $default, ':' ) ) === false ) ? $default : substr( $default, 0, $pos );

		return apply_filters( 'sportspress_countries_base_country', $country );
	}


	/**
	 * Outputs the list of continents and countries for use in dropdown boxes.
	 *
	 * @access public
	 * @param string $selected_country (default: '')
	 * @param bool $escape (default: false)
	 * @return void
	 */
	public function country_dropdown_options( $selected_country = '', $escape = false ) {
		if ( $this->continents ) foreach ( $this->continents as $continent => $countries ):
			?>
				<optgroup label="<?php echo $continent; ?>">
					<?php foreach ( $countries as $code => $country ): ?>
						<option value="<?php echo $code; ?>" <?php selected ( $selected_country, $code ); ?>><?php echo $country; ?></option>
					<?php endforeach; ?>
				</optgroup>
			<?php
		endforeach;
	}
}
