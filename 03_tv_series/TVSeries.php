<?php

require_once('Database.php');

class TVSeries
{
    private $database;

    public function __construct() {
        $this->database = new Database;
    }

    public function getNextAirTime(?string $title = null, ?string $date = null): string {
        $currentDay = date('Y-m-d H:i:s', strtotime($date ?? 'now'));

        $query = "
        (SELECT
        ts.title,
        tsi.week_day,
        tsi.show_time
        FROM
	        tv_series ts
        INNER JOIN
	        tv_series_intervals tsi
        ON
	        ts.id = tsi.id_tv_series
        WHERE
	        tsi.week_day = dayname('$currentDay')
	        AND tsi.show_time >= '$currentDay'
            " . ($title ? "AND ts.title = :title" : "") . "
        ORDER BY
	        show_time ASC
        LIMIT 1)
        UNION
        (SELECT
	        ts.title,
	        tsi.week_day,
	        tsi.show_time
        FROM
	        tv_series ts
        INNER JOIN
	        tv_series_intervals tsi
        ON
	        ts.id = tsi.id_tv_series
        " . ($title ? "WHERE ts.title = :title" : "") . "
        ORDER BY
	        FIELD(
		        week_day,
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 1 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 2 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 3 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 4 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 5 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 6 day)),
		        DAYNAME(DATE_ADD('$currentDay', INTERVAL 7 day))
	        ),
	        show_time ASC
	        LIMIT 99999)
        ";
        $stmt = $this->database->pdo->prepare($query);

        if ($title) {
            $stmt->bindParam(':title', $title);
        }

        $stmt->execute();
        // $stmt->debugDumpParams();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return "{$result['title']} will be the next show to air on {$result['week_day']} at {$result['show_time']}.";
        } else {
            return "There are no upcoming episodes.";
        }
    }
}
