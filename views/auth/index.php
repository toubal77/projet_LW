
        <form class="form-signin" method="POST" action="back/authentification.php">       
          <h2 class="form-signin-heading">Authentification</h2>
          <div class="input-container">
            <span class="glyphicon glyphicon-user"></span>
          <input id="username" type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required= autofocus="" />
        </div>
        <div class="input-container">
            <span class="glyphicon glyphicon-lock"></span>
          <input id="passwd" type="password" class="form-control" name="password" placeholder="Mot de passe" required/>  
        </div> 
    
          <button class="btn btn-lg btn-primary btn-block" id="connexion" onclick="authentifier()" type="submit">Se connecter</button>
          <a href="Inscription.html"> Cliquer Ici pour Creer un compte </a>
        </form>
    
      <script type="text/javascript">
      
         function authentifier() {      
        
       var username = document.getElementById("username").value;
       var password = document.getElementById("passwd").value;
       var valide=!(username.length==0);
       var valide2=!(password.length==0);
       if(valide){
         
        location.href="index2.html";
         
       }else{
        alert('les champs sont obligatoires ');
       }
     
        };
        </script>
