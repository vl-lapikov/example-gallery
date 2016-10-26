require(['marionette'], function(Mn) {

    Mn.AppRouter.extend({
        controller: {},
        appRoutes: {
            'album/:id': 'view'
        }
    });
});