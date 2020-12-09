<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

require 'class.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CedCab</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="cab.css">
		<style>
		* {
			box-sizing: border-box;
		}
		
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		
		header {
			background-color: grey;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}
		
		section {
			display: -webkit-flex;
			display: flex;
		}
		
		nav {
			-webkit-flex: 1;
			-ms-flex: 1;
			flex: 1;
			background: #ccc;
			padding: 20px;
		}
		
		nav ul {
			list-style-type: none;
			padding: 0;
		}
		
		article {
			-webkit-flex: 3;
			-ms-flex: 3;
			flex: 3;
			background-color: #f1f1f1;
			padding: 10px;
		}
		
		footer {
			background-color: black;
			padding: 10px;
			text-align: center;
			color: white;
		}
		
		@media (max-width: 600px) {
			section {
				-webkit-flex-direction: column;
				flex-direction: column;
			}
		}
		
		.button {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			background-color: #555555;
		}
		.card-header
		{
			margin-left: 400px;
		}
		.card-body
		{
			margin-left: 400px;
			padding:20px;
		}
	</style>
</head>