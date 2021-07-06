# wp-nasa-slider

The task

Show a gallery of NASA images.

Setting
1. Install clean WordPress on a free hosting https://hostingfacts.com/free-web-hosting-sites/ or you can use your hosting (if you have one).

2. Install the theme https://wordpress.org/themes/twentynineteen/

Development
1. Create a plugin and write all the code in it. Configure all the files by Wordpress standard.

2. Add a new post type NASA Gallery (post-nasa-gallery) to create a gallery.

3. Upload daily a new image via NASA API from Astronomy Picture of the Day and save them as posts NASA Gallery for every image, where Post Title = Date, Featured image = Image from the API. 5 images should be added by the first upload to have data to work with.

Data resources
https://api.nasa.gov/index.html
https://api.nasa.gov/api.html
https://codex.wordpress.org/Transients_API
https://codex.wordpress.org/Function_Reference/wp_cron

4. Create a shortcode to display the 5 last posts as a gallery 500px on 300px. You can use any option from https://kenwheeler.github.io/slick/

5. The shortcode should be inserted to a separate page, and this page should be added to the main menu.
