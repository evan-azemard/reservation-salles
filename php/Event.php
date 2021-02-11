<?php


class Events
{

    /**
     * Permet de récupérer les évenement commencent entre deux dates.
     * @param DateTime $start
     * @param DateTime $end
     * @return array
     */

    public function getEventsBetween(DateTime $start, DateTime $end): array
    {
        require_once('../library/Database.php');
        $dbco = connectPdo();

        $sql = "SELECT * FROM reservations WHERE debut BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND 
    '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $dbco->query($sql);
        $results = $statement->fetchAll();
        return $results;

    }

    /**
     *  Permet de récupérer les évenement commencent entre deux dates indexé par jour
     * @param DateTime $start
     * @param DateTime $end
     * @return array
     */

    public function getEventsBetweenByDay(DateTime $start, DateTime $end): array
    {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ', $event['debut'])[0];
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }

    /**
     * Récupère un évènement
     * @param int $id
     * @return array
     */

    public function  find (int $id): array {
        require_once('../library/Database.php');
        $dbco = connectPdo();

        return $dbco->query("SELECT * FROM reservations WHERE id = $id LIMIT 1")->fetch();
    }

}

