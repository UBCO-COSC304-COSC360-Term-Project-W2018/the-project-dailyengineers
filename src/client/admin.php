<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium | Admin</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
</head>

<body>
    <?php include 'header.php';?>
    <main>
        <div class="columnContainer">
            <section class="leftSidebar">
                <div class="custom-select">
                    <a class="adminButton" href="#manageusers">Manage Users</a>
                    <a class="adminButton" href="#managedatabase">Manage Database</a>
                    <a class="adminButton" href="#salesreport">Sales Report</a>
                    <a class="adminButton" href="#featuretracking">Feature Tracking</a>
                    <a class="adminButton" href="#salestracking">Sales Tracking</a>
                </div>
            </section>
            <section class="mainView">
                <section class="mainPageBody">
                    <h1 class="titleAdmin">Admin</h1>
                    <div class="adminDiv" id="manageusers">
                        <p class="subtitleAdmin">Manage Users</p>
                        <form class="searcheree" action="searcher.php">
                            <input id="bar" type="text" name="searchBar" placeholder="Search Users">
                            <button class="barButton" type="submit">Go</button>
                        </form>
                        <a href="#" class="manageusersButton">Reset Password</a>
                        <a href="#" class="manageusersButton">Enable/Disable</a>
                        <table class="manageusersTable">
                            <tr>
                                <th>Username</th>
                                <th>Profile Picture</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <td>user_1</td>
                                <td>
                                    <img src="images/patrick.png" class="profilePicture">
                                    <a href="#" class="manageusersButton">Reset Default</a>
                                </td>
                                <td><a href="mailto:fakeuser1@email.com" class="emailUser">fakeuser1@email.com</a></td>
                            </tr>
                        </table>
                        <div>
                            <p class="undersubtitleAdmin">Posts</p>
                            <table class="manageusersTable">
                                <tr>
                                    <th>Post:</th>
                                    <td>Peel P50 - 102,030km - $3400</td>
                                </tr>
                                <tr>
                                    <th>Comment:</th>
                                    <td>Wow! This is a comment!</td>
                                </tr>
                                <tr>
                                    <th>Comment:</th>
                                    <td>Check Engine Light</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <p class="undersubtitleAdmin">Change Username</p>
                            <form class="searcheree" action="searcher.php">
                                <input id="bar" type="text" name="searchBar" placeholder="Change Username">
                                <button class="barnameButton" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="adminDiv" id="managedatabase">
                        <p class="subtitleAdmin">Manage Database</p>
                        <p>PLACEHOLDER</p>
                    </div>
                    <div class="adminDiv" id="salesreport">
                        <p class="subtitleAdmin">Sales Report</p>
                        <p>PLACEHOLDER</p>
                    </div>
                    <div class="adminDiv" id="featuretracking">
                        <p class="subtitleAdmin">Feature Tracking</p>
                        <table class="manageusersTableFeatures">
                            <tr>
                                <th>10/20/2018</th>
                                <td><ul><li>Added page</li></ul></td>
                            </tr>
                            <tr>
                                <th>10/12/2018</th>
                                <td><ul><li>Added search functions</li></ul></td>
                            </tr>
                            <tr>
                                <th>10/9/2018</th>
                                <td><ul><li>Added Comments</li><li>Added Pictures</li></ul></td>
                            </tr>
                        </table>
                    </div>
                    <div class="adminDiv" id="salestracking">
                        <p class="subtitleAdmin">Sales Tracking</p>
                        <p>PLACEHOLDER</p>
                    </div>
                </section>
            </section>
        </div>
        <?php include "footer.php" ?>
    </main>
    </div>
</body>

</html>
