editAreaLoader.load_syntax["cpp"] = {
	'DISPLAY_NAME' : 'CPP'
	,'COMMENT_SINGLE' : {1 : '//'}
	,'COMMENT_MULTI' : {'/*' : '*/'}
	,'QUOTEMARKS' : {1: "'", 2: '"'}
	,'KEYWORD_CASE_SENSITIVE' : true
	,'KEYWORDS' : {
		'constants' : [
			'NULL', 'false', 'std', 'stdin', 'stdout', 'stderr',
			'true'
		]
		,'types' : [
			'FILE', 'array', 'auto', 'char', 'class', 'complex', 'const', 'double',
			'extern', 'float', 'friend', 'inline', 'int',
			'iterator', 'long', 'map', 'operator', 'queue',
			'register', 'short', 'signed', 'size_t', 'stack',
			'static', 'string', 'string_t', 'struct', 'time_t', 'typedef',
			'union', 'unsigned', 'vector', 'void', 'volatile'
		]
		,'statements' : [
			'catch', 'do', 'else', 'enum', 'for', 'goto', 'if',
			'sizeof', 'switch', 'this', 'throw', 'try', 'while'
		]
 		,'keywords' : [
			'break', 'case', 'continue', 'default', 'delete',
			'namespace', 'new', 'private', 'protected', 'public',
			'return', 'using'
		]
		,'keywords2' : [  // Added to resemble color scheme of Chide - 12.18.14
			'printf', 'scanf', 'CPlot', 'pow', 'sqrt', 'sin', 'cos', 'tan', 'NULL', 'randint', 'randdouble', 'time', 'strlen', 'rand', 'srand'
		]
	}
	,'OPERATORS' :[
		'+', '-', '/', '*', '=', '<', '>', '%', '!', '?', ':', '&'
	]
	,'DELIMITERS' :[
		'(', ')', '[', ']', '{', '}'
	]
	,'REGEXPS' : {
		'precompiler' : {
			'search' : '()(#[^\r\n]*)()'
			,'class' : 'precompiler'
			,'modifiers' : 'g'
			,'execute' : 'before'
		}
/*		,'precompilerstring' : {
			'search' : '(#[\t ]*include[\t ]*)([^\r\n]*)([^\r\n]*[\r\n])'
			,'class' : 'precompilerstring'
			,'modifiers' : 'g'
			,'execute' : 'before'
		}*/
		/*,'numbers' : {   // Added to resemble color scheme of Chide - 12.18.14, Not Working
			'search' : '([:= +*\-\/\^]\d*\.?\d+)'
			,'class' : 'numbers'
			,'modifiers' : 'g'
			,'execute' : 'before'
		}*/
	}
	
	/* Commented colors are the original colors by editAreaLoader, changed to resemble color scheme of Chide - 12.18.14 */
	,'STYLES' : {
		'COMMENTS': 'color: #007F00;' //'color: #AAAAAA;'
		,'QUOTESMARKS': 'color: #7F007F;' //'color: #6381F8;'
		,'KEYWORDS' : {
			'constants' : 'color: #EE0000;'
			,'types' : 'color: #FF0000;' //'color: #0000EE;'
			,'statements' : 'color: #FF0000;' //'color: #60CA00;'
			,'keywords' : 'color: #FF0000;' //'color: #48BDDF;'
			,'keywords2' : 'color: #FF00FF;'
		}
		,'OPERATORS' : 'color: #000000;' //'color: #FF00FF;'
		,'DELIMITERS' : 'color: #0038E1;'
		,'REGEXPS' : {
			'precompiler' : 'color: #7F7F00;' //'color: #009900;'
			,'precompilerstring' : 'color: #994400;'
			//,'numbers' : 'color: #007F7F;' // Added to resemble color scheme of Chide - 12.18.14
		}
	}
};
