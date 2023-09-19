<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // require_once '../assets/setup/db.inc.php';

//username 
    function generateAliases($num_aliases) {
    $aliases = array();
    $word_list = file("../resource/words.txt", FILE_IGNORE_NEW_LINES); // read the word list file into an array
    $word_list2 = file("../resource/words.txt", FILE_IGNORE_NEW_LINES);
    
    for ($i = 0; $i < $num_aliases; $i++) {
        // Get a random word from the word list
        $word1 = $word_list[array_rand($word_list)];
        $word2 = $word_list2[array_rand($word_list2)];
        // Generate a random number
        $number = rand(1000, 9999);

        // Create the alias in the desired format
        $alias = $word1 . '-' . $word2 . $number;
        $aliases[] = $alias;
    }

    return $aliases;
}


    // check if form submitted
    if (isset($_POST['num_aliases'])) {
        $num_aliases = intval($_POST['num_aliases']);
        $aliases = generateAliases($num_aliases);

        // save the generated aliases in a session variable
        $_SESSION['aliases'] = $aliases;

        // redirect back to aliasing.php
        header('Location: ../aliasing.php');
        exit();
    }


    //password generation
    

    // function generatePassword() {
    //     $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}[];:<>,.?/';
    //     $password = '';
    //     while (strlen($password) < 8) {
    //         $password .= $chars[rand(0, strlen($chars) - 1)];
    //     }
    //     return $password;
    // }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     if (isset($_POST['generate_password'])) {
    //         $password = generatePassword();
    //         header("Location: ../aliasing.php?password=" . $password);
    //         exit();
    //     }
    // }



?>


