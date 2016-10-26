define(['marionette', 'AlbumController'], function(Mn, AlbumController) {

    return Mn.AppRouter.extend({
        controller: AlbumController,
        appRoutes: {
            'album/:id': 'view'
        }
    });
});