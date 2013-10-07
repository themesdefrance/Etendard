var Config = require('./config');

module.exports = {
	'Admin': function(test){
		test
			.open(Config.url+'/wp-login.php')
			.assert.exists('#loginform', 'Login page is available')
			.type('#user_login', Config.username)
			.type('#user_pass', Config.password)
			.submit('#loginform')
			.assert.url().is(Config.url+'/wp-admin/', 'Can access admin panel')
			.done()
	},
	'Template Hierarchy': function(test){
		test
			.open(Config.url+Config.posts)
			.assert.numberOfElements('ul.articles li article').is.gte(5, 'At least 5 articles are displayed on the posts page')
			.assert.exists('.article .header-title', 'Articles have a title')
			.assert.exists('.article div.content', 'Articles have a content')
			.done();
	},
}