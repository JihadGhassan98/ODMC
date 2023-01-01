const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

    mix.sass('resources/Sass/welcomeUser.scss','public/css')
    .sass('resources/Sass/homePage.scss','public/css')
    .sass('resources/Sass/body.scss','public/css')
    .sass('resources/Sass/clinicProfile.scss','public/css')
    .sass('resources/Sass/navbar.scss','public/css')
    .sass('resources/Sass/footer.scss','public/css')
    .sass('resources/Sass/uploadPhoto.scss','public/css')
    .sass('resources/Sass/volunteerRequest.scss','public/css')
    .sass('resources/Sass/medicalRecords.scss','public/css')
    .sass('resources/Sass/allVolunteers.scss','public/css')
    .sass('resources/Sass/allUsers.scss','public/css')
    .sass('resources/Sass/allClinics.scss','public/css')
    .sass('resources/Sass/volunteerDashboard.scss','public/css')
    .sass('resources/Sass/clinicRequest.scss','public/css')
    .sass('resources/Sass/myClinic.scss','public/css')
    .sass('resources/Sass/pointList.scss','public/css')
    .sass('resources/Sass/userAppointments.scss','public/css');



