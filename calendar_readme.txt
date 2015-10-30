if you are using the calendar functionality within functions.php please take note

        1.the following variables need to be in your wp-config.php file



        /** The Google Calendar to access 3citysamoraseller. */
        define('CALENDAR_ID', '3citysamoraseller@gmail.com');


        /** The Google API to access 3citysamoraseller. access this from console.developer.google.com */
        define('GOOGLE_API', 'AIzaSyBcSX2QJtx4Bf1InL0r5d4ekoMt0WJ6pAs');

        /** The Google client files  */
        //copy the zipfile in theme and post it within the  imagineart wordpress folder or another location that you will able able to use
        define('GOOGLE_CLIENT_FILES', '/var/www/html/ImagineArt/google-api-php-client/src');
        //sandbox'/home3/staceyr1/public_html/imagineart/google-api-php-client/src';
        //zorin local '/var/www/html/ImagineArt/google-api-php-client/src';

        2 the need the google-api-php-client will be included as part of the child theme as a zipfile but DO NOT extract within the child theme because you wont be able to log in via wp-admin/admin