<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>List of friend</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/default.css">
	</head>
	<body>

		<div class="mt-3" id="info"><span id="privacy_text" >Periodic table</span></div>
        
		<div id="container"></div>
		<div id="menu">
			<button id="table">TABLE</button>
			<button id="sphere">SPHERE</button>
			<button id="helix">HELIX</button>
			<button id="grid">GRID</button>
			<button onclick="Login()">CONNECT TO FACEBOOK</button>
		</div>
        <div id="fb-root"></div>


		<!-- Import maps polyfill -->
		<!-- Remove this when import maps will be widely supported -->
		<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

		<script type="importmap">
			{
				"imports": {
					"three": "<?php echo base_url() ?>node_modules/three/build/three.module.js"
				}
			}
		</script>



		<script type="module" src="<?php echo base_url() ?>assets/js/periodic_table.js"></script>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
        <script>

            var data;
           
            window.fbAsyncInit = function ()
            {
                FB.init
                        ({
                            appId: '398312695627828',
                            status: true,
                            cookie: true,
                            xfbml: true
                        });
            };
           
            (function () {
                var e = document.createElement('script');
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());

            function Login() {
                FB.login(function (response) {
                    if (response.authResponse) {
                       getUserInfo();
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'public_profile ,email'});
            }
            function getUserInfo() {
                FB.api('/me', {fields: "id,picture,email,first_name,gender,last_name,name"}, function (response) {
                    var pic = response.picture;
                    var first_name = response.first_name;
                    var last_name = response.last_name;
                    var gender = response.gender;
                    var fb_id = response.id;
                    var email = response.email;
                    var profile_pic = pic.data.url;
                    var url = "URL of your REST API";
                    $("#privacy_text").text('This is the list of '+first_name+'\'s friends');
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            first_name: first_name, last_name: last_name, gender: gender, fb_id: fb_id, email: email, profile_pic: profile_pic
                        },
                        dataType: "json",
                        success: function (data) {
                            return data;
                        }
                    });
                });
            }
            /** End of FB Login **/
        </script>


	</body>
</html>