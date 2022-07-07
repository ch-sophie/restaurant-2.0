<?php
require_once ('class/Message.php');
require_once ('class/GuestBook.php');
$errors = null;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
if(isset($_POST['username'], $_POST['message'], $_POST['visit'])){
    $message = new Message($_POST['username'], $_POST['message'], $_POST['visit']);
    if ($message->isValid()){
        // $guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
        $guestbook->addMessage($message);
    } else{
        $errors = "Not valid";
    }
}

$messages = $guestbook->getMessages();

$title = "Guest Book";
include_once('elements/header.php');
?>

<div class="container">
    <h1>Guest Book</h1>
    <form action="" method="post">
        <div class="form-group mb-3">
            <input type="text" name="username" placeholder="Name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <textarea name="message" placeholder="Leave your comment here" class="form-control"></textarea>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="visit" placeholder="Visited restaurant" class="form-control">
        <button class="btn btn-warning mt-3">Send message</button>
    </form>

    <h4 class="mt-4">Your messages: </h4>
    <?php foreach ($messages as $message): ?>
        <?= $message->toHTML()?>
    <?php endforeach ?>

</div>

<?php
require_once ('elements/footer.php');
?>