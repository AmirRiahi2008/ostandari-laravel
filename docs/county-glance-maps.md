# County glance maps

The county home/about pages use separate, locally hosted maps in their existing
“در یک نگاه” section. The province-wide interactive county selector is unchanged.

## Source and appearance

- Provider: [MapToPoster JS](https://maptoposter.tarmizi.id/).
- Standard renderer, Modern Voyager theme, zoom 12. Poster captions are disabled;
  the existing Persian section heading identifies the county in the site's font.
- Map data: OpenStreetMap contributors; cartography: CARTO. The export's embedded
  credit is preserved and readable credit links appear below the map.
- Every source export is 1300 × 630 pixels, matching the previous SVG's 650:315
  aspect ratio. Existing width, responsive grid, `object-fit: contain`, and
  300-pixel maximum height rules are reused without alteration.
- WebP files are encoded losslessly. Their decoded RGB pixels are identical to
  the downloaded PNGs. There are no live map, WebGL or provider API requests on
  the county pages.

The maps show each county's principal city and its surroundings. For Simorgh,
Miandorud, Savadkuh and North Savadkuh, the selected centers are Kiakola, Surak,
Pol-e Sefid and Shirgah respectively. These are street-map views, not an assertion
of administrative boundaries.

## Files and maintenance

- `public/images/county-maps/{county-slug}.webp`: all 22 local map images.
- `resources/data/county-map-sources.json`: source queries, centers, filenames,
  dimensions and checksums for the exports.
- `resources/views/site/county-glance-map.blade.php`: map image and credits.

To refresh a map, select its verified city in the provider, use the same theme,
zoom and dimensions, set Overlay Size to None to hide duplicate captions, and
download the PNG. Keep its attribution when losslessly encoding it as WebP and
update its entry in the source manifest. Do not reuse another county's map.

The existing county dashboard section switch still controls visibility. If a
future county does not have a local image, the original province locator SVG
remains available as a fallback. No database migration or seeder is needed.
