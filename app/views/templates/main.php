<!DOCTYPE html>
<html lang="ru" >
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/jquery.js"></script>  
        <link href="../../../css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            .main-cont{
                height: 80vh;
                margin-bottom: 5vh;
                overflow: auto;
            }
        </style>
        <title>Phonebook</title>
    </head>
    <body>
        <div class="jumbotron p-0 main-nav">
            <h1 class="display-5 text-left" style="color: white; ">Phonebook</h1>
            <?php if ($_SESSION): ?>
                <p class="display-5 text-right" ><a href="/users/signout" style="color: white; margin: 3vh">LOGOUT</a></p>   
            <?php endif; ?>
        </div>
        <div class="container main_buttons">
            <button type="button" onclick="showContent('users_list_view', 'mycontact_view', 'login_view')">Phonebook</button>
            <?php if ($_SESSION): ?>
                <button type="button" onclick="showContent('mycontact_view', 'users_list_view', 'login_view')">My contact</button>
            <?php else: ?>
                <button type="button" onclick="showContent('login_view', 'users_list_view', 'mycontact_view')">Login</button>
            <?php endif; ?>        
        </div>
        <div class="container main-cont">  
            <div id="content">
                <div id="users_list_view" style="display: none">
                    <?php include 'app/views/content/users_view.php' ?>
                </div>
                <div id="mycontact_view" style="display: none">
                    <?php include 'app/views/content/mycontact_view.php' ?>
                </div>
                <div id="login_view" style="display: none">
                    <?php include 'app/views/content/login_view.php' ?>
                </div>
            </div>          
        </div>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </body>
    <script>
        function showDetails(id) {
            event.preventDefault();
            if (document.getElementById('details' + id).style.display === "none") {
                document.getElementById('details' + id).style.display = "block"
            } else {
                document.getElementById('details' + id).style.display = "none"
            }
        }
        function showContent(id, id2, id3) {
            document.getElementById(id2).style.display = "none";
            document.getElementById(id3).style.display = "none";
            if (document.getElementById(id).style.display === "none") {
                document.getElementById(id).style.display = "block"
            }
        }
        function addField(fieldname) {
            var new_field = '<div><label><input type="checkbox" name="pub_new_' + fieldname + '">Published</label><input type="text" name="new_' + fieldname + '" class="form-control"><span style="cursor:pointer" onclick="$($(this).parent()).remove()">delete</span></div>';
            $('#add_new_' + fieldname).before(new_field);
        }
    </script>
</html>