<?php
/**
 * This class generate rss flux
 * Please visit example.php
 *
 * @author le_futuriste <contact@lefuturiste.fr>
 */
class rss
{

    private $db_use;
    private $table;

    public function __construct($db,$table)
    {
        $this->db_use = $db;
        $this->table = $table;
    }

    /**
     * Get last articles
     *
     * @param $limitStart
     * @param $limit
     * @return array
     */
    public function getRss($limitStart, $limit)
    {

        $req = $this->db_use->query("SELECT * FROM " . $this->table . " ORDER BY date_time_post DESC LIMIT " . $limitStart . ", " . $limit);

        return $req->fetchAll();
        $req->closeCursor();
    }

    /**
     * @return bool|string
     */
    public function getLastBuildDate(){
        $req = $this->db_use->query("SELECT date_time_post FROM " . $this->table . " ORDER BY date_time_post DESC LIMIT 0,1");

        $date = $req->fetch()['date_time_post'];

        //return date to RSS syntax
        return date(DATE_RSS, strtotime($date));

        $req->closeCursor();
    }
}
