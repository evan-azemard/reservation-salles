<?php

class Reservation{ 
        private $for_titre;
        private $textarea;
        private $heure1;
        private $id;
        private $heure2;
        private $date1;
        private $date2;
        private $reserver2;
        private $n_login;


         public function getFor_titre()
        {
            return $this->for_titre;
        }
        public function setFor_titre($for_titre)
        {
            $this->for_titre = $for_titre;
        }
         public function getTextarea()
        {
            return $this->textarea;
        }
        public function setTextarea($textarea)
        {
            $this->textarea = $textarea;
        }
         public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getLogin()
        {
            return $this->login;
        }
        public function setLogin($login)
        {
            $this->login = $login;
        }
          public function getRe()
        {
            return $this->re;
        }
        public function setRe($re)
        {
            $this->re = $re;
        }
          public function getRe2()
        {
            return $this->re2;
        }
        public function setRe2($re2)
        {
            $this->re2 = $re2;
        }
           public function getHeure1()
        {
            return $this->heure1;
        }
        public function setHeure1($heure1)
        {
            $this->heure1 = $heure1;
        }
           public function getHeure2()
        {
            return $this->heure2;
        }
        public function setHeure2($heure2)
        {
            $this->heure2 = $heure2;
        }




        public function reserver($for_titre,$textarea,$login,$re,$re2,$heure1,$heure2){

        $this->setFor_titre($for_titre);
        $this->setTextarea($textarea);
        $this->setRe($re);
        $this->setHeure1($heure1);
        $this->setHeure2($heure2);
        $this->setRe2($re2);
        $this->setLogin($login);
        require_once('../library/database.php'); 
        require_once('../library/utils.php'); 
        $dbco = connectPdo();
        $errors = array();


        	if ($this->for_titre && $this->textarea && $this->login && $this->re && $this->re2 && $this->heure1 && $this->heure2) {
        		if (strlen($this->for_titre) > 20) {
                array_push($errors, "Le titre est trop long");
            	}
            	if (strlen($this->for_titre) < 3) {
                array_push($errors, "Le titre est trop court");
            	}
            	if (strlen($this->textarea) > 150) {
                array_push($errors, "La description est trop long");
            	}
            	if (strlen($this->textarea) < 5) {
                array_push($errors, "La description est trop courte !");
            	}
            	if($this->heure1 == "Heure") {
                array_push($errors, "Choisissez une heure de départ ! ");
            	}
            	$sel = $dbco->prepare("SELECT * FROM reservations");
            	$sel->execute();
                foreach ($sel as $row) {            
                    if ($row["titre"] == $this->for_titre) {    
                    array_push($errors, "Le titre est déja utilisé");
                    }
                }

				if (count($errors) < 1) {  

				$sel = $dbco->prepare("SELECT * FROM utilisateurs WHERE login = ?");
            	$sel->execute(array($this->login));

            	foreach ($sel as $row) {
            	$id = $row["id"];
            	}  
                $this->setId($id);
                $sql = $dbco->prepare("INSERT INTO reservations(titre, description, id_utilisateur, debut, fin) VALUES (?, ?, ?, ?, ?)");
                $sql->execute(array($this->for_titre, $this->textarea, $this->id, $this->re, $this->re2));
			    // redirect("planning.php");
				}else{
		   	    return  $errors ;
			    }

        	}
    	}
}



//tableaux



class Month {
    
    public $days = ['Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.', 'Dim.'];
    private $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    public $month;
    public $year;

    /**
    * Month constructor.
    * @param int $month: Le mois compris entre 1 et 12
    * @param int $year : L'année
    */
    public function __construct(?int $month = null, ?int $year = null)
    {
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }
        
        $month = $month % 12;

        $this->month = $month;
        $this->year = $year;
    }


    /**
    * Renvoie le premier jour du moi
    * @return \DatzTime
    */
    public function getStartingDay (): \DateTime {
        return new \DateTime("{$this->year}-{$this->month}-01");

    }

    /**
    * Retourne le mois en toute lettre (ex: Janvier 2020)
    * @return string
    */
    public function toString (): string {
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }

    /**
    * renvoie le nombre de semaine dans le mois
    * @return int
    */
    public function getWeeks (): int {
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month -1 day');
        $weeks = intval($end->format('W')) - intval($start->format('W')) + 1; 
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }                  
        return $weeks;
    }


    /**
    * Esct-ce que le jour est dans le mois en cours
    * @param \DateTime $date
    * @return bool
    */
    public function withinMonth (\DateTime $date): bool {
        return $this->getStartingDay()->format('Y-m') === $date->format ('Y-m');
    }

    /**
     * Renvoie le mois suivant
     * @return Montch
     */
    public function newtMonth (): Month
    {
        $month = $this->month +1;
        $year = $this->year;
        if ($month > 12){
            $month = 1;
            $year += 1; 
        }
        return new Month($month, $year);
    }

    /**
     * Renvoie le mois précédent
     * @return Montch
     */

    public function previousMonth (): Month
    {
        $month = $this->month -1;
        $year = $this->year;
        if ($month < 1){
            $month = 12;
            $year -= 1; 
        }
        return new Month($month, $year);
    }



}

?>