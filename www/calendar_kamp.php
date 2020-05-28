<?php
require_once 'vendor/autoload.php';

class CalendarClient {
    private $service;
    private $calendarId;

    public function __construct()
    {
        // load config file as array
        $config = parse_ini_file('../private/secrets/calendar.ini');
        $this->calendarId = $config["kampcalendarid"];
        $client = new Google_Client();
        $client->setApplicationName("KLJ Wiekevorst kampverhuurkalender");
        $client->setDeveloperKey($config["apikey"]);
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS_READONLY);

        $this->service = new Google_Service_Calendar($client);
    }

    public function getCalendarEvents() {
        $optParams = array(
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => (new DateTime('first day of this year'))->format('c'),
        );
        $result = $this->service->events->listEvents($this->calendarId, $optParams);
        $result->getItems();

        $output = [];
        foreach ($result as $event) {
            $item = array("title" => "", "start" => "", "end" => "");
            $item["start"] = $event->start->dateTime ?? $event->start->date;
            $item["end"] = $event->end->dateTime ?? $event->end->date;
            array_push($output, $item);
        }

        return $output;
    }
}
?>