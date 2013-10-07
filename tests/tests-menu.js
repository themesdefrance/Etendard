module.exports = {
	'The menu': function(test){
		test
			.open('http://localhost/wpmvc/')
			.assert.exists('.main-header .main-menu', 'The menu element exists')
			.done();
	}
}