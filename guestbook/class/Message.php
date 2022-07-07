<?php
class Message {

    private $username;
    private $message;
    private $visit;
    private $date;

    public function __construct(string $username,  string $message, string $visit, ?DateTime $date = null){
        $this->username = $username;
        $this->message = $message;
        $this->visit = $visit;
        $this->date = $date ?: new DateTime();
    }
    // str length
    public function isValid (): bool {
        return strlen($this->username) >= 2 && strlen($this->message) >= 5 && strlen($this->visit) >= 2;
    }

    public function toHTML(): string {
        $username = htmlentities($this->username);
        $date = $this->date->format('d/m/Y  H:i');
        $message =  htmlentities($this->message);
        $visit = htmlentities($this->visit);
        return <<<HTML
        <p>
        <strong>{$username}</strong><br>$visit<br><em>le {$date}</em><br>{$message}
        </p>
        HTML;
    }

    public function toJSON(): string {
        return json_encode(
        [
            'username' => $this->username,
            'message' => $this->message,
            'visit' => $this->visit,
            'date' => $this->date->getTimestamp()

        ]);
    }
}
?>