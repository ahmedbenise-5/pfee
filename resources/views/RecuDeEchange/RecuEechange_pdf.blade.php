<!DOCTYPE html>
<html>

<head>
    <title>Facture Etudaint</title>
    <style>
        .logo {
            position: absolute;
            margin-left: 570px !important;
            width: 150px;
            margin-top: 0px
        }

        .title_pdf {
            color: #7a7b7e;
            font-size: 150%;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 20px;
        }

        .title {
            font-family: Arial, Helvetica, sans-serif !important;

        }
        .sing{
            margin-left: 550px !important
        }
        .cd{
            border-bottom:  1px dashed; 
        }
    </style>
</head>

<body>
    <div class="page">
        <img src="{{ public_path('assets/media/logos/archi1.png') }}" class="logo" />
        <h2 class="title_pdf">
            Reçu de   Recu de echange  d'Etudiant
        </h2>
        <br>
        <h4 class="title">Nom complet : <code class="cd"
                style="color:
            #7a7b7e">{{ $etudaint->name }} </code></h4>
        <h4 class="title">Niveaux de Etudes : <code class="cd"
                style="color:
        #7a7b7e">{{ $etudaint->niveauxdetudes->Nom}} </code></h4>
        <h4 class="title">classes :
            <code  class="cd" style="color: 
        #7a7b7e">{{ $etudaint->Classes->Nom_Classe}}  </code></h4>
        <h4 class="title">Montante :
            <code  class="cd" style="color:
        #7a7b7e">{{ $RecuEechange->Debit}} MAD </code></h4>
        <h4 class="title">Date Facture :
            <code class="cd" style="color:
        #7a7b7e">{{ $RecuEechange->date}}  </code></h4>
        <h4 class="title">Description :
            <code class="cd" style="color:
        #7a7b7e">{{ $RecuEechange->description}} </code></h4><br>
      <h3 class="sing">Signature : </h3>


    </div>



</body>

</html>
