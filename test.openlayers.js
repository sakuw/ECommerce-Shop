

///////////////////////////////////////////////////////////////////////////////
// START
///////////////////////////////////////////////////////////////////////////////
// Create map
var COORD_SYSTEM_GPS = 'EPSG:4326';  // gps (long/lat) coord system..
var COORD_SYSTEM_OSM = 'EPSG:3857';  // SphericalMercatorCoords - google and OSM's coord system..
var map = new ol.Map({
  target: 'map',
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM()
    })
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([0, 0]),
    zoom: 1
  })
});

var view = map.getView();
console.log('xxxxx 1');

// Add interactions
var selectedCollection = new ol.Collection();
var snappableCollection = new ol.Collection();
var selectInteraction = new ol.interaction.Select({
  features: selectedCollection,
  multi: true,
});
var modifyInteraction = new ol.interaction.Modify({
  // features: selectedCollection,
  features: selectInteraction.getFeatures(),
});
var snapInteraction = new ol.interaction.Snap({
  features: snappableCollection,
});
map.addInteraction(selectInteraction);
map.addInteraction(modifyInteraction);
map.addInteraction(snapInteraction);
console.log('xxxxx 2');

/* Adding Selected Feature */
selectedCollection.on('add', ({ element: feature }) => {
  console.log('================ map.js - selectedFeatures collection - add CALLBACK ================');
  console.log('map.js - selectedFeatures collection - add: ',feature);
  console.log('map.js - selectedFeatures collection - add - feature.getId(): ',feature.getId());
  console.log('map.js - selectedFeatures collection - add - feature.getKeys(): ',feature.getKeys());
  console.log('map.js - selectedFeatures collection - add - feature.getProperties(): ',feature.getProperties());
  console.log('map.js - selectedFeatures collection - add - feature.getGeometry(): ',feature.getGeometry());
  console.log('map.js - selectedFeatures collection - add - feature.getGeometryName(): ',feature.getGeometryName());
  console.log('map.js - selectedFeatures collection - add - feature.getRevision(): ',feature.getRevision());
});

/* Removing Selected Feature */
selectedCollection.on('remove', ({ element: feature }) => {
  console.log('================ map.js - selectedFeatures collection - remove CALLBACK ================');
  console.log('map.js - selectedFeatures collection - remove: ', feature);
  console.log('map.js - selectedFeatures collection - remove - feature.getId(): ',feature.getId());
  console.log('map.js - selectedFeatures collection - remove - feature.getKeys(): ',feature.getKeys());
  console.log('map.js - selectedFeatures collection - remove - feature.getProperties(): ',feature.getProperties());
  console.log('map.js - selectedFeatures collection - remove - feature.getGeometry(): ',feature.getGeometry());
  console.log('map.js - selectedFeatures collection - remove - feature.getGeometryName(): ',feature.getGeometryName());
  console.log('map.js - selectedFeatures collection - remove - feature.getRevision(): ',feature.getRevision());
});

// styles for the vector layers
var styles = [
  
];

// Create new layer/s
var numLayers = 1;
let vectorSource = [];
let vectorLayer = [];
let layerGroup = [];
for (var i = 0; i< numLayers;i++) {
  vectorSource[i] = new ol.source.Vector({});
  vectorLayer[i] = new ol.layer.Vector({
    source: vectorSource[i],
    style: styles
  });
  layerGroup[i] = new ol.layer.Group({
    layers: [vectorLayer[i]],
  });
  map.addLayer(layerGroup[i]);
}

///////////////////////////////////////////////////////////////////////////////
// Additional logic
///////////////////////////////////////////////////////////////////////////////
var extent;
var layerIndex = 0;

featureCollection['2'].features.forEach(function(featureJson) {  var feature = new ol.Feature({
    geometry: (new ol.geom.Polygon(featureJson.geometry.coordinates)).transform(COORD_SYSTEM_GPS, COORD_SYSTEM_OSM)
  });
  // Add feature to the vector source..
  vectorSource[layerIndex].addFeature(feature);
});
extent = vectorSource[layerIndex].getExtent();
layerIndex++;



// ///////////////////////////////////////////////////////////////////////////////
// // END..
// ///////////////////////////////////////////////////////////////////////////////
// Fit to extent
if (!(extent[0] == Number.POSITIVE_INFINITY || extent[0] == Number.NEGATIVE_INFINITY)) {
  view.fit(extent);
}
