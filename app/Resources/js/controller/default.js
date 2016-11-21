var Backbone = require('backbone');
var Marionette = require('backbone.marionette');
var AlbumsCollection = require('collection/albums');
var ImagesCollection = require('collection/images');

module.exports = Marionette.Object.extend({

    initialize: function () {
        this.albumsCollection = new AlbumsCollection();
    },

    index: function () {
        if (typeof this.albumsCollection.isLoaded == 'undefined') {
            this.albumsCollection.fetch({
                success: () => {
                    this.albumsCollection.isLoaded = true;
                    this.showAlbums(this.albumsCollection);
                }
            });
        } else {
            this.showAlbums(this.albumsCollection);
        }
    },

    album: function (id) {
        this.imagesCollection = new ImagesCollection();
        this.imagesCollection.setAlbumId(id);
        this.imagesCollection.fetch({
            success: () => {
                this.showAlbum(this.imagesCollection);
            }
        });
    },

    showAlbum: function (collection) {
        var AlbumList = Marionette.View.extend({
            el: '#app',
            template: require('templates/album.html')
        });

        var albumsView = new AlbumList({
            collection: collection
        });

        albumsView.render();
    },

    showAlbums: function (collection) {
        var AlbumList = Marionette.View.extend({
            el: '#app',
            ui: {
                viewAlbum: '.viewAlbum',
            },
            events: {
                'click @ui.viewAlbum': 'onViewAlbum'
            },
            template: require('templates/albums.html'),
            onViewAlbum: (event) => {
                Backbone.history.navigate('album/' + event.target.dataset.id, {trigger: true});
            }
        });

        var albumsView = new AlbumList({
            collection: collection
        });

        albumsView.render();
    }
});