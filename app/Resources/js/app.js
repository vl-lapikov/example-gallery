var Backbone = require('backbone');
var Marionette = require('backbone.marionette');
var DefaultController = require('controller/default');

var defaultController = new DefaultController();

var AlbumRouter = Marionette.AppRouter.extend({
    controller: defaultController,
    appRoutes: {
        '': 'index',
        'album/:id': 'album'
    },
});
var router = new AlbumRouter();

Backbone.history.start({pushState: true});