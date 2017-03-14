 <?php

    require_once('database.class.php');
    
    class stagiaire {

    private $id, $nom, $prenom, $cp, $ville, $mail, $telephone, $promo;

    $this->bdd();
    public function CreateStagiaire($nom, $prenom, $cp, $ville, $email, $telephone, $promo) {

        $this->id        = $id;
        $this->nom       = $nom;
        $this->prenom    = $prenom;
        $this->cp        = $cp;
        $this->ville     = $ville;
        $this->mail      = $mail;
        $this->telephone = $telephone;
        $this->promo     = $promo;
        
        $this->NewStagiaire();
    }
    // Insererun nouveau stagiaire
    public function InsertStagiaire() {
        global $datab;
        $query      = "INSERT INTO stagiaires (nom, prenom, cp, ville, mail, telephone, promo) VALUES(:id, :nom, :prenom, :cp, :ville, :mail, :telephone, :promo)";
        $execute    = $datab->pdo->prepare($query);
        $execute->bindParam(':nom', $this->nom);
        $execute->bindParam(':prenom', $this->prenom);
        $execute->bindParam(':cp', $this->cp);
        $execute->bindParam(':mail', $this->mail);
        $execute->bindParam(':telephone', $this->telephone);
        $execute->bindParam(':promo', $this->promo);
        return $execute->execute();
    }

    // Recuperer un stagiare depuis la base de données
    public function RecupStagiare($id){
        global $datab;
        $info   = [];
        $query  = $datab->pdo->prepare("SELECT * from stagiaires ORDER by id DESC");
        $query->execute();
        $fetch  = $query->fetchAll();
       
        }
    


    }
}