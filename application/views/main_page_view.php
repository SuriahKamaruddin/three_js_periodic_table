<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Kasatria</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/default.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 card card-body mt-4">
                <form>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Email address</label>
                        <input type="email" id="form2Example1" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Password</label>
                        <input type="password" id="form2Example2" class="form-control" />
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                        </div>

                        <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                        </div>
                    </div>
                    <div id="fb-root"></div>
                    <!-- Submit button -->
                    <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button id="call_facebook_login" type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google text-danger"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter text-info"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github text-secondary"></i>
                        </button>
                    </div>
                </form>
                <a href="<?php echo base_url() ?>privacy_policy">Privacy Policy</a>
            </div>
        </div>

	

		<!-- Import maps polyfill -->
		<!-- Remove this when import maps will be widely supported -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
		<script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

		<script type="importmap">
			{
				"imports": {
					"three": "<?php echo base_url() ?>node_modules/three/build/three.module.js"
				}
			}
		</script>



		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
        <script>
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

            /** Fb Login **/
            // $("#call_facebook_login").click(){
			// });
			$( "#call_facebook_login" ).click(function() {
				Login();
            // alert( "Handler for .click() called." );
            });

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
                    console.log(response);
                    var pic = response.picture;
                    var first_name = response.first_name;
                    var last_name = response.last_name;
                    var gender = response.gender;
                    var fb_id = response.id;
                    var email = response.email;
                    var profile_pic = pic.data.url;
                    parameter = '?first_name=' + first_name;
                    var url =  window.location = "<?php echo base_url() ?>periodic_table/"+parameter ;
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            first_name: first_name, last_name: last_name, gender: gender, fb_id: fb_id, email: email, profile_pic: profile_pic
                        },
                        dataType: "json",
                        success: function (data) {
                           
                        }
                    });
                });
                
            }
            /** End of FB Login **/
        </script>


	</body>
</html>