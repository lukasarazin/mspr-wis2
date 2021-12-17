<form action="#">
    <input type="text" name="partialSearch" onkeyup="search(this.value)" placeholder="Search for other users"/>
</form>

<section id="divider">
    <div id="results"></div>
</section>

<!-- always place scripts just before the ending <body> tag for better performance -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    function search(partialSearch) {
        $.ajax({
            url: "search_results_ajax.php",
            type: "POST",
            data: {partialSearch: partialSearch},
            success: function (result) {
                $("#results").html(result);
            }
        });
    }
</script>

<?php
/**
 * Your function names should match their purpose. user_profile() does not accurately define the operations
 * this function will be performing.
 *
 * @param array $usernameToSearch - The username to compare with the database.
 *
 * @return array - A list of users.
 */
function get_users_by_username($usernameToSearch)
{
    $servername = "localhost";
    $username   = "root";
    $password   = "root";
    $dbname     = "coursework_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    /**
     * The query below will fetch all of your users from the database.
     *
     *      SELECT memberID, username FROM members
     *
     * You can narrow the results by using the WHERE clause with the LIKE operator:
     *
     *      $sql = 'SELECT memberID, username FROM members WHERE username LIKE "%' . $username . '%"'
     *
     * Learn more about the LIKE clause at: http://www.w3schools.com/sql/sql_like.asp
     */
    $sql    = 'SELECT memberID, username FROM members WHERE username LIKE "%' . $usernameToSearch . '%"';
    $result = $conn->query($sql);

    $users = array();
    while($row = $result->fetch_assoc()) {
        /** Renamed from $user to $users to match variable definition. */
        $users[] = $row;
    }

    /** Renamed from $user to $users to match variable definition. */
    return $users;
}


/**
 * Your AJAX request sends a parameter called "partialSearch", which contains the value of the textbox
 * on the search page. You can access that parameter through the PHP global, $_POST.
 *
 * (or $_GET, if the parameter is stored in the url. Such as: www.mywebsite.com?partialSearch=my+search+here)
 *
 * Before you execute get_users_by_username(), you must check if the "partialSearch" parameter exists. This
 * can be done through the empty() function, which essentially checks if the value if $_POST['partialSearch'] is:
 *  - false
 *  - an empty string
 *  - null
 *
 * The NOT operator "!" in front of empty() will flip the value returned by empty(). So if empty() returns true, the
 * NOT operator will flip it to false. This important because we only what the code within the "if" statement to
 * execute if $_POST['partialSearch'] is NOT empty.
 */
if(!empty($_POST['partialSearch'])) {
    /** Store the results of get_users_by_username(), so we can count the number of results without re-running the function. */
    $users = get_users_by_username($_POST['partialSearch']);

    /**
     * Foreach loops with through warnings if user_profile() returns an empty value. Make sure count($users) is > 0
     * before running the loop.
     */
    if(count($users) > 0) {
        foreach($users as $user) {
            print '<p>
                  <a href="ViewProfile.php?uid=' . $user['memberID'] . '">
                      ' . $user['username'] . '
                  </a>
               </p>';
        }
    } else {
        print "<p>No Results</p>";
    }
}

/**
 * In files with only PHP code, you do not need the closing PHP tag.
 *
 * "?>"
 */


if (!empty($_GET['uid'])) {
    $user = getUser($_GET['uid']);

    if (!empty($user)) {
        print "<h1>Welcome " . $user['username'] . "!";
    } else {
        print "User with ID " . $_GET['uid'] . " doesn't exist.";
    }
} else {
    //No UID was provided
    print "Please provide a UID to a valid user.";
}
