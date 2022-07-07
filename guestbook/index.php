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

<div class="container g-5 p-3">
    <h1>Guest book  <i class="fa-solid fa-book-open fa-2xs"></i></h1>
    <form action="" method="post">
        <div class="form-group mb-3">
            <input type="text" name="username" placeholder="Name" class="form-control">
        </div>

        <div class="form-group mb-3">
            <textarea name="message" placeholder="Leave your comment here" class="form-control"></textarea>
        </div>

        <div class="form-group mb-3">
            <input type="text" name="visit" placeholder="Which cafe did you visit?" class="form-control">
        </div>
        <button class="btn btn-warning text-white mt-3">Send message</button>
    </form>

    <h4 class="mt-4">Your messages: </h4>
    <?php foreach ($messages as $message): ?>
        <?= $message->toHTML()?>
    <?php endforeach ?>

<?php
require_once ('elements/footer.php');
?>

</div>