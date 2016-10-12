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


    /**
     * rss constructor.
     * Defined the sql table and database connexion used for this class
     *
     * @param $db
     * @param $table
     */
    public function __construct($db, $table)
    {
        $this->db_use = $db;
        $this->table = $table;

        //important header content type for Web broswer
		header('Content-Type: application/rss+xml');
	
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

        return $this->getRssDate($date);

        $req->closeCursor();
    }

    /**
     * Return a normal date in RSS format
     *
     * @param $date
     * @return bool|string
     */
    public function getRssDate($date){
        return date(DATE_RSS, strtotime($date));
    }
}
