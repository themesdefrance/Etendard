var Config = require('./config');

var phpSelector = 'table.xdebug-error';

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
			.assert.numberOfElements('ul.articles li .article:not(.sticky)').is.gte(5, 'At least 5 articles are displayed on the posts page')
			.assert.exists('.article .header-title', 'Articles have a title')
			.assert.exists('.article div.content', 'Articles have a content')
			.assert.doesntExist('.article.post-418', "Scheduled articles don't show up")
			.assert.doesntExist('.article.post-922', "Drafts don't show up")
			.assert.exists('div.pagination', 'Posts pagination exists')
			.assert.text('ul.articles li:first-child .header-title').is('Sticky', 'Sticky post shows up and is the first in the list')
			.assert.doesntExist(phpSelector, 'No PHP errors found')
			.done();
//		@TODO:
//		- check post order
	},
	'Static Front Page': function(test){
		test
			.open(Config.url)
			.assert.exists('body.page-template-front-page-php', 'Static front page is active')
			.assert.doesntExist(phpSelector, 'No PHP errors found')
			.click('.blog .cta-button')
			.assert.url().is(Config.url+Config.posts, 'Link to posts index works')
			.done();
//		@TODO:
//		- check other links
	}
}