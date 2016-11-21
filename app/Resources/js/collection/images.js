var Backbone = require('backbone');
var Image = require('model/image.js');

module.exports = Backbone.Collection.extend({
    url: '/rest/album/:id',
    model: Image,
    parse: function(response) {
        return response.images;
    },
    setAlbumId: function (id) {
        this.url = this.url.replace(":id", id);
    }
});
