<?php
    $tshirt = array(
        "Name" => "T-Shirt",
        "Description" => "A plain white t-shirt.",
        "Price" => 10.00,
        "Quantity" => 10,
        "Image" => "../images/t-shirt.png");
    $longsleeveshirt = array(
        "Name" => "Long Sleeve Shirt",
        "Description" => "A long sleeve shirt for those cool fall days.",
        "Price" => 15.00,
        "Quantity" => 10,
        "Image" => "../images/long-sleeve.png");
    $sweatshirt = array(
        "Name" => "Sweat Shirt",
        "Description" => "A warm sweat shirt for those cold winter days.",
        "Price" => 20.00,
        "Quantity" => 10,
        "Image" => "../images/sweat-shirt.png");
    $jacket = array(
        "Name" => "Jacket",
        "Description" => "A light jacket.",
        "Price" => 25.00,
        "Quantity" => 10,
        "Image" => "../images/jacket.png");

    $shorts = array(
        "Name" => "Shorts",
        "Description" => "A pair of shorts.",
        "Price" => 10.00,
        "Quantity" => 10,
        "Image" => "../images/shorts.png");
    $jeans = array(
        "Name" => "Jeans",
        "Description" => "A pair of jeans.",
        "Price" => 15.00,
        "Quantity" => 10,
        "Image" => "../images/jeans.png");
    $pants = array(
        "Name" => "Pants",
        "Description" => "A pair of pants.",
        "Price" => 20.00,
        "Quantity" => 10,
        "Image" => "../images/pants.png");

    $socks = array(
        "Name" => "Socks",
        "Description" => "A pair of socks.",
        "Price" => 5.00,
        "Quantity" => 10,
        "Image" => "../images/socks.png");
    $hat = array(
        "Name" => "Hat",
        "Description" => "A hat.",
        "Price" => 5.00,
        "Quantity" => 10,
        "Image" => "../images/hat.png");
    $glasses = array(
        "Name" => "Glasses",
        "Description" => "A pair of glasses.",
        "Price" => 5.00,
        "Quantity" => 10,
        "Image" => "../images/glasses.png");
    $products = array('tshirt', 'longsleeveshirt', 'sweatshirt', 'jacket', 'shorts', 'jeans', 'pants', 'socks', 'hat', 'glasses');
    $specialproducts = array('tshirt', 'hat', 'glasses');

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