const wpTextdomain = require( 'wp-textdomain' );

wpTextdomain( process.argv[ 2 ], {
	domain: 'simplrdocs',
	fix: true,
} );
