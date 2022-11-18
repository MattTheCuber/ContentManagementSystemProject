<?php
    $basicSite = array(
        "Name" => "Basic Website",
        "Description" => "A simple website with no advanced features such as payment or login.",
        "Image" => "../images/simple.png");
    $advancedSite = array(
        "Name" => "Advanced Website",
        "Description" => "An advanced website with advanced features such as payment or login.",
        "Image" => "../images/advanced.png");
    $customSite = array(
        "Name" => "Custom Website",
        "Description" => "An customized website with custom features defined by the customer.",
        "Image" => "../images/custom.png");
    $products = array('basicSite', 'advancedSite', 'customSite');

    $questions = array(
        array("title" => "How satisfied are you with this product?", "id" => "satisfied", "type" => 1),
        array("title" => "Do you think this product is appropriately priced?", "id" => "pricing", "type" => 2),
        array("title" => "Would you buy this product again?", "id" => "repurchase", "type" => 2),
        array("title" => "Did this product meet your needs?", "id" => "needs", "type" => 2),
        array("title" => "How is the overall quality of this product?", "id" => "quality", "type" => 1)
    );

    $type1 = array("Poor", "Average", "Good", "Very Good", "Excellent");
    $type2 = array("Strongly Disagree", "Disagree", "Neutral", "Agree", "Strongly Agree");
?>