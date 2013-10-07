var Config = require('./config');

module.exports = {
	'The menu': function(test){
		test
			.open(Config.url)
			.assert.exists('.main-header .main-menu', 'The menu element exists')
			.done();
	}
}