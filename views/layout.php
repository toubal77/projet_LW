<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="views/assets/bootstrap.min.css">
  <link rel="stylesheet" href="views/auth/styles/auth.css">
    <style>
        body {
            padding-top: 150px;
        }

        header {
          background: rgb(185, 184, 184) !important;	
            padding: 10px 0;
            box-shadow: 0 4px 2px -2px gray; 
        }

        header a {
            color: white; 
            margin-right: 15px;
        }

        header a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href='/project_LW'>Home</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href='?controller=posts&action=index'>Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='?controller=auth&action=index'>Se deconnecter</a>
                </li>
            </ul>
        </div>
    </header>






    <?php require_once('routes.php'); ?>
    
    
    
    <footer>
      Copyright
    </footer>
</body>

</html>
