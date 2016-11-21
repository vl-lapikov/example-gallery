var Backbone = require('backbone');
var Album = require('model/album.js');

module.exports = Backbone.Collection.extend({
    url: '/rest/album',
    model: Album
});
