<header>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Simple Example</title>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="http://localhost/MicroFramework/index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php //if (!isLoggedIn()): ?>
                        <a href="operators/Create.php" class="btn btn-outline-success">Sign up</a>
                    <!-- <?php //else: ?>
                        &nbsp;&nbsp;
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Welcome <b><?php //echo currentUser()['full_name'] ?></b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/logout" class="btn btn-primary">Logout</a>
                            </li>
                        </ul>
                    <?php //endif; ?> -->
                </form>
            </div>
        </div>
    </nav>
</header>
