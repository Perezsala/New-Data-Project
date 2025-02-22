<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CRUD Operations via a Web Interface</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Additional styles for arranging forms horizontally */
        form {
            display: inline-block;
            vertical-align: top;
        }

        form:not(:last-child) {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>CRUD Operations via a Web Interface</h1>
    </header>
    <form id="clear-results" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input id="clear-results__submit-button" type="submit" value="Clear Results">
    </form>
    <?php

   require_once "includes/config.php";
   require_once "includes/helpers.php";

   define("NOTHING_FOUND", "NOTHING_FOUND");
   define("SEARCH", "SEARCH");
   define("UPDATE", "UPDATE");
   define("INSERT", "INSERT");
   define("DELETE", "DELETE");

   $option = (isset($_POST['submitted']) ? $_POST['submitted'] : null);

   if ($option != null) {
       switch ($option) {

           case SEARCH:
               if ("" == $_POST['search'] || "" == $_POST['att']) {
                   echo '<div id="error">Search query empty. Please try again.</div>' . "\n";
               } else {
                   if (search($_POST['search'], $_POST['att']) === NOTHING_FOUND) {
                       echo '<div id="error">Nothing found.</div>' . "\n";
                   }
               }
               break;

               case DELETE:
                if (("" == $_POST['search']) || ("" == $_POST['att'])) {
                echo '<div id="error">At least one field in your delete procedure ' .
                     'is empty. Please try again.</div>' . "\n";
            } else {
                delete($_POST['search'], $_POST['att']);
            }

            break;

                case UPDATE:
                    if ("" == $_POST['new-attribute'] || "" == $_POST['pattern']) {
                        echo '<div id="error">One or both fields were empty, ' .
                            'but both must be filled out. Please try again.</div>' . "\n";
                    } else {
                        update($_POST['current-attribute'], $_POST['new-attribute'],
                            $_POST['query-attribute'], $_POST['pattern']);
                    }
                    break;

                    case INSERT:

                    if (("" == $_POST['first_name']) ||("" == $_POST['last_name']) || ("" == $_POST['username'])|| ("" == $_POST['email_address'])
                        || ("" == $_POST['comment'])|| ("" == $_POST['timestamp'])||("" == $_POST['website_name'])||("" == $_POST['password'])
                        ||("" == $_POST['website_url'])) {
                        echo '<div id="error">At least one field in your insert request ' .
                            'is empty. Please try again.</div>' . "\n";
                        } else {
                            insert(
                                $_POST['first_name'],
                                $_POST['last_name'],
                                $_POST['username'],
                                $_POST['email_address'],
                                $_POST['comment'],
                                $_POST['timestamp'],
                                $_POST['website_name'],
                                $_POST['website_url'],
                                $_POST['password'],

                            );
                        }
                        break;


        }
    }


    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Search</legend>
            <select name="att" id="att">
                <option>user_id</option>
                <option>first_name</option>
                <option>last_name</option>
                <option>username</option>
                <option>email_address</option>
                <option>comment</option>
                <option>timestamp</option>
                <option>website_name</option>
                <option>website_url</option>
                <option>password</option>

            </select>
            <input type="text" name="search" autofocus required>
            <input type="hidden" name="submitted" value="<?php echo SEARCH; ?>">
            <p><input type="submit" value="search"></p>
        </fieldset>
    </form>



    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Delete</legend>
        DELETE FROM users_info WHERE
        <select name="att" id="att">
            <option>user_id</option>
                <option>first_name</option>
                <option>last_name</option>
                <option>username</option>
                <option>email_address</option>
                <option>comment</option>
                <option>timestamp</option>
                <option>password</option>
                <option>website_name</option>
                <option>website_url</option>


            <!-- Add other options for the attributes you want to delete -->
        </select>
        = <input type="text" name="search" required>
        <input type="hidden" name="submitted" value="<?php echo DELETE; ?>">
        <p><input type="submit" value="delete"></p>
    </fieldset>
</form>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <fieldset>
    <legend>Update</legend>
    UPDATE users_info SET
    <select name="current-attribute" id="current-attribute">

                <option>first_name</option>
                <option>last_name</option>
                <option>username</option>
                <option>email_address</option>
                <option>comment</option>
                <option>timestamp</option>
                <option>website_name</option>
                <option>website_url</option>
                <option>password</option>
    </select>
    = <input type="text" name="new-attribute" required> WHERE
    <select name="query-attribute" id="query-attribute">

                <option>first_name</option>
                <option>last_name</option>
                <option>username</option>
                <option>email_address</option>
                <option>comment</option>
                <option>timestamp</option>
                <option>website_name</option>
                <option>website_url</option>
                <option>password</option>
    </select>
    = <input type="text" name="pattern" required>
    <input type="hidden" name="submitted" value="<?php echo UPDATE; ?>">
    <p><input type="submit" value="update"></p>
  </fieldset>
</form>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Insert</legend>
        <input type="text" name="website_name" placeholder="Website Name" required>,
        <input type="text" name="website_url" placeholder="Website URL" required>
        <br>
        <input type="text" name="email_address" placeholder="Email" required>,
        <input type="text" name="first_name" placeholder=" First Name" required>,
        <input type="text" name="last_name" placeholder="Last Name" required>,
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="timestamp" placeholder="Timestamp" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>,
        <textarea name="comment" placeholder="Comment" required></textarea>
        <input type="hidden" name="submitted" value="<?php echo INSERT; ?>">
        <p><input type="submit" value="Insert"></p>
    </fieldset>
</form>




    <!-- ... rest of the code remains the same -->
</body>
</html>
